<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('categories')->get();
        return view('dashboard.books.index', [
            'books' => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.books.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'book_code' => 'bail|required|unique:books',
            'title' => 'bail|required|unique:books',
            'cover' => 'image|file|max:2048',
        ]);

        if($request->file('cover')){
            $file = $request->file('cover');
            $slug = Str::slug($request->title);
            $fileName = $slug . '-' . time() . '.' . $file->getClientOriginalExtension();
            $validatedData['cover'] = $file->storeAs('post-images', $fileName);
        }

        $book = Book::create($validatedData);
        $book->categories()->sync($request->category);

        return redirect('/dashboard/books')->with('success', 'New book has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('dashboard.books.edit',[
            'categories' => $categories,
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // ddd($request);
        $validatedData = $request->validate([
            'book_code' => 'bail|required|unique:books,book_code,' . $book->id,
            'title' => 'bail|required|unique:books,title,' . $book->id,
            'cover' => 'image|file|max:2048',
        ]);
    
        if($request->file('cover')){
            // Delete the old cover image if it exists
            if ($book->cover) {
                Storage::delete($book->cover);
            }

            $file = $request->file('cover');
            $slug = Str::slug($request->title);
            $fileName = $slug . '-' . time() . '.' . $file->getClientOriginalExtension();
            $validatedData['cover'] = $file->storeAs('post-images', $fileName);
        } else {
            // Ensure the original cover path is retained if no new file is uploaded
            $validatedData['cover'] = $book->cover;
        }
    
        // Set the slug attribute to null to regenerate it
        $book->slug = null;
    
        $book->update($validatedData);
        $book->categories()->sync($request->category);
    
        return redirect('/dashboard/books')->with('success', 'Book has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('/dashboard/books')->with('success', 'Book has been deleted!');
    }

    public function trash(){
        $trashedBooks = Book::onlyTrashed()->get();
        return view('dashboard.books.trash', [
            'books' => $trashedBooks,
        ]);
    }

    public function restore($slug){
        $book = Book::withTrashed()->where('slug', $slug)->firstOrFail();
        $book->restore();
        return redirect('/dashboard/books/trash')->with('success', 'Book has been restored!');
    }

    public function forceDelete($slug){
        $book = Book::withTrashed()->where('slug', $slug)->firstOrFail();

        // Delete the cover image if it exists
        if ($book->cover) {
            Storage::delete($book->cover);
        }

        $book = Book::withTrashed()->where('slug', $slug)->firstOrFail();
        $book->forceDelete();
        return redirect('/dashboard/books/trash')->with('success', 'book has been permanently deleted!');
    }
}
