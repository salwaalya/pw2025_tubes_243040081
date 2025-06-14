<?php
$artikels = [
    [
        'judul' => 'Luangkan Waktu untuk Diri Sendiri',
        'tanggal' => '2025-06-13',
        'ringkasan' => 'Meski jadwal padat, penting untuk menyediakan waktu khusus bagi diri sendiri setiap hari. Cukup 10–15 menit untuk menenangkan diri, membaca buku, mendengarkan musik, atau sekadar menarik napas dalam bisa sangat membantu menenangkan pikiran.',
        'link' => '#',
        'gambar' => '../../public/img/mental.jpeg'
    ],
    [
        'judul' => 'Buah-Buahan yang Kaya Vitamin C',
        'tanggal' => '2025-06-13',
        'ringkasan' => 'Vitamin C dikenal sebagai nutrisi penting yang dapat meningkatkan produksi sel darah putih, yaitu bagian dari sistem imun yang melawan infeksi. Contoh: jeruk, lemon, kiwi, stroberi, dan jambu biji. Tips: Konsumsi buah segar atau dibuat jus tanpa gula tambahan.',
        'link' => '#',
        'gambar' => '../../public/img/makanan sehat.jpeg'
    ],
    [
        'judul' => 'Melindungi Anggota Keluarga yang Rentan',
        'tanggal' => '2025-06-13',
        'ringkasan' => 'Tidak semua orang bisa divaksin, seperti bayi baru lahir, orang dengan kondisi medis tertentu, atau lansia dengan imun rendah. Ketika mayoritas anggota keluarga divaksin, maka yang rentan pun ikut terlindungi melalui herd immunity.',
        'link' => '#',
        'gambar' => '../../public/img/vaksin.jpeg'
    ],
];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Artikel Terbaru - Kesehatan</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #fff;
            padding: 32px 28px;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.12);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 32px;
            letter-spacing: 1px;
        }

        .artikel-list {
            display: flex;
            flex-wrap: wrap;
            gap: 24px;
            justify-content: center;
        }

        .artikel {
            background: #f9fafc;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(52, 152, 219, 0.08);
            width: 270px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .artikel:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 8px 24px rgba(52, 152, 219, 0.18);
        }

        .artikel img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .artikel-content {
            padding: 18px 16px 16px 16px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .tanggal {
            color: #888;
            font-size: 0.92em;
            margin-bottom: 6px;
        }

        .judul {
            font-size: 1.15em;
            font-weight: 600;
            margin: 0 0 10px 0;
            color: #2980b9;
        }

        .ringkasan {
            margin: 0 0 14px 0;
            color: #444;
            flex: 1;
        }

        .baca {
            color: #fff;
            background: linear-gradient(90deg, #3498db 60%, #6dd5fa 100%);
            text-decoration: none;
            padding: 8px 0;
            border-radius: 6px;
            text-align: center;
            font-weight: 600;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.08);
        }

        .baca:hover {
            background: linear-gradient(90deg, #2980b9 60%, #3498db 100%);
        }

        @media (max-width: 800px) {
            .artikel-list {
                flex-direction: column;
                align-items: center;
            }

            .artikel {
                width: 100%;
                max-width: 350px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Artikel Terbaru Kesehatan</h1>
        <div class="artikel-list">
            <?php foreach ($artikels as $artikel): ?>
                <div class="artikel">
                    <img src="<?= htmlspecialchars($artikel['gambar']) ?>" alt="Gambar <?= htmlspecialchars($artikel['judul']) ?>">
                    <div class="artikel-content">
                        <div class="tanggal"><?= htmlspecialchars($artikel['tanggal']) ?></div>
                        <div class="judul"><?= htmlspecialchars($artikel['judul']) ?></div>
                        <div class="ringkasan"><?= htmlspecialchars($artikel['ringkasan']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>v