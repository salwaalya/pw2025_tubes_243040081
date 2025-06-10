<?php include '../../layout/header.php' ?>
<div class="container my-5">
    <!-- Judul & Deskripsi -->
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-2">Daftar Dokter</h1>
        <p class="lead text-secondary">Temukan dokter terbaik sesuai kebutuhan Anda. Gunakan filter pencarian di bawah untuk hasil yang lebih spesifik.</p>
    </div>

    <!-- Filter Pencarian -->
    <form method="GET" class="row g-3 align-items-end mb-5 bg-light p-4 rounded shadow-sm">
        <div class="col-md-5">
            <label for="q" class="form-label fw-semibold">Nama / Spesialisasi</label>
            <input type="text" name="q" id="q" class="form-control" placeholder="Cari nama atau spesialisasi" value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
        </div>
        <div class="col-md-4">
            <label for="spesialis" class="form-label fw-semibold">Spesialisasi</label>
            <select name="spesialis" id="spesialis" class="form-select">
                <option value="">Semua Spesialisasi</option>
                <option value="umum" <?= (isset($_GET['spesialis']) && $_GET['spesialis'] == 'umum') ? 'selected' : '' ?>>Dokter Umum</option>
                <option value="anak" <?= (isset($_GET['spesialis']) && $_GET['spesialis'] == 'anak') ? 'selected' : '' ?>>Dokter Anak</option>
                <option value="gigi" <?= (isset($_GET['spesialis']) && $_GET['spesialis'] == 'gigi') ? 'selected' : '' ?>>Dokter Gigi</option>
            </select>
        </div>
        <div class="col-md-3 d-grid">
            <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-search"></i> Cari</button>
        </div>
    </form>

    <?php
    // Data dokter (dummy)
    $dokter = [
        [
            'nama' => 'dr. Andi Wijaya',
            'spesialis' => 'Dokter Umum',
            'foto' => '../../public/img/dr. Andi Wijaya.jpeg ',
            'jadwal' => 'Senin - Jumat, 08:00 - 15:00'
        ],
        [
            'nama' => 'drg. Siti Rahmawati',
            'spesialis' => 'Dokter Gigi',
            'foto' => '../../public/img/drg. Siti Rahmawati.jpeg',
            'jadwal' => 'Selasa & Kamis, 10:00 - 14:00'
        ],
        [
            'nama' => 'dr. Budi Santoso, Sp.A',
            'spesialis' => 'Dokter Anak',
            'foto' => '../../public/img/dr. Budi Santoso, Sp.A.jpeg',
            'jadwal' => 'Senin & Rabu, 09:00 - 12:00'
        ],
    ];

    // Filter pencarian
    $q = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';
    $spesialis = isset($_GET['spesialis']) ? strtolower(trim($_GET['spesialis'])) : '';

    $hasil = array_filter($dokter, function ($d) use ($q, $spesialis) {
        $matchQ = !$q || (strpos(strtolower($d['nama']), $q) !== false) || (strpos(strtolower($d['spesialis']), $q) !== false);
        $matchSpesialis = !$spesialis || (strpos(strtolower($d['spesialis']), $spesialis) !== false);
        return $matchQ && $matchSpesialis;
    });

    // Paging
    $total = count($hasil);
    $perPage = 6;
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $pages = ceil($total / $perPage);
    $start = ($page - 1) * $perPage;
    $hasilPage = array_slice($hasil, $start, $perPage);
    ?>

    <?php if ($total > 0): ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($hasilPage as $d): ?>
                <div class="col">
                    <div class="card h-100 shadow border-0">
                        <div class="position-relative">
                            <img src="<?= htmlspecialchars($d['foto']) ?>" class="card-img-top rounded-top" alt="<?= htmlspecialchars($d['nama']) ?>" style="height: 250px; object-fit: cover;">
                            <span class="badge bg-info position-absolute top-0 end-0 m-2"><?= htmlspecialchars($d['spesialis']) ?></span>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($d['nama']) ?></h5>
                            <p class="card-text mb-2"><i class="bi bi-calendar-event"></i> <span class="text-muted"><?= htmlspecialchars($d['jadwal']) ?></span></p>
                        </div>
                        <div class="card-footer bg-white border-0 text-center pb-3">
                            <a href="#" class="btn btn-outline-primary btn-sm rounded-pill px-4">Lihat Profil</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($pages > 1): ?>
            <nav class="mt-5">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $pages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?<?= http_build_query(array_merge($_GET, ['page' => $i])) ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

    <?php else: ?>
        <div class="alert alert-warning mt-5 text-center" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>
            Tidak ada dokter yang ditemukan.
        </div>
    <?php endif; ?>
</div>
<?php include '../../layout/footer.php' ?>