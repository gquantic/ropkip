<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseMaterial;
use App\Models\CoursePlanModule;
use Illuminate\Http\Request;

class MaterialController extends Controller
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
        return view('admin.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $module = CoursePlanModule::query()->where('id', $request->post('module'))->with('course', 'plan')->first();

        $material = new CourseMaterial();

        $material->course_id = $module->course->id;
        $material->course_plan_id = $module->plan->id;
        $material->course_plan_module_id = $module->id;
        $material->title = $request->post('title');
        $material->content = $request->post('url');
        $material->description = $request->post('description');
        $material->duration = intval($request->post('duration_seminar')) + intval($request->post('duration_self')) + intval($request->post('duration_exam'));
        $material->duration_seminar = $request->post('duration_seminar') ?? 0;
        $material->duration_self = $request->post('duration_self') ?? 0;
        $material->duration_exam = $request->post('duration_exam') ?? 0;

        $material->save();

        return redirect()->route('courses.edit', $module->course->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseMaterial $courseMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseMaterial  $courseMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseMaterial $courseMaterial)
    {
        //
    }
}
