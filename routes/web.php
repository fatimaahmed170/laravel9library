<?php

use App\Http\Controllers\MyController;
use App\Http\Controllers\AdminPanel\MyController as MyAdminController;
use App\Http\Controllers\AdminPanel\CategoryController as MyAdminCategoryController;
use App\Http\Controllers\AdminPanel\ServiceController as MyAdminServiceController;
use App\Http\Controllers\AdminPanel\ImageController as MyAdminImageController;
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
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', function () {
    return view('welcome');
});

// this is the default index page
Route::get('/', [MyController::class, 'index'])->name('home');
Route::get('/about', [MyController::class, 'about'])->name('about');
Route::get('/references', [MyController::class, 'references'])->name('references');
Route::get('/contact', [MyController::class, 'contact'])->name('contact');
Route::post('/storemessage', [MyController::class, 'storemessage'])->name('storemessage');

// this is the single package page
Route::get('/package/{id}', [MyController::class, 'package'])->name('package');

// navigation parent category and children sub categories
Route::get('/categoryServices/{id}/{slug}', [MyController::class, 'categoryServices'])->name('categoryServices');


// this is the rout-controller-view
Route::get('/Param/{$p}', [MyController::class, 'test'])->name('test');

Route::prefix('admin')->name('admin.')->group(function () {
// my AdminPanle route

    Route::get('/', [MyAdminController::class, 'index'])->name('index');

    Route::get('/setting', [MyAdminController::class, 'setting'])->name('setting');
    Route::post('/setting/update', [MyAdminController::class, 'settingUpdate'])->name('setting');

    Route::prefix('category')->name('category.')->controller(MyAdminCategoryController::class)->group(function () {


        // my AdminPanle category-list
        Route::get('/', 'index')->name('index');
        // my AdminPanle create
        Route::get('/create', 'create')->name('create');
        // my AdminPanle store
        Route::post('/store', 'store')->name('store');
        // my AdminPanle update
        Route::post('/update/{id}', 'update')->name('update');
        // my AdminPanle edit
        Route::get('/edit/{id}', 'edit')->name('edit');
        // my Adminpanle show
        Route::get('/show/{id}', 'show')->name('show');
        // my Adminpanle show
        Route::get('/delete/{id}', 'delete')->name('delete');
        // my Adminpanle show
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    // serivces starting
    Route::prefix('service')->name('service.')->controller(MyAdminServiceController::class)->group(function () {
        // my AdminPanle category-list
        Route::get('/', 'index')->name('index');
        // my AdminPanle create
        Route::get('/create', 'create')->name('create');
        // my AdminPanle store
        Route::post('/store', 'store')->name('store');
        // my AdminPanle update
        Route::post('/update/{id}', 'update')->name('update');
        // my AdminPanle edit
        Route::get('/edit/{id}', 'edit')->name('edit');
        // my Adminpanle show
        Route::get('/show/{id}', 'show')->name('show');

        // my Adminpanle show
        Route::get('/delete/{id}', 'delete')->name('delete');
        // my Adminpanle show
        Route::get('/destroy/{id}', 'destroy')->name('destroy');
    });

    // for the image
    Route::prefix('image')->name('image.')->controller(MyAdminImageController::class)->group(function () {
        // my AdminPanle category-list
        Route::get('/{pid}', 'index')->name('index');
        // my AdminPanle create
        Route::get('/create/{pid}', 'create')->name('create');
        // my AdminPanle store
        Route::post('/store/{pid}', 'store')->name('store');
        // my AdminPanle update
        Route::post('/update/{pid}/{id}', 'update')->name('update');
        Route::get('/delete/{pid}/{id}', 'delete')->name('delete');
        // my Adminpanle show
        Route::get('/destroy/{pid}/{id}', 'destroy')->name('destroy');
    });


});
