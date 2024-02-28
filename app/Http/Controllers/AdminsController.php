<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        $number_books      = Book::count();
        $number_categories = Category::count();
        $number_authors    = Author::count();
        $number_publishers = Publisher::count();
        return view('admins.index' , compact('number_books' , 'number_categories' , 'number_authors' , 'number_publishers'));
    }
}
