<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        
        $bookings = Booking::all(); 

        $latestUpdate = Booking::latest('updated_at')->value('updated_at') ?? now();

        $operational_hours = [
            '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', 
            '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', 
            '20:00', '21:00', '22:00'
        ];

        return view('dashboard', compact('bookings', 'operational_hours', 'latestUpdate'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string',
            'id_lapangan' => 'required|integer',
            'jam_mulai' => 'required',
            'durasi' => 'required|integer',
        ]);

        $startTime = Carbon::parse($request->jam_mulai);
        
        $durasi = (int) $request->durasi;
        $endTime = $startTime->copy()->addHours($durasi); 

        $isBooked = Booking::where('id_lapangan', $request->id_lapangan)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where('jam_mulai', '<', $endTime->format('H:i:s'))
                      ->whereRaw('DATE_ADD(jam_mulai, INTERVAL durasi HOUR) > ?', [$startTime->format('H:i:s')]);
            })->exists();

        if ($isBooked) {
            return redirect()->back()->with('error', 'Gagal! Jam tersebut sudah terisi atau durasi Anda menabrak jadwal lain.');
        }

        Booking::create($request->all());

        return redirect()->back()->with('success', 'Lapangan berhasil dibooking!');
    }
}