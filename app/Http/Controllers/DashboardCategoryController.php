<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|unique:categories',
        ]);

        $category = Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', 'New category has been added!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // $category = Category::where('name', $name)->first();
        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'bail|required|unique:categories'
        ]);

        $category = Category::where('id', $category->id)->first();
        $category->slug = null;
        $category->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }

    // show deleted data
    public function trash(){
        $trashedCategories = Category::onlyTrashed()->get();
        return view('dashboard.categories.trash', [
            'categories' => $trashedCategories
        ])->with('success', 'Category has been deleted!');
    }

    // restore deleted data
    public function restore($slug){
        $category = Category::withTrashed()->where('slug', $slug)->firstOrFail();
        $category->restore();
        return redirect('/dashboard/categories/trash')->with('success', 'Category has been restored!');
    }

    // force delete the deleted data in trash
    public function forceDelete($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->firstOrFail();
        $category->forceDelete();
        return redirect('/dashboard/categories/trash')->with('success', 'Category has been permanently deleted!');
    }
}
