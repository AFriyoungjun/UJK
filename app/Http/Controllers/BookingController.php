<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use App\Models\PointRedeem;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index()
    {

        $bookings = Booking::all();

        $latestUpdate = Booking::latest('updated_at')->value('updated_at') ?? now();

        $operational_hours = [
            '08:00',
            '09:00',
            '10:00',
            '11:00',
            '12:00',
            '13:00',
            '14:00',
            '15:00',
            '16:00',
            '17:00',
            '18:00',
            '19:00',
            '20:00',
            '21:00',
            '22:00'
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

    public function pointsIndex()
    {

        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silahkan login terlebih dahulu');
        }

        $rewards = [
            ['id' => 1, 'name' => 'Diskon Rp 10.000', 'cost' => 100, 'icon' => 'bi-tag'],
            ['id' => 2, 'name' => 'Gratis Air Mineral', 'cost' => 50, 'icon' => 'bi-droplet'],
            ['id' => 3, 'name' => 'Gratis Sewa Sepatu', 'cost' => 150, 'icon' => 'bi-universal-access'],
        ];

        $history = PointRedeem::where('user_id', $user->id)
            ->latest()
            ->get();

        return view('point', compact('user', 'rewards', 'history'));
    }

    public function redeem(Request $request)
    {
        $user = User::find(Auth::id());
        $packageId = $request->package;


        $costs = [
            1 => 100,
            2 => 50,
            3 => 150
        ];

        $cost = $costs[$packageId] ?? 0;

        if ($user->points < $cost) {
            return redirect()->back()->with('error', 'Poin tidak mencukupi!');
        }

        // Kurangi poin
        $user->decrement('points', $cost);

        return redirect()->back()->with('success', 'Berhasil menukar poin!');
    }
}
