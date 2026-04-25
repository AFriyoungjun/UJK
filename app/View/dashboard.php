<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Booking Futsal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white border-b border-gray-100 p-4 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between">
            <span class="font-bold text-xl text-blue-600">FutsalCenter</span>
            <span class="text-gray-500 italic">Mode Preview (Tanpa Login)</span>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold text-gray-800">Riwayat Pesanan Lapangan</h3>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">+ Tambah Booking</button>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-b">Lapangan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-b">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-b">Jam</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-b">Durasi</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-b">Harga</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase border-b">Status</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($bookings as $booking)
                            <tr>
                                <td class="px-6 py-4 font-medium">{{ $booking->field_name }}</td>
                                <td class="px-6 py-4">{{ $booking->booking_date }}</td>
                                <td class="px-6 py-4">{{ $booking->start_time }} WIB</td>
                                <td class="px-6 py-4">{{ $booking->duration }} Jam</td>
                                <td class="px-6 py-4 text-green-600 font-semibold">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $booking->status == 'Success' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $booking->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button class="text-indigo-600 mr-2 hover:underline">Edit</button>
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>