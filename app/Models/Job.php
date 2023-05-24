<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['steps'];
    protected $fillable = [
        'title',
        'description',
        'created_by'
    ];

    public function steps() {
        return $this->hasMany(Step::class, 'job_id', 'id');
    }

    public function hazards() {
        return $this->hasManyThrough(Hazard::class, Step::class);
    }
//
    public function safeguards() {
        return $this->hasManyThrough(Safeguard::class, Step::class);
    }
}
