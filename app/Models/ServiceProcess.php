<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProcess extends Model
{
    use HasFactory;

    protected $guarded = [];

      protected $fillable = [
        'service_id',
        'strategy_development',
        'implementation',
        'optimization',
        'results_reporting'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
