<?php

use App\Http\Controllers\Mycontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\verify_user;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::post('login_check',[Mycontroller::class,'login_check'])->name('login_check');

Route::get('update',[Mycontroller::class,'update']);

Route::get('count',[Mycontroller::class,'count']);

Route::middleware(verify_user::class)->group(function(){
    Route::get('dashboard',[Mycontroller::class,'homepage'])->name('dashboard');

    Route::get('new_add',function(){
        return view('add_new');
    })->name('new.add');

    Route::post('add_new',[Mycontroller::class,'add_new'])->name('add.new.d');

    Route::get('select_date',[Mycontroller::class,'select_date'])->name('select.date');

    Route::post('add_date',[Mycontroller::class,'selected_date'])->name('selected.date');

    Route::post('date_add',[Mycontroller::class,'add_date'])->name('add.daliya');

    Route::get('dashboard_date',[Mycontroller::class,'seen_d'])->name('seen.daliya');

    Route::post('seen_show',[Mycontroller::class,'seen_show'])->name('seen.show');


    Route::get('logout',function(){
        session()->flush();
        return redirect('/');
    })->name('logout');
});
