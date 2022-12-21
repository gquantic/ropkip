<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetInfoController extends Controller
{
    protected Course $course;

    protected int $duration;

    public function getCourseInfo(Request $request)
    {
        $this->course = Course::query()->find($request->get('id'));
        $this->duration = $request->get('duration');

        return [
            'duration' => $this->duration,
            'training_duration' => round($this->duration / 24),
            'full_price' => $this->course->price * $this->duration,
            'end_date' => Carbon::today()->addDays($this->duration / $this->course->hours_per_day)->format('d.m.Y'),
        ];
    }
}
