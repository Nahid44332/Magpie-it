<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'title',
        'subtitle',
        'price',
        'description',
        'delivery_time',
        'features'
    ];

    protected $casts = [
        'features' => 'array',
    ];
}
