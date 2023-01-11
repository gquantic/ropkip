<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestQuestion;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        TestQuestion::query()->create([
            'module_test_id' => $request->post('test_id'),
            'title' => $request->post('title'),
            'type' => $request->post('question_format'),
            'answers' => $request->post('answers'),
            'correct' => $request->post('correct'),
            'max_score' => $request->post('max_score'),
        ]);

        return redirect()->route('tests.edit', $request->post('test_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(TestQuestion $testQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(TestQuestion $testQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestQuestion $testQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestQuestion  $testQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestQuestion $testQuestion)
    {
        //
    }
}
