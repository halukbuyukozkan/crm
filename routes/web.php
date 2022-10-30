<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobCommentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserDayoffController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\DepartmentfolderController;
use App\Http\Controllers\DepartmentfolderFileController;
use App\Http\Controllers\ProjectTransectionController;
use App\Http\Controllers\TransectionCategoryController;
use App\Http\Controllers\ProjectTransectionPayBackController;

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
        //DAYOFF
        Route::resource('user.dayoff',UserDayoffController::class);
        Route::post('/user/{user}/approve/{dayoff}', [UserDayoffController::class,'approve'])->name('dayoffapprove');
        Route::delete('/user/{user}/destroyindex/{dayoff}', [UserDayoffController::class,'destroyindex'])->name('dayoffdelete');

        Route::get('calendar',[UserDayoffController::class,'calendar'])->name('calendar');

        //JOBS
        Route::resource('job',JobController::class);
        Route::post('/completejob/{job}', [JobController::class, 'completejob'])->name('completejob');
        Route::post('/completerequest/{job}', [JobController::class, 'completerequest'])->name('completerequest');
        Route::post('/addfile/{job}', [JobController::class, 'addfile'])->name('jobaddfile');

        Route::resource('job.comment',JobCommentController::class);

        Route::resource('status',StatusController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('field', FieldController::class);
        Route::resource('project', ProjectController::class);

        //Transections
        Route::resource('project.transection', ProjectTransectionController::class);
        Route::get('project/{project}/transection/create/type/{type}', [ProjectTransectionController::class,'create'])->name('transection.create');
        Route::post('project/{project}/transection/{transection}/payback/store', [ProjectTransectionPayBackController::class,'storePayBack'])->name('payBack');
        //Transections buttons
        Route::post('project.transection/{transection}/approve',[ProjectTransectionController::class,'approve'])->name('transectionapprove');
        Route::post('project.transection/{transection}/complete',[ProjectTransectionController::class,'complete'])->name('transectioncomplete');
        Route::post('project.transection/{transection}/reject',[ProjectTransectionController::class,'reject'])->name('transectionreject');
        Route::post('project.transection/{transection}/reverse',[ProjectTransectionController::class,'reverse'])->name('transectionreverse');
        Route::post('project.transection/{transection}/accounting',[ProjectTransectionController::class,'accounting'])->name('transectionaccounting');

        //Transection categories
        Route::resource('project.transectioncategory',TransectionCategoryController::class);

        Route::resource('department',DepartmentController::class);
        Route::resource('department.folder',DepartmentfolderController::class);
        Route::resource('department.folder.file',DepartmentfolderFileController::class);
        
        Route::get('goodssol',[ShowController::class,'index'])->name('goodssol');
    });
});

require __DIR__.'/auth.php';
