<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\usersManagementController;
use App\Http\Controllers\categoriesController;


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
    return view('pages.index');
})->name('index');
    Route::get('/login',[userController::class, 'showLogin'])->name('login');
    Route::get('/register',[userController::class, 'showRegister'])->name('register');
    Route::post('/doRegister',[userController::class, 'doRegister'])->name('doRegister');
    Route::post('/doLogin',[userController::class, 'doLogin'])->name('doLogin');
    Route::get('/doLogout',[userController::class, 'doLogout'])->name('doLogout');
    
Route::group(['middleware'=>'admin','prefix'=>'admin'],function(){
    Route::get('/dashbroad', function(){
        return view('admin.dashbroad');
    })->name('admin');
    Route::get('/usersManagement', [usersManagementController::class,'showIndex'])->name('admin.users');
    Route::get('/userShowAdd', [usersManagementController::class,'showAdd'])->name('admin.users.showAdd');
    Route::post('/userdoAdd', [usersManagementController::class,'doAdd'])->name('admin.users.doAdd');
    Route::any('/userEdit/{id}', [usersManagementController::class,'showEdit'])->name('admin.users.showEdit');
    Route::post('/userUpdate/{id}', [usersManagementController::class,'doUpdate'])->name('admin.user.doUpdate');
    Route::post('/userDelete/{id}', [usersManagementController::class,'doDelete'])->name('admin.user.doDelete');

    Route::get('/categories', [categoriesController::class,'index'])->name('admin.categories.index');
    Route::get('/categories/create', [categoriesController::class,'create'])->name('admin.categories.create');
    Route::get('/categories/createChild', [categoriesController::class,'createChild'])->name('admin.categories.createChild');
    Route::post('/categories/store', [categoriesController::class,'store'])->name('admin.categories.store');
    Route::post('/categories/storeChild', [categoriesController::class,'storeChild'])->name('admin.categories.storeChild');
    Route::any('/categories/editChild/{id}', [categoriesController::class,'editChild'])->name('admin.categories.editChild');
    Route::post('/categories/updateChild/{id}', [categoriesController::class,'updateChild'])->name('admin.categories.updateChild');
    Route::post('/categories/destroyChild/{id}', [categoriesController::class,'destroyChild'])->name('admin.categories.destroyChild');
    Route::post('/categories/destroy/{id}', [categoriesController::class,'destroy'])->name('admin.categories.destroy');
    Route::get('/categories/edit/{id}', [categoriesController::class,'edit'])->name('admin.categories.edit');
    
});
    