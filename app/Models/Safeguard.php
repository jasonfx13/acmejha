<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Safeguard extends Model
{
    use HasFactory;
    use SoftDeletes, CascadeSoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'hazard_id'
    ];

    public function hazard() {
        return $this->belongsTo(Step::class);
    }
}
