<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['type', 'value', 'campaign_id'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
