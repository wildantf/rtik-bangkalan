<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        // middlware untuk semua method
        $this->middleware('permission:create category');
        // middleware hanya untuk update
        $this->middleware('permission:update category', ['only' => 'update']);
    }

    public function index()
    {
        return view('dashboard.categories.index', [
            'categories' => Category::latest()->paginate(5)->withQueryString(),
        ]);
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return back()->with('success', 'New Category success added!');
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect(route('dashboard.categories.index'))->with('success', 'Category has updated!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted successfully!');
    }
}
