<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePlanModule extends Model
{
    use HasFactory;

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function plan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CoursePlan::class, 'course_plan_id');
    }
    public function materials(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseMaterial::class);
    }

    public function tests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ModuleTest::class, 'plan_module_id');
    }
}
