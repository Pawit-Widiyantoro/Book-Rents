<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index(){
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        return view('dashboard.home', [
            'book_count' => $bookCount,
            'category_count' => $categoryCount,
            'user_count' => $userCount
        ]);
    }
}
