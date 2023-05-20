<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safeguard extends Model
{
    use HasFactory;

    public function hazard() {
        return $this->belongsTo(Hazard::class);
    }
}
