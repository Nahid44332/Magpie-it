<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whyus extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
    'icon',
    'title',
    'description',
    'count_title',
    'count',
];

}
