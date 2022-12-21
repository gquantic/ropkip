<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryType;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param Request $request
     * @return false|string
     */
    public function getCategoryTypes(Request $request)
    {
        $types = CategoryType::query()->where('category_id', $request->post('id'))->get();
        return json_encode($types);
    }
}
