<?php
// booking online.php

// Proses form booking
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $tanggal = htmlspecialchars($_POST['tanggal']);
    $jumlah = (int)$_POST['jumlah'];
    
    // Simulasi simpan data (bisa diganti dengan database)
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Booking Online</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container { max-width: 400px; margin: 40px auto; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px #ccc; }
        h2 { text-align: center; }
        label { display: block; margin-top: 12px; }
        input, select { width: 100%; padding: 8px; margin-top: 4px; }
        button { margin-top: 16px; width: 100%; padding: 10px; background: #007bff; color: #fff; border: none; border-radius: 4px; }
        .success { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Booking Online</h2>
        <?php if ($success): ?>
            <div class="success">
                Booking berhasil! Kami akan menghubungi Anda melalui email.
            </div>
        <?php endif; ?>
        <form method="post" action="">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="tanggal">Tanggal Booking</label>
            <input type="date" id="tanggal" name="tanggal" required>

            <label for="jumlah">Jumlah Orang</label>
            <input type="number" id="jumlah" name="jumlah" min="1" max="20" required>

            <button type="submit">Booking Sekarang</button>
        </form>
    </div>
</body>
</html> 