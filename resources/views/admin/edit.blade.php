<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }

        .edit-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="edit-card">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-light btn-sm me-3"><i class="bi bi-arrow-left"></i></a>
                <h4 class="fw-bold mb-0 text-primary">Edit Jadwal Booking</h4>
            </div>

            <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pemesan</label>
                    <input type="text" name="nama_pemesan" class="form-control form-control-lg bg-light"
                        value="{{ old('nama_pemesan', $booking->nama_pemesan) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Pilih Lapangan</label>
                    <select name="id_lapangan" class="form-select form-control-lg bg-light" required>
                        <option value="1" {{ $booking->id_lapangan == 1 ? 'selected' : '' }}>Lapangan 1 (Sintetis)</option>
                        <option value="2" {{ $booking->id_lapangan == 2 ? 'selected' : '' }}>Lapangan 2 (Vinyl)</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control form-control-lg bg-light"
                            value="{{ old('jam_mulai', \Carbon\Carbon::parse($booking->jam_mulai)->format('H:i')) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Durasi (Jam)</label>
                        <select name="durasi" class="form-select form-control-lg bg-light" required>
                            @for($i = 1; $i <= 3; $i++)
                                <option value="{{ $i }}" {{ $booking->durasi == $i ? 'selected' : '' }}>{{ $i }} Jam</option>
                                @endfor
                        </select>
                    </div>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm" style="background-color: #1e3a8a; border: none;">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>