<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cluster extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
