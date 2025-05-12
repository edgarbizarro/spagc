<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'state_id', 'cluster_id'];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }
}
