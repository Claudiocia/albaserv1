<?php

use App\Http\Controllers\AlaController;
use App\Http\Controllers\AlbaController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\AndarController;
use App\Http\Controllers\DepartController;
use App\Http\Controllers\PredioController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuperController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group([
    'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'can:admin'
], function (){
    Route::name('dashboard-admin')->get('dashboard', [UserController::class, 'admin']);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::get('users/{user}/role-rel', [UserController::class, 'rolerel'])->name('users.rolerel');
});

Route::group([
    'prefix' => 'pesq', 'as' => 'pesq.', 'middleware' => 'can:pesq'
], function (){
    Route::name('dashboard-pesq')->get('dashboard', [UserController::class, 'pesq']);
    Route::resource('albas', AlbaController::class);
    Route::resource('predios', PredioController::class);
    Route::resource('alas', AlaController::class);
    Route::resource('andars', AndarController::class);
    Route::resource('ambientes', AmbienteController::class);
    Route::resource('supers', SuperController::class);
    Route::resource('departs', DepartController::class);

    Route::get('get-alas/{idPredio}', [AmbienteController::class, 'getAlas']);
    Route::get('get-andars/{idAla}', [AmbienteController::class, 'getAndars']);

});
