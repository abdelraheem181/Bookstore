<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PublishersController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('layouts.main');
    })->name('dashboard');
});
 
Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/find', [GalleryController::class, 'find'])->name('find');
Route::get('/book/{book}' , [BooksController::class, 'detials'])->name('book.detials');
                      /*------------ Ratings --------------------*/
 Route::post('/book/{book}/rate', [BooksController::class, 'rate'])->name('book.rate');

/*----------------------------- Categories ----------------------------------------*/
Route::get('/categories' , [CategoriesController::class, 'list'])->name('categories.list');
Route::get('/cotegories/search' , [CategoriesController::class , 'search'])->name('cotegories.search');
Route::get('/categories/{category}', [CategoriesController::class, 'find'])->name('categories.books');//gallery.categories.show

/*----------------------------- Publishers  ----------------------------------------*/
Route::get('/publishers' , [PublishersController::class , 'list'])->name('publishers.list');
Route::get('/publishers/search' , [PublishersController::class , 'search'])->name('publishers.search');
Route::get('/publisher/{publisher}' , [PublishersController::class , 'find'])->name('publishers.books');

/*----------------------------- Authers  ----------------------------------------*/
Route::get('/authors' , [AuthorsController::class , 'list'])->name('authors.list');
Route::get('/authors/search' , [AuthorsController::class , 'search'])->name('authors.search');
Route::get('/authors/{author}' , [AuthorsController::class , 'find'])->name('authors.books');


/*
Route::get('/admin/books' , [BooksController::class , 'index'])->name('admin.books');
Route::get('/admin/books/create' , [BooksController::class , 'create'])->name('books.create');
Route::post('/admin/books/store' , [BooksController::class , 'store'])->name('books.store');
Route::get('admin/books/{book}' , [BooksController::class , 'show'])->name('books.show');
Route::get('/admin/books/{book}/edit' , [BooksController::class , 'edit'])->name('books.edit');
Route::patch('/admin/books/{book}' , [BooksController::class , 'update'])->name('books.update');
Route::delete('/admin/books/{book}' , [BooksController::class , 'destroy'])->name('books.destroy');*/


/*----------------------------- Controll Panel  ------------------------------*/
Route::prefix('/admin')->middleware('can:update-books')->group(function(){
      Route::get('/' , [AdminsController::class , 'index'])->name('admin.index');
      /*--------------------- Books -------------------------------------- */
    Route::resource('/books' , 'App\Http\Controllers\BooksController');
     /*-------------------------   Categories  ------------------------------ */
     Route::resource('/categories' , 'App\Http\Controllers\CategoriesController');
     /*-------------------------   Authors  ------------------------------ */
    Route::resource('/authors' , 'App\Http\Controllers\AuthorsController');
     /*-------------------------   Authors  ------------------------------ */
    Route::resource('/publishers' , 'App\Http\Controllers\PublishersController');
     /*-------------------------   Users  ------------------------------ */
    Route::resource('/users' ,    'App\Http\Controllers\UsersController');
     /*-------------------------   Purchase  ------------------------------ */
    Route::get('/allproduct' , [PurchaseController::class , 'allProduct'])->name('all.product');


});
Route::post('/cart' , [CartController::class , 'addToCart'])->name('cart.add');
Route::get('/cart' , [CartController::class , 'viewCart'])->name('cart.view');
Route::post('/removeone/{book}' , [CartController::class , 'removeOne'])->name('cart.remove_one');
Route::post('/removeall/{book}' , [CartController::class , 'removeAll'])->name('cart.remove_all');


// Payment By Credit Cart
Route::get('/checkout' , [PurchaseController::class , 'creditCheckout'])->name('credit.checkout');
Route::post('/checkout' , [PurchaseController::class , 'purchase'])->name('products.purchase');

// My Products 
Route::get('/myproduct' , [PurchaseController::class , 'myProduct'])->name('my.products');







