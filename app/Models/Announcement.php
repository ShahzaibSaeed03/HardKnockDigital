<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

protected $fillable = [
    'title','slug', 'description', 'content', 'featured_image', 'status', 'starts_at', 'ends_at'
];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
    ];
}
