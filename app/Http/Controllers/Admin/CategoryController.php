<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::create([
            'name' => $data['category'],
        ]);
        return redirect()->route('admin.category.index');
    }
}
