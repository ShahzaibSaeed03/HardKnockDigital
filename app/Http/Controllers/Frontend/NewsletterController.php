<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Honeypot: if bots fill this, pretend success and bail
        if ($request->filled('company_website')) {
            return back()->with('newsletter_success', 'Thanks! Please check your email to confirm.');
        }

        $data = $request->validate([
            'email' => ['required','email:rfc,dns','max:190'],
        ]);

        // Resolve config safely
        $apiKey       = (string) config('services.brevo.key');
        $listId       = (int)    config('services.brevo.list_id');
        $doiTemplate  = config('services.brevo.doi_template_id') ? (int) config('services.brevo.doi_template_id') : null;
        $doiRedirect  = (string) config('services.brevo.doi_redirect', url('/thanks'));

        if (empty($apiKey) || $listId <= 0) {
            Log::error('Brevo config missing/invalid', [
                'apiKey_present' => !empty($apiKey),
                'listId'         => $listId,
                'doiTemplate'    => $doiTemplate,
                'doiRedirect'    => $doiRedirect,
            ]);
            return back()->with('newsletter_error', 'Subscription temporarily unavailable. Please try again soon.');
        }

        try {
            // 1) Save/update locally (idempotent)
            Newsletter::updateOrCreate(
                ['email' => $data['email']],
                ['ip_address' => $request->ip(), 'source' => 'HKN website']
            );

            // 2) Build Brevo payload (DOI or instant)
            $headers = [
                'api-key' => $apiKey,
                'accept'  => 'application/json',
            ];

            if ($doiTemplate) {
                $payload = [
                    'email'          => $data['email'],
                    'includeListIds' => [ $listId ],       // ensure integer
                    'templateId'     => $doiTemplate,      // integer
                    'redirectionUrl' => $doiRedirect,
                    'attributes'     => ['SOURCE' => 'HKN website'],
                ];
                Log::info('Brevo DOI request', ['payload' => $payload]);
                $res = Http::withHeaders($headers)
                    ->post('https://api.brevo.com/v3/contacts/doubleOptinConfirmation', $payload);
            } else {
                $payload = [
                    'email'         => $data['email'],
                    'listIds'       => [ $listId ],        // ensure integer
                    'updateEnabled' => true,
                    'attributes'    => ['SOURCE' => 'HKN website'],
                ];
                Log::info('Brevo instant subscribe request', ['payload' => $payload]);
                $res = Http::withHeaders($headers)
                    ->post('https://api.brevo.com/v3/contacts', $payload);
            }

            if (! $res->successful()) {
                Log::error('Brevo subscribe failed', [
                    'status'  => $res->status(),
                    'body'    => $res->body(),
                    'email'   => $data['email'],
                    'list_id' => $listId,
                    'doi'     => (bool) $doiTemplate,
                ]);
                return back()->with('newsletter_error', 'Could not subscribe right now.');
            }

            // 3) Send a local confirmation email via your SMTP (optional but nice)
            try {
                Mail::raw(
                    "You're on the list! We'll send occasional updates from Hard Knock Digital.",
                    function ($m) use ($data) {
                        $m->to($data['email'])->subject('You’re subscribed to Hard Knock Digital');
                    }
                );
            } catch (\Throwable $mailErr) {
                // Don’t block subscription on mail failure
                Log::warning('Subscription mail failed', ['e' => $mailErr, 'email' => $data['email']]);
            }

            $msg = $doiTemplate
                ? 'Thanks! Please check your email to confirm.'
                : 'Subscribed successfully!';

            return back()->with('newsletter_success', $msg);

        } catch (\Throwable $e) {
            Log::error('Newsletter subscribe exception', [
                'e'        => $e,
                'email'    => $data['email'],
                'list_id'  => $listId,
                'doi'      => (bool) $doiTemplate,
            ]);
            return back()->with('newsletter_error', 'Something went wrong.');
        }
    }
}
