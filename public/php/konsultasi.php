<?php
// konsultasi.php
include '../../admin/php/conection.php';

// Proses form jika disubmit
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = htmlspecialchars($_POST['nama'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $keluhan = htmlspecialchars($_POST['keluhan'] ?? '');

    // Validasi sederhana
    if ($nama && $email && $keluhan) {
        // Simulasi simpan data (bisa diganti dengan database)
        $message = "Terima kasih, $nama. Konsultasi Anda telah dikirim.";
    } else {
        $message = "Semua field wajib diisi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Konsultasi Kesehatan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px #ccc;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 16px;
            padding: 10px 20px;
            background: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .message {
            margin-top: 16px;
            color: #155724;
            background: #d4edda;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Konsultasi Kesehatan</h2>
        <?php if ($message): ?>
            <div class="message"><?= $message ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="keluhan">Keluhan Kesehatan</label>
            <textarea id="keluhan" name="keluhan" rows="5" required></textarea>

            <button type="submit">Kirim Konsultasi</button>
        </form>
    </div>
</body>

</html>