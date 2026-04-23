<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminController;
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
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Halaman Management (Tabel semua booking)
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

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
