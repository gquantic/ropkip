<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoursePlan;
use Illuminate\Http\Request;

class CoursePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $plan = new CoursePlan;
        $plan->course_id = $request->post('course');
        $plan->total_hours = 0;
        $plan->price = $request->post('price');
        $plan->save();

        return redirect()->route('courses.edit', $request->post('course'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoursePlan  $coursePlan
     * @return \Illuminate\Http\Response
     */
    public function show(CoursePlan $coursePlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoursePlan  $coursePlan
     * @return \Illuminate\Http\Response
     */
    public function edit(CoursePlan $coursePlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoursePlan  $coursePlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoursePlan $coursePlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoursePlan  $coursePlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoursePlan $coursePlan)
    {
        //
    }
}
