<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\DistributorController;
use App\Http\Controllers\User\ProfileController;
use App\Models\User\Distributor;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes(['register' => false, 'verify' => true]);

Route::middleware(['auth', 'can:perform-administrative'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('', [ProfileController::class, 'show'])->name('show');
        Route::put('edit-profile', [ProfileController::class, 'editProfile'])->name('edit-profile');
        Route::put('edit-password', [ProfileController::class, 'editPassword'])->name('edit-password');
        Route::put('edit-distributor', [ProfileController::class, 'editDistributor'])->name('edit-distributor');
    });

    Route::get('distributor/{distributor}/verify', function (Distributor $distributor) {
        $distributor->verify();
        return redirect()->route('distributor.show', $distributor->user_id);
    })->name('distributor.verify')->middleware('can:verify,App\Models\User\Distributor');
    Route::resource('distributor', DistributorController::class);

    Route::resource('user', UserController::class);
});

