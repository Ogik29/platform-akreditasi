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
        'logo',
        'tagline',
        'description',
        'features',
        'funding_awards',
        'tech_field',
        'prestasi_level',
        'partners',
        'logo_mitra',
        'team_members',
        'external_url',
        'video_url',
        'screenshots',
        'documentations',
    ];

    protected $casts = [
        'features' => 'array',
        'funding_awards' => 'array',
        'partners' => 'array',
        'logo_mitra' => 'array',
        'team_members' => 'array',
        'screenshots' => 'array',
        'documentations' => 'array',
    ];
}
