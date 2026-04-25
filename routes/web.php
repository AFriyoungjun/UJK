<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
<<<<<<< HEAD
use App\Http\Controllers\RewardController;
=======
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {

    // Halaman Utama Dashboard (Sekarang ditangani oleh Controller)
    Route::get('/dashboard', [BookingController::class, 'index'])->name('dashboard');

    // Proses Simpan Booking
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
<<<<<<< HEAD

    Route::get('/point', [BookingController::class, 'pointsIndex'])->name('point');

    Route::post('/points/redeem', [BookingController::class, 'redeem'])->name('points.redeem');
=======
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Halaman Management (Tabel semua booking)
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

<<<<<<< HEAD
    Route::post('/rewards', [RewardController::class, 'store'])->name('rewards.store');

    Route::resource('rewards', RewardController::class);

=======
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
    // Fitur Edit
    Route::get('/booking/{id}/edit', [AdminController::class, 'edit'])->name('booking.edit');
    Route::put('/booking/{id}', [AdminController::class, 'update'])->name('booking.update');

    // Fitur Delete
    Route::delete('/booking/{id}', [AdminController::class, 'destroy'])->name('booking.destroy');
});

Route::post('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

require __DIR__ . '/auth.php';
