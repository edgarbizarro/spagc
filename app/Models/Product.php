<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'sku'];

    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_product')->withTimestamps();
    }
}
