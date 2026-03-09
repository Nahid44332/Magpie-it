<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'service_id',
        'performance_analytics',
        'target_audience_research',
        'content_creation',
        'social_media_management'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
