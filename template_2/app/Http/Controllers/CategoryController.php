<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Inertia\Response;
use App\Http\Requests\CategoryRequest;
use Inertia\Inertia;

class CategoryController extends Controller
{
    const NUMBER_OF_CATEGORIES = 25;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $number = self::NUMBER_OF_CATEGORIES;
        $categories = Category::paginate($number);
      //  return view('categories.index', compact('categories'));
      return inertia('Categories/Index', [
        'categories' => $categories
      ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category    $category)
    {
        return inertia('Categories/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
       if($category->update($request->validated())){
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
       }
       return back()->with('error', 'Failed to update category.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category    $category)
    {
      if($category->delete()){
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
      }
      return back()->with('error', 'Failed to delete category.');
    }
}
