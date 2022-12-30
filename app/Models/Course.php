<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $casts = [
        'params' => 'array'
    ];

    public function coursePlans(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CoursePlan::class);
    }
}
