<?php

use App\Http\Controllers\Welcome;
use App\Http\Controllers\Blog;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Contact;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Welcome::class,'index'])->name('welcome.index');


Route::get('/blog', [Blog::class,'index'])->name('blog.index');

Route::get('/blog/create-post', [Blog::class,'create'])->name('blog.create');

Route::post('/blog-store', [Blog::class,'store'])->name('blog.store');

Route::get('/blog/{post:slug}', [Blog::class,'show'])->name('blog.show');

Route::get('/blog/{post}/edit', [Blog::class,'edit'])->name('blog.edit');

Route::put('/blog/{post}/update', [Blog::class,'update'])->name('blog.update');

Route::delete('/blog/{post}', [Blog::class,'destroy'])->name('blog.destroy');


// Category Resource controller router
Route::resource('/categories', CategoryController::class);





// if there is no logic then don't need to use controller then use closure like following
Route::get('/about', function () {
        return view('about');
    })->name('about');





    // Contact controller
    Route::get('/contact-us', [Contact::class,'index'])->name('contact.index');

    // sending email method using contact controller
    Route::post('/contact_store', [Contact::class,'store'])->name('contact.store');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
