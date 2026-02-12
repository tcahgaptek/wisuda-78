<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerima Tamu Wisuda UMP 78</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f9;
            color: #333;
        }
        .hero-section {
            background: linear-gradient(135deg, #004a99 0%, #007bff 100%);
            color: white;
            padding: 40px 0;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .search-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            margin-top: -60px;
        }
        .result-item {
            border-left: 5px solid #007bff;
            transition: transform 0.2s;
        }
        .result-item:hover {
            transform: scale(1.02);
        }
        .seat-badge {
            font-size: 1.2rem;
            font-weight: bold;
            background-color: #e7f1ff;
            color: #007bff;
            padding: 10px 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="hero-section text-center">
    <div class="container">
        <h2 class="fw-bold">Wisuda UMP ke-78</h2>
        <p>Sistem Pencarian Lokasi Tempat Duduk Undangan</p>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card search-card p-4">
                <div class="mb-3">
                    <label for="searchInput" class="form-label fw-semibold">Cari Nama Undangan / Wisudawan</label>
                    <input type="text" id="searchInput" class="form-control form-control-lg" placeholder="Masukkan nama..." onkeyup="searchGuest()">
                </div>
                <div id="resultCount" class="text-muted small mb-2"></div>
                <div id="guestList" class="list-group">
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
    // DATA UNDANGAN (Silakan ganti/tambah di sini)
    const guests = [
        { nama: "Budi Santoso", kategori: "Orang Tua - Teknik Informatika", lokasi: "Sektor A, Baris 2, No 12" },
        { nama: "Siti Aminah", kategori: "VVIP - Senat", lokasi: "Barisan Depan, Kursi 05" },
        { nama: "Rudi Hermawan", kategori: "Orang Tua - Farmasi", lokasi: "Sektor C, Baris 5, No 01" },
        { nama: "Dewi Lestari", kategori: "Undangan Khusus", lokasi: "Sektor B, Baris 1, No 08" },
        // Tambahkan data lainnya
    ];

    function searchGuest() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const guestList = document.getElementById('guestList');
        const resultCount = document.getElementById('resultCount');
        
        guestList.innerHTML = '';
        
        if (input.length < 2) {
            resultCount.innerHTML = '';
            return;
        }

        const filtered = guests.filter(g => g.nama.toLowerCase().includes(input));
        resultCount.innerHTML = `Ditemukan ${filtered.length} hasil`;

        filtered.forEach(g => {
            const item = `
                <div class="list-group-item result-item mb-3 p-3 shadow-sm rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-1 fw-bold">${g.nama}</h5>
                            <p class="mb-1 text-secondary">${g.kategori}</p>
                        </div>
                        <div class="seat-badge text-center">
                            <small class="d-block text-uppercase" style="font-size: 0.7rem;">Lokasi</small>
                            ${g.lokasi}
                        </div>
                    </div>
                </div>
            `;
            guestList.innerHTML += item;
        });

        if (filtered.length === 0) {
            guestList.innerHTML = '<div class="text-center p-4">Data tidak ditemukan</div>';
        }
    }
</script>

<footer class="text-center mt-5 p-4 text-muted">
    <small>&copy; 2026 Tim IT Wisuda UMP</small>
</footer>

</body>
</html>
