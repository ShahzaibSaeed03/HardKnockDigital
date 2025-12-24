<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Show extends Model
{
    protected $fillable = [
        'title','slug','tagline','banner_image','logo','description_html',
        'youtube_url','rumble_url','spotify_url','iheart_url','amazon_url','pandora_url','podbean_url','applepodcast_url',
        'is_published','published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected static function booted(): void
    {
        static::creating(function (Show $show) {
            if (empty($show->slug)) {
                $show->slug = Str::slug($show->title);
            }
            if ($show->is_published && empty($show->published_at)) {
                $show->published_at = now();
            }
        });

        static::updating(function (Show $show) {
            if (empty($show->slug)) {
                $show->slug = Str::slug($show->title);
            }
        });
    }

    public function scopePublished($q)
    {
        return $q->where('is_published', true)
                 ->where(function($qq){
                     $qq->whereNull('published_at')->orWhere('published_at','<=',now());
                 });
    }
}
