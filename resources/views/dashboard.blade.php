<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Lapangan Futsal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
            padding-bottom: 80px;
        }

        .field-section {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .field-title {
            color: #1e3a8a;
            font-weight: 800;
            border-left: 5px solid #1e3a8a;
            padding-left: 15px;
            margin-bottom: 25px;
        }

        .slot-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
            gap: 12px;
        }

        .slot {
            height: 90px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            transition: all 0.2s ease;
            text-decoration: none;
            border: 2px solid #e5e7eb;
        }

        /* Gaya Jam yang Tersedia */
        .available {
            background-color: #ffffff;
            color: #374151;
            cursor: pointer;
        }

        .available:hover {
            border-color: #10b981;
            background-color: #ecfdf5;
            transform: translateY(-3px);
        }

        .available .status-text {
            color: #10b981;
            font-size: 0.7rem;
            font-weight: bold;
        }

        .user-profile-section {
            background: white;
            border-radius: 15px;
            padding: 15px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .member-points {
            background: linear-gradient(135deg, #1e3a8a, #3b82f6);
            color: white;
            padding: 8px 18px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            background: #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #6b7280;
        }

        /* Gaya Jam yang Terisi (Sudah Booking) */
        .booked {
            background-color: #fee2e2;
            border-color: #f87171;
            color: #991b1b;
            cursor: not-allowed;
        }

        .booked .user-name {
            font-size: 0.75rem;
            font-weight: bold;
            margin-top: 5px;
            color: #b91c1c;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 90%;
        }

        .booked .status-text {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.8;
        }

        .time-label {
            font-size: 1.1rem;
            font-weight: 700;
        }

        .legend-card {
            background: white;
            border-radius: 50px;
            padding: 10px 30px;
            display: inline-flex;
            gap: 25px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <div class="container mt-4">
            <div class="user-profile-section">
                <div class="d-flex align-items-center gap-3">
                    <div class="user-avatar">
                        <i class="bi bi-person-fill"></i>
                    </div>
                    <div>
                        <h6 class="mb-0 fw-bold">Halo, {{ Auth::user()->name }}</h6>
                        <form action="{{ route('logout') }}" method="POST" class="mt-1">
                            @csrf
                            <button type="submit" class="p-0 border-0 bg-transparent text-danger small" style="font-size: 0.75rem;">
                                Keluar Aplikasi
                            </button>
                        </form>
                    </div>
                </div>

<<<<<<< HEAD
                <div class="d-flex flex-column align-items-end gap-2">
                    <div class="member-points">
                        <i class="bi bi-star-fill text-warning"></i>
                        <span>{{ Auth::user()->points ?? 0 }} Poin</span>
                    </div>

                    <a href="{{ route('point') }}" class="btn btn-sm btn-outline-primary" style="font-size: 0.7rem; border-radius: 50px;">
                        <i class="bi bi-gift"></i> Tukar Koin
                    </a>
=======
                <div class="member-points">
                    <i class="bi bi-star-fill text-warning"></i>
                    <span>450 Poin</span>
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
                </div>
            </div>
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pilih Jadwal Main</h2>
                <div class="legend-card mt-3">
                    <div class="legend-item">
                        <div class="dot" style="background: #e5e7eb; border: 1px solid #9ca3af;"></div> Kosong
                    </div>
                    <div class="legend-item">
                        <div class="dot" style="background: #f87171;"></div> Terisi
                    </div>
                </div>
            </div>

            <div class="container mt-3">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="border-radius: 12px; background-color: #dcfce7; color: #166534;">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert" style="border-radius: 12px; background-color: #fee2e2; color: #991b1b;">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <div><strong>Pemesanan Gagal:</strong> {{ session('error') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>

            <div class="text-secondary text-center mb-4" style="font-size: 0.85rem;">
                <i class="bi bi-arrow-clockwise"></i> Status jadwal terakhir diperbarui pada: <br>
                <span class="fw-bold text-dark">
                    {{ \Carbon\Carbon::parse($latestUpdate)->locale('id')->translatedFormat('d F Y, \J\a\m H:i') }} WIB
                </span>
            </div>
            <div class="field-section">
                <h4 class="field-title">LAPANGAN 1 (Sintetis)</h4>
                <div class="slot-grid">
                    @foreach($operational_hours as $hour)
                    @php
                    // Format jam saat ini menjadi objek Carbon untuk perbandingan (contoh: "08:00")
                    $currentSlot = \Carbon\Carbon::createFromFormat('H:i', $hour);

                    $isBooked = $bookings->where('id_lapangan', 1)->filter(function ($booking) use ($currentSlot) {
                    $start = \Carbon\Carbon::parse($booking->jam_mulai);
                    // Jam selesai = jam mulai + durasi
                    $end = $start->copy()->addHours($booking->durasi);

                    // Cek apakah jam slot sekarang masuk dalam rentang booking
                    return $currentSlot->greaterThanOrEqualTo($start) && $currentSlot->lessThan($end);
                    })->first();
                    @endphp

                    @if($isBooked)
                    <div class="slot booked">
                        <div class="time-label">{{ $hour }}</div>
                        <div class="status-text">BOOKED</div>
                        <div class="user-name">{{ $isBooked->nama_pemesan }}</div>
                    </div>
                    @else
                    <div class="slot available">
                        <div class="time-label">{{ $hour }}</div>
                        <div class="status-text">KOSONG</div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="field-section">
            <h4 class="field-title">LAPANGAN 2 (Vinyl)</h4>
            <div class="slot-grid">
                @foreach($operational_hours as $hour)
                @php
                // Cek apakah ada booking di lapangan 1 pada jam ini
                // Tambahkan ':00' karena format DB MySQL menyimpan jam seperti '08:00:00'
                $isBooked = $bookings->where('id_lapangan', 2)->where('jam_mulai', $hour.':00')->first();
                @endphp

                @if($isBooked)
                <div class="slot booked">
                    <div class="time-label">{{ $hour }}</div>
                    <div class="status-text">BOOKED</div>
                    <div class="user-name">{{ $isBooked->nama_pemesan }}</div>
                </div>
                @else
                <div class="slot available">
                    <div class="time-label">{{ $hour }}</div>
                    <div class="status-text">KOSONG</div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-primary btn-lg px-5 shadow"
                data-bs-toggle="modal"
                data-bs-target="#bookingModal">
                Lanjutkan Booking
            </button>
        </div>
    </div>

    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow" style="border-radius: 20px; overflow: hidden;">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fw-bold" id="bookingModalLabel" style="color: #1e3a8a;">
                        Formulir Pemesanan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('booking.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small mb-1">Nama Pemesan</label>
                            <input type="text" name="nama_pemesan" class="form-control form-control-lg bg-light border-0" placeholder="Masukkan nama lengkap" required style="font-size: 0.95rem; border-radius: 10px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-secondary small mb-1">Pilih Lapangan</label>
                            <select name="id_lapangan" class="form-select form-select-lg bg-light border-0" required style="font-size: 0.95rem; border-radius: 10px;">
                                <option value="" selected disabled>Pilih Lapangan...</option>
                                <option value="1">Lapangan 1 (Sintetis)</option>
                                <option value="2">Lapangan 2 (Vinyl)</option>
                            </select>
                        </div>

                        <div class="row gx-3">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-semibold text-secondary small mb-1">Jam Mulai</label>
                                <input type="time" name="jam_mulai" class="form-control form-control-lg bg-light border-0" required style="font-size: 0.95rem; border-radius: 10px;">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-semibold text-secondary small mb-1">Durasi</label>
                                <select name="durasi" class="form-select form-select-lg bg-light border-0" required style="font-size: 0.95rem; border-radius: 10px;">
                                    <option value="1">1 Jam</option>
                                    <option value="2">2 Jam</option>
                                    <option value="3">3 Jam</option>
                                </select>
                            </div>
                        </div>

                        <div class="alert d-flex align-items-center mt-2 mb-0" style="background-color: #eff6ff; color: #1e3a8a; border: none; border-radius: 12px; font-size: 0.85rem;">
                            <div class="me-2 fw-bold fs-5">ℹ️</div>
                            <div>Pembayaran dilakukan di kasir atau via transfer setelah konfirmasi.</div>
                        </div>
                    </div>

                    <div class="modal-footer border-0 px-4 pb-4 pt-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-light px-4 py-2" data-bs-dismiss="modal" style="border-radius: 10px; font-weight: 600; color: #6b7280;">Batal</button>
                        <button type="submit" class="btn btn-primary px-5 py-2 shadow-sm" style="background: #1e3a8a; border: none; border-radius: 10px; font-weight: 600;">Pesan Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>