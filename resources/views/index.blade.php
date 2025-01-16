<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemeriksa Keamanan Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f4f9;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <h1>Scraping Tools Web</h1>
            <p class="text-muted">Periksa apakah sebuah situs web aman atau tidak</p>
        </div>

        <!-- Bagian Tutorial -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Cara Penggunaan</h5>
                <p class="card-text">Masukkan URL situs web yang ingin Anda periksa, klik tombol "Cari", dan lihat hasilnya di bawah.</p>
            </div>
        </div>

        <!-- Bagian Input Link -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('scrape') }}" id="web-checker-form">
                    <div class="mb-3">
                        <label for="inputLink" class="form-label">Masukkan URL Situs Web</label>
                        <input type="url" class="form-control" id="inputLink" name="inputLink" placeholder="https://contoh.com" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </form>
            </div>
        </div>

        <!-- Bagian Hasil -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Hasil</h5>
                <div id="result-container" class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Link</th>
                                <th>backdoor</th>
                                <th>Deskripsi</th>
                                <th>Level</th>
                                <th>Waktu</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Hasil akan ditambahkan secara dinamis di sini -->
                            <tr>
                                <td>Contoh Judul</td>
                                <td><a href="https://contoh.com" target="_blank">https://contoh.com</a></td>
                                <td>Deskripsi contoh dari penyerang.</td>
                                <td><span class="badge bg-warning">Sedang</span></td>
                                <td>15:34:22</td>
                                <td>2025-01-15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('web-checker-form').addEventListener('submit', function(event) {
            event.preventDefault();
            // Simulasikan hasil dinamis untuk demonstrasi
            const resultContainer = document.querySelector('#result-container tbody');
            const inputLink = document.getElementById('inputLink').value;
            const newRow = `<tr>
                <td>Judul Dinamis</td>
                <td><a href="${inputLink}" target="_blank">${inputLink}</a></td>
                <td><td>
                <td>Deskripsi yang dihasilkan untuk ${inputLink}</td>
                <td><span class="badge bg-danger">Tinggi</span></td>
                <td>${new Date().toLocaleTimeString('id-ID')}</td>
                <td>${new Date().toLocaleDateString('id-ID')}</td>
            </tr>`;
            resultContainer.insertAdjacentHTML('beforeend', newRow);
        });
    </script>
</body>
</html>
