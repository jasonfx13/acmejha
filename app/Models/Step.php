<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function hazards() {
        return $this->hasMany(Hazard::class);
    }
}
