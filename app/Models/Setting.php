<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "title",
        "username",
        "linkedin_url",
        "github_url",
        "youtube_url",
        "hero_gif",
        "email",
        "phone",
        "pronouns",
        "location",
        "languages",
    ];

    protected $casts = [
        'languages' => 'array',
    ];
}
