<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MoneyRequestController;
use App\Http\Controllers\MoneyRequestItemController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TransectionController;
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

Route::get('/', function () {
    return view('auth.login');
});



Route::middleware(['auth'])->group(function () {

    Route::get('dashboard',[FrontController::class,'index'])->name('dashboard');
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('front',FrontController::class);
        Route::resource('user',UserController::class);
        Route::resource('about',AboutController::class);
        Route::resource('message',MessageController::class);
        Route::resource('information',InformationController::class);
        Route::resource('job',JobController::class);
        Route::post('/completejob/{job}', [JobController::class, 'completejob'])->name('completejob');
        Route::resource('status',StatusController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('field', FieldController::class);
        Route::resource('project', ProjectController::class);
        Route::resource('transection', TransectionController::class);
        Route::post('transection/{transection}/accept',[TransectionController::class,'accept'])->name('transectionaccept');
        Route::post('transection/{transection}/reject',[TransectionController::class,'reject'])->name('transectionreject');
        Route::resource('department',DepartmentController::class);
        
        Route::get('goodssol',[ShowController::class,'index'])->name('goodssol');
    });
});

require __DIR__.'/auth.php';
