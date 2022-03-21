<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('redirects',[HomeController::class,'index']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
Route::get('view',[HomeController::class,'view']);

Route::controller(HomeController::class)->group(function () {
Route::get('newlogin','login');
Route::get('uregister','register');
Route::get('home','home');
Route::get('parent','parent');

});
Route::get('a/{id}',[CustomerController::class,'index']);
Route::get('b/{id}',[MobileController::class,'index']);

//one to many relationship
Route::get('c/{id}',[AuthorController::class,'index']);
Route::get('d/{id}',[PostController::class,'index']);

///practice
Route::get('e/{id}',[StudentController::class,'index']);
Route::get('f/{id}',[MessageController::class,'index']);

///many to many
Route::get('g/{id}',[EmployeeController::class,'index']);
Route::get('h/{id}',[SkillController::class,'index']);

//Has One Throuh
Route::get('i/{id}',[OwnerController::class,'index']);
