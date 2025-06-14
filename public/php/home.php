<?php
include '../../layout/header.php';
require '../../admin/php/conection.php';
?>


<link rel="stylesheet" href="../../public/css/home.css">

<!-- banner utama -->
<div class="container mt-5">
    <div class="bener p-5 mb-4 text-white rounded-4 shadow">
        <div class="container-fluid py-5">
            <h1 class="display-4 fw-bold mb-3">Zona Sehat: Menuju Hidup Lebih Sehat!</h1>
            <p class="col-md-8 fs-5 mb-4">Temukan tips kesehatan, layanan konsultasi, dan informasi terpercaya untuk mendukung gaya hidup sehat Anda bersama Zona Sehat.</p>
        </div>
    </div>
</div>
<!-- akhir banner utama -->

<!-- layanan kami -->
<?php
$layanan = query("SELECT * FROM healty");
?>
<div class="container mb-5" id="layanan">
    <h2 class="text-center mb-4 fw-bold">Layanan Kami</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($layanan as $l): ?>
            <div class="col">
                <div class="card card-layanan h-100 text-center border-0 shadow-sm">
                    <div class="card-body">
                        <div class="layanan-icon bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width:70px;height:70px;">
                            <i class="bi bi-activity"></i>
                        </div>
                        <h5 class="card-title mt-2"><?= htmlspecialchars($l['nama_layanan']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($l['deskripsi']) ?></p>
                        <p class="fw-bold text-primary">Rp<?= number_format($l['harga']) ?></p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <a href="dokter.php" class="btn btn-outline-info mt-2">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- akhir layanan kami -->

<!-- artikel terbaru -->
<?php
$artikels = [
    [
        'img' => '../../public/img/mental.jpeg',
        'alt' => 'Artikel 1',
        'title' => 'Cara Menjaga Kesehatan Mental di Tengah Kesibukan',
        'desc' => 'Pelajari tips sederhana untuk menjaga pikiran tetap sehat meskipun aktivitas Anda padat setiap hari.',
        'link' => '#',
        'class' => 'satu'
    ],
    [
        'img' => '../../public/img/makanan sehat.jpeg',
        'alt' => 'Artikel 2',
        'title' => 'Makanan Sehat untuk Meningkatkan Imunitas',
        'desc' => 'Kenali berbagai jenis makanan alami yang bisa membantu tubuh Anda tetap kuat dan tidak mudah sakit.',
        'link' => '#',
        'class' => 'dua'
    ],
    [
        'img' => '../../public/img/vaksin.jpeg',
        'alt' => 'Artikel 3',
        'title' => 'Pentingnya Vaksinasi untuk Kesehatan Keluarga',
        'desc' => 'Mengapa imunisasi penting, dan bagaimana cara melindungi keluarga Anda dari berbagai penyakit menular.',
        'link' => '#',
        'class' => 'tiga'
    ]
];
?>
<div class="container mb-5" id="artikel">
    <h2 class="text-center mb-4 fw-bold">Artikel Terbaru</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($artikels as $artikel): ?>
            <div class="col">
                <div class="card card-artikel h-100 border-0 shadow-sm">
                    <img src="<?= htmlspecialchars($artikel['img']) ?>" class="card-img-top" alt="<?= htmlspecialchars($artikel['alt']) ?>" style="height:200px;object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($artikel['title']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($artikel['desc']) ?></p>
                        <a href="<?= htmlspecialchars($artikel['link']) ?>" class="btn <?= htmlspecialchars($artikel['class']) ?>">Baca Selengkapnya <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!-- akhir artikel terbaru -->

<!-- testimoni pasien -->
<div class="container mb-5" id="testimoni">
    <h2 class="text-center mb-4 fw-bold">Testimoni Pasien</h2>
    <div id="testimoniCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $testimonis = [
                ['text' => 'Dokternya sangat ramah dan menjelaskan dengan jelas. Saya jadi lebih tenang setelah konsultasi online dari rumah.', 'name' => 'Nazala', 'city' => 'Bekasi'],
                ['text' => 'Tim Zona Sehat sangat profesional. Saya merasa lebih teredukasi tentang penyakit saya.', 'name' => 'Arreva', 'city' => 'Banten'],
                ['text' => 'Saya bisa konsultasi langsung dengan dokter dari HP. Praktis dan nyaman banget!', 'name' => 'Vicka', 'city' => 'Bandung'],
                ['text' => 'Informasi di website ini akurat dan terpercaya. Saya selalu membacanya sebelum ke dokter.', 'name' => 'Alfaris', 'city' => 'Cicalengka'],
                ['text' => 'Layanan Tanya Dokter sangat berguna, terutama saat anak saya tiba-tiba demam.', 'name' => 'Julvah', 'city' => 'Jakarta'],
                ['text' => 'Sudah coba beberapa platform kesehatan, tapi Zona Sehat yang paling saya percaya.', 'name' => 'Almira', 'city' => 'Surabaya'],
            ];
            foreach ($testimonis as $i => $t): ?>
                <div class="carousel-item<?= $i === 0 ? ' active' : '' ?>">
                    <div class="d-flex justify-content-center">
                        <div class="card border-0 shadow-sm" style="max-width: 500px;">
                            <div class="card-body text-center">
                                <i class="bi bi-chat-quote fs-1 text-info mb-3"></i>
                                <p class="card-text fst-italic">"<?= htmlspecialchars($t['text']) ?>"</p>
                                <h6 class="card-subtitle mb-2 text-muted">- <?= htmlspecialchars($t['name']) ?>, <?= htmlspecialchars($t['city']) ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-info rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimoniCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-info rounded-circle" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>
</div>
<!-- akhir testimoni pasien -->

<?php include '../../layout/footer.php' ?>