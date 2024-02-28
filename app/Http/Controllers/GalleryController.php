<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $books = Book::Paginate(10);
        $title = 'معرض الكتب';
        return view('gallery', compact('books', 'title'));
    }

 public function find(Request $request)
 {
    $books = Book::where('title', 'like', "%{$request->term}%")->Paginate(10);
    $title = 'نتائج البحث عن ' . $request->term;
    return view('gallery', compact('books', 'title'));
 }

}
