<?php

namespace App\Http\Controllers;

use App\Models\Booking;
<<<<<<< HEAD
use App\Models\Rewards;
=======
use App\Models\Field; // Asumsi Anda punya model Field
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 1. Menampilkan semua daftar booking (READ)
    public function index()
    {
        $bookings = Booking::with('user')->orderBy('jam_mulai', 'asc')->get();
<<<<<<< HEAD

        $rewards = Rewards::all();

        return view('admin.dashboard', compact('bookings', 'rewards'));
=======
        return view('admin.dashboard', compact('bookings'));
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
    }

    // 2. Menampilkan form untuk edit jadwal (EDIT)
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        // Kita butuh data lapangan untuk dropdown di form edit
        return view('admin.edit', compact('booking'));
    }

    // 3. Memproses perubahan data (UPDATE)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemesan' => 'required',
            'jam_mulai' => 'required',
            'durasi' => 'required|integer',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Jadwal berhasil diperbarui!');
    }

    // 4. Menghapus jadwal (DELETE)
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Jadwal berhasil dihapus!');
    }
}