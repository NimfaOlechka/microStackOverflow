<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SessionsController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

//Questions and Answers
Route::get('/', [ QuestionController::class, 'index'])->name('home');
Route::get('questions/{question:slug}', [ QuestionController::class, 'show']);

//Answer
Route::post('questions/{question:slug}/answers', [AnswerController::class, 'store']);

Route::get('admin/questions',[AdminController::class, 'index'])->middleware('auth');
Route::get('admin/questions/create',[AdminController::class, 'create'])->middleware('auth');
Route::post('admin/questions/create',[AdminController::class, 'store'])->middleware('auth');

//Route::get('question-create', [QuestionController::class, 'create'])->middleware('auth');
//Route::post('question-create', [QuestionController::class, 'store'])->middleware('auth');

//Profile
Route::get('edit-profile', [RegisterController::class, 'editProfile'])->middleware('auth');
Route::get('admin-profile', [RegisterController::class, 'show'])->middleware('auth');
Route::patch('profile/update',[RegisterController::class, 'update'])->middleware('auth');


//Registration and Login
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::get('logout',[SessionsController::class, 'destroy'])->middleware('auth');
Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');

