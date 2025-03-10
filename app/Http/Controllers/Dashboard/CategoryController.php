<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\PutRequest;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::paginate(2);
        return view('dashboard.category.index', compact('categories'));

        return "index";

    }


    public function create()
    {
        //
        $category = new Category();

        return view('dashboard.category.create', compact('category'));
    }


    public function store(StoreRequest $request)
    {

        Category::create($request->validated());
        return to_route('category.index')->with('status','Category created');

    }


    public function show(Category $category)
    {

        return view('dashboard.category.show', ['category' => $category]);
    }

    public function edit(Category $category)
    {
        //
        $categories = Category::pluck('id','title');

        return view('dashboard.category.edit', compact('category'));

    }

    public function update(PutRequest $request, Category $category)
    {
        //
        $category->update($request->validated());
        return to_route('category.index')->with('status','Category updated');
    }

    public function destroy(Category $category)
    {
        //
        $category->delete();
        return to_route('category.index')->with('status','Category delete');

    }
}
