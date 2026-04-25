<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tukar Poin Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Inter', sans-serif;
        }

        .reward-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.2s;
        }

        .reward-card:hover {
            transform: scale(1.02);
        }

        /* Styling tambahan untuk tabel riwayat */
        .history-section {
            background: white;
            border-radius: 20px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #f8fafc;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            color: #64748b;
            border-top: none;
        }
    </style>
</head>

<body>
    <div class="container py-4">
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 12px;">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger border-0 shadow-sm mb-4" style="border-radius: 12px;">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            </div>
        @endif

        <div class="d-flex align-items-center mb-4">
            <a href="{{ url()->previous() }}" class="btn btn-light rounded-circle me-3 shadow-sm">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h4 class="fw-bold mb-0">Penukaran Poin</h4>
        </div>

        <div class="card border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #1e3a8a, #3b82f6); border-radius: 20px;">
            <div class="card-body p-4 text-white text-center">
                <p class="mb-1 opacity-75">Saldo Poin Anda</p>
                <h1 class="display-5 fw-bold">{{ $user->points }}</h1>
                <small><i class="bi bi-info-circle"></i> Kumpulkan poin dari setiap booking lapangan!</small>
            </div>
        </div>

        <h6 class="fw-bold mb-3">Pilih Hadiah Menarik</h6>
        <div class="row g-3 mb-5">
            @foreach($rewards as $reward)
            <div class="col-12 col-md-6">
                <div class="card reward-card shadow-sm">
                    <div class="card-body d-flex align-items-center p-3">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3 text-primary">
                            <i class="bi {{ $reward['icon'] }} fs-3"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold mb-0">{{ $reward['name'] }}</h6>
                            <small class="text-secondary">{{ $reward['cost'] }} Poin</small>
                        </div>
                        <form action="{{ route('points.redeem') }}" method="POST">
                            @csrf
                            <input type="hidden" name="package" value="{{ $reward['id'] }}">
                            <button type="submit" class="btn btn-primary btn-sm rounded-pill px-4 fw-bold">Tukar</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <h6 class="fw-bold mb-3">Riwayat Penukaran Terakhir</h6>
        <div class="card border-0 shadow-sm history-section">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4 py-3">Apa yang Ditukar</th>
                            <th>Poin</th>
                            <th>Tanggal & Jam</th>
                            <th class="pe-4 text-end">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($history as $log)
                        <tr>
                            <td class="ps-4">
                                <div class="fw-bold text-dark">{{ $log->nama_hadiah }}</div>
                                <small class="text-muted small">ID Transaksi: #PR-{{ $log->id }}</small>
                            </td>
                            <td>
                                <span class="text-danger fw-bold">-{{ $log->point_cost }}</span>
                            </td>
                            <td>
                                <div class="text-dark" style="font-size: 0.9rem;">
                                    {{ $log->created_at->translatedFormat('d M Y') }}
                                </div>
                                <div class="text-muted small">
                                    {{ $log->created_at->format('H:i') }} WIB
                                </div>
                            </td>
                            <td class="pe-4 text-end">
                                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">
                                    Berhasil
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <i class="bi bi-inbox text-secondary fs-1 d-block mb-2"></i>
                                <span class="text-secondary">Belum ada riwayat penukaran koin.</span>
                            </td>
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