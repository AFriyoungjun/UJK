<?php

namespace App\Http\Controllers;

use App\Models\rewards;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    // Tampilkan daftar hadiah untuk Admin
    public function index()
    {
        $rewards = rewards::all();
        return view('admin.rewards.index', compact('rewards'));
    }

    // Simpan hadiah baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_hadiah' => 'required|string|max:255',
            'harga_poin' => 'required|integer|min:1',
            'icon' => 'required'
        ]);

        rewards::create($request->all());

        return redirect()->back()->with('success', 'Hadiah berhasil ditambahkan!');
    }

    // Update hadiah (jika ingin edit harga poin)
    public function update(Request $request, $id)
    {
        $reward = rewards::findOrFail($id);
        $reward->update($request->all());

        return redirect()->back()->with('success', 'Hadiah berhasil diperbarui!');
    }

    // Hapus hadiah
    public function destroy($id)
    {
        rewards::destroy($id);
        return redirect()->back()->with('success', 'Hadiah berhasil dihapus!');
    }
}