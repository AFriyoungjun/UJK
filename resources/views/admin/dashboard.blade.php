<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manajemen Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }

        .admin-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background-color: #1e3a8a;
            color: white;
        }

        .btn-edit {
            color: #f59e0b;
        }

        .btn-delete {
            color: #ef4444;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"><i class="bi bi-speedometer2"></i> Dashboard Admin</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger shadow-sm">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>

        @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
            {{ session('success') }}
        </div>
        @endif

        <div class="admin-card">
            <h4 class="mb-4 fw-bold text-primary">Daftar Seluruh Booking</h4>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pemesan</th>
                            <th>Lapangan</th>
                            <th>Jam Mulai</th>
                            <th>Durasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookings as $item)
                        <tr>
                            <td>#{{ $item->id }}</td>
                            <td class="fw-bold">{{ $item->nama_pemesan }}</td>
                            <td>
                                @if($item->id_lapangan == 1)
                                <span class="badge bg-info text-dark">
                                    <i class="bi bi-square-fill me-1"></i> Lapangan 1 (Sintetis)
                                </span>
                                @elseif($item->id_lapangan == 2)
                                <span class="badge bg-success">
                                    <i class="bi bi-square-fill me-1"></i> Lapangan 2 (Vinyl)
                                </span>
                                @else
                                <span class="badge bg-secondary">Lapangan {{ $item->field_id }}</span>
                                @endif
                            </td>
                            <td><i class="bi bi-clock me-1"></i> {{ $item->jam_mulai }}</td>
                            <td>{{ $item->durasi }} Jam</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.booking.edit', $item->id) }}" class="btn btn-light btn-sm border">
                                        <i class="bi bi-pencil-square text-warning"></i>
                                    </a>

                                    <form action="{{ route('admin.booking.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-light btn-sm border">
                                            <i class="bi bi-trash text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-4">Belum ada data booking.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>