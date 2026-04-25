<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>Admin - Manajemen Booking & Hadiah</title>
=======
    <title>Admin - Manajemen Booking</title>
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
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
<<<<<<< HEAD
            margin-bottom: 30px;
=======
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
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
<<<<<<< HEAD

        /* Style tambahan untuk manajemen hadiah */
        .reward-icon-preview {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e0e7ff;
            border-radius: 10px;
            color: #4338ca;
        }
=======
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
    </style>
</head>

<body>

<<<<<<< HEAD
    <div class="container mt-5 pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"><i class="bi bi-speedometer2"></i> Dashboard Admin</h2>
            <div class="d-flex gap-2">
                <a href="{{ route('point') }}" class="btn btn-outline-primary shadow-sm">
                    <i class="bi bi-eye"></i> Lihat Sisi User
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger shadow-sm">
                        <i class="bi bi-box-arrow-right"></i> Keluar
                    </button>
                </form>
            </div>
=======
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold"><i class="bi bi-speedometer2"></i> Dashboard Admin</h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger shadow-sm">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
        </div>

        @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4">
<<<<<<< HEAD
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
=======
            {{ session('success') }}
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
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
<<<<<<< HEAD
                                <span class="badge bg-info text-dark">Lapangan 1 (Sintetis)</span>
                                @elseif($item->id_lapangan == 2)
                                <span class="badge bg-success">Lapangan 2 (Vinyl)</span>
                                @else
                                <span class="badge bg-secondary">Lapangan {{ $item->id_lapangan }}</span>
=======
                                <span class="badge bg-info text-dark">
                                    <i class="bi bi-square-fill me-1"></i> Lapangan 1 (Sintetis)
                                </span>
                                @elseif($item->id_lapangan == 2)
                                <span class="badge bg-success">
                                    <i class="bi bi-square-fill me-1"></i> Lapangan 2 (Vinyl)
                                </span>
                                @else
                                <span class="badge bg-secondary">Lapangan {{ $item->field_id }}</span>
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
                                @endif
                            </td>
                            <td><i class="bi bi-clock me-1"></i> {{ $item->jam_mulai }}</td>
                            <td>{{ $item->durasi }} Jam</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.booking.edit', $item->id) }}" class="btn btn-light btn-sm border">
                                        <i class="bi bi-pencil-square text-warning"></i>
                                    </a>
<<<<<<< HEAD
=======

>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
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
<<<<<<< HEAD

        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-primary mb-0">Manajemen Hadiah Poin</h4>
                <button class="btn btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTambahHadiah">
                    <i class="bi bi-plus-circle"></i> Tambah Hadiah
                </button>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light text-dark">
                        <tr>
                            <th>Icon</th>
                            <th>Nama Hadiah</th>
                            <th>Harga Poin</th>
                            <th style="width: 150px;">Stok</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rewards as $reward)
                        <tr>
                            <td>
                                <div class="reward-icon-preview">
                                    <i class="bi {{ $reward->icon }} fs-5"></i>
                                </div>
                            </td>
                            <td class="fw-bold">{{ $reward->nama_hadiah }}</td>
                            <td><span class="badge bg-warning text-dark">{{ $reward->harga_poin }} Poin</span></td>
                            <td>
                                <form action="{{ route('admin.rewards.update', $reward->id) }}" method="POST" class="d-flex gap-1">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="stok" class="form-control form-control-sm" value="{{ $reward->stok }}">
                                    <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-check-lg"></i></button>
                                </form>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.rewards.destroy', $reward->id) }}" method="POST" onsubmit="return confirm('Hapus hadiah ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-light btn-sm border">
                                        <i class="bi bi-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-secondary py-4">Belum ada daftar hadiah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalTambahHadiah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{ route('admin.rewards.store') }}" method="POST" class="modal-content border-0 shadow">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Tambah Hadiah Baru</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Hadiah</label>
                        <input type="text" name="nama_hadiah" class="form-control" placeholder="Contoh: Gratis Minuman" required>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Harga Poin</label>
                            <input type="number" name="harga_poin" class="form-control" placeholder="100" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-bold">Stok Awal</label>
                            <input type="number" name="stok" class="form-control" value="10" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Pilih Icon</label>
                        <select name="icon" class="form-select">
                            <option value="bi-gift">Hadiah (bi-gift)</option>
                            <option value="bi-cup-hot">Minuman (bi-cup-hot)</option>
                            <option value="bi-tag">Diskon (bi-tag)</option>
                            <option value="bi-droplet">Air Mineral (bi-droplet)</option>
                            <option value="bi-universal-access">Sewa Alat (bi-universal-access)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan Hadiah</button>
                </div>
            </form>
        </div>
=======
>>>>>>> fab1a56f7cc4cff3da7bbc49836c65706ffc2b9e
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>