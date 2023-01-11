<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;
    protected $casts = [
        'answers' => 'array',
    ];

    protected $fillable = [
        'module_test_id',
        'title',
        'answers',
        'type',
        'correct',
        'max_score',
    ];

    public function test(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ModuleTest::class, 'id');
    }
}
