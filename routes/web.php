<?php

use App\Http\Controllers\EmpleadosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('empleados',EmpleadosController::class)->middleware('auth');
Route::view('login','login')->name('login')->middleware('guest');
Route::get('/empleados/{empleado}/status', [EmpleadosController::class, 'status'])->name('empleados.status')->middleware('auth');


Route::post('login',function(){
    $credentials = request()->only('email','password');
    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect('empleados');        
    }    
    return redirect('login');
});

Route::post('logout',function(){
    Auth::logout();
    return redirect('login');
})->name('logout');

// require __DIR__.'/auth.php';
