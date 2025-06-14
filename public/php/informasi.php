<?php
// informasi.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Kesehatan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f8fb;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.07);
            padding: 32px 28px;
        }
        h1 {
            color: #2d6cdf;
            margin-bottom: 12px;
        }
        .info-list {
            list-style: none;
            padding: 0;
        }
        .info-list li {
            background: #eaf1fb;
            margin-bottom: 14px;
            padding: 16px 18px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: background 0.2s;
        }
        .info-list li:hover {
            background: #d2e6fa;
        }
        .icon {
            font-size: 1.5em;
            margin-right: 16px;
            color: #2d6cdf;
        }
        @media (max-width: 600px) {
            .container {
                padding: 18px 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Informasi Kesehatan</h1>
        <p>Selamat datang di halaman informasi kesehatan! Berikut beberapa tips penting untuk menjaga kesehatan Anda:</p>
        <ul class="info-list">
            <li><span class="icon">💧</span>Pastikan minum air putih minimal 8 gelas per hari untuk menjaga hidrasi tubuh.</li>
            <li><span class="icon">🥗</span>Konsumsi makanan bergizi seimbang, perbanyak sayur dan buah setiap hari.</li>
            <li><span class="icon">🏃‍♂️</span>Lakukan aktivitas fisik atau olahraga ringan minimal 30 menit setiap hari.</li>
            <li><span class="icon">😴</span>Cukupi waktu tidur 7-8 jam setiap malam agar tubuh tetap bugar.</li>
            <li><span class="icon">🧼</span>Jaga kebersihan diri dengan rutin mencuci tangan dan mandi.</li>
            <li><span class="icon">🩺</span>Lakukan pemeriksaan kesehatan secara berkala untuk deteksi dini penyakit.</li>
        </ul>
        <p style="margin-top:24px; color:#666;">Tetap jaga kesehatan dan semangat menjalani aktivitas!</p>
    </div>
</body>
</html>