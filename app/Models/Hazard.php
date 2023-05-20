<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hazard extends Model
{
    use HasFactory;

    public function step() {
        return $this->belongsTo(Step::class);
    }

    public function safeguards() {
        return $this->hasMany(Safeguard::class);
    }
}
