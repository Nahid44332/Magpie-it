<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'technologies' => 'array',
        'features' => 'array',
    ];

    public function gallery()
    {
        return $this->hasMany(PortfolioGallery::class, 'portfolio_id');
    }

    public function portfolio_galleries()
{
    // এখানে function এর নাম আপনার ব্লেড ফাইলের নামের সাথে মিল থাকতে হবে
    return $this->hasMany(PortfolioGallery::class, 'portfolio_id');
}
}
