<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'created_by'
    ];

    public function steps() {
        return $this->hasMany(Step::class, 'job_id', 'id');
    }

    public function hazards() {
        return $this->hasManyThrough(Hazard::class, Step::class, 'job_id', 'step_id', 'id');
    }
//
    public function safeguards() {
        return $this->hasManyThrough(Safeguard::class, Hazard::class, 'step_id', 'hazard_id', 'id');
    }
}
