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

    public function getExternalUrlAttribute($value)
    {
        if (is_null($value)) {
            return null;
        }

        if (is_array($value)) {
            return $value;
        }

        $decoded = json_decode($value, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded;
        }

        return $value;
    }

    public function setExternalUrlAttribute($value)
    {
        if (is_array($value)) {
            $this->attributes['external_url'] = json_encode($value);
        } else {
            $this->attributes['external_url'] = $value;
        }
    }
}
