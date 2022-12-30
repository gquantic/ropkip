<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePlan extends Model
{
    use HasFactory;

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function courseMaterials(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CourseMaterial::class);
    }
}
