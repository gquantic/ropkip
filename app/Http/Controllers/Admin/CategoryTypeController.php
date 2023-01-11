<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CategoryType;
use Illuminate\Http\Request;

class CategoryTypeController extends Controller
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
        return view('admin.category-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $categoryType = new CategoryType;
        $categoryType->category_id = $request->post('category');
        $categoryType->title = $request->post('title');
        $categoryType->save();

        return redirect()->route('a_category.show', $request->post('category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryType  $categoryType
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryType $categoryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryType  $categoryType
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryType $categoryType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryType  $categoryType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryType $categoryType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryType  $categoryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryType $categoryType)
    {
        //
    }
}
