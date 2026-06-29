<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'supervisor',
        'type',
        'tkt',
        'logo',
        'tagline',
        'description',
        'features',
        'funding_awards',
        'prestasi_level',
        'partners',
        'team_members',
        'external_url',
        'video_url',
        'screenshots',
    ];

    protected $casts = [
        'features' => 'array',
        'funding_awards' => 'array',
        'partners' => 'array',
        'team_members' => 'array',
        'screenshots' => 'array',
        'tkt' => 'integer',
    ];
}
