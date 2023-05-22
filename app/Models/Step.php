<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Step extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = ['hazards'];
    protected $fillable = [
        'title',
        'job_id'
    ];

    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function hazards() {
        return $this->hasMany(Hazard::class);
    }
}
