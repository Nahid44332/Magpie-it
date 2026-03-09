<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function features()
    {
        return $this->hasOne(ServiceFeature::class);
    }

    public function process()
    {
        return $this->hasOne(ServiceProcess::class);
    }

    public function sidebar()
    {
        return $this->hasOne(ServiceSidebarInfo::class);
    }
}
