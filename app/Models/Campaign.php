<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'is_active',
        'cluster_id',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'campaign_product');
    }
}
