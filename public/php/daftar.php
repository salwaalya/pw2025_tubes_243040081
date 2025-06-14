<?php
// Koneksi ke database (HARUS DITULIS BEGINI, tidak pakai $_conn)
$conn = mysqli_connect("localhost", "root", "", "pw2025_tubes_243040081");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validasi
    if ($username === '') $errors[] = "Username wajib diisi.";
    if (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $username)) $errors[] = "Username hanya boleh huruf, angka, dan underscore (4-20 karakter).";
    if (strlen($password) < 6) $errors[] = "Password minimal 6 karakter.";

    $cek = mysqli_query($conn, "SELECT * FROM daftar WHERE email = '$email'");
    if (mysqli_num_rows($cek) > 0) {
        $errors[] = "Email sudah terdaftar.";
    }

    if (!$errors) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO daftar (username, email, password, user_type) VALUES ('$username', '$email', '$hashed', '$hashed')";

        if (mysqli_query($conn, $query)) {
            header("Location: login.php");
            exit;
        } else {
            $errors[] = "Gagal menyimpan ke database: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Akun Baru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            min-height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 410px;
            margin: 48px auto;
            background: #fff;
            padding: 36px 28px 28px 28px;
            border-radius: 14px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.10);
        }

        h2 {
            text-align: center;
            margin-bottom: 28px;
            color: #2d3a4b;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #3d4a5c;
            font-size: 15px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 11px 12px;
            border: 1.5px solid #d1d9e6;
            border-radius: 7px;
            font-size: 15px;
            background: #f8fafc;
            transition: border 0.2s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
            background: #fff;
        }

        .btn {
            width: 100%;
            padding: 13px;
            background: linear-gradient(90deg, #007bff 0%, #0056b3 100%);
            color: #fff;
            border: none;
            border-radius: 7px;
            font-size: 17px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(0, 123, 255, 0.08);
        }

        .btn:hover {
            background: linear-gradient(90deg, #0056b3 0%, #007bff 100%);
        }

        .alert {
            padding: 13px 15px;
            border-radius: 7px;
            margin-bottom: 20px;
            font-size: 15px;
        }

        .alert-error {
            background: #ffeaea;
            color: #d8000c;
            border: 1.5px solid #f5c6cb;
        }

        .alert-success {
            background: #eaffea;
            color: #155724;
            border: 1.5px solid #c3e6cb;
        }

        .info {
            font-size: 13px;
            color: #7a869a;
            margin-top: 6px;
        }

        .footer-link {
            text-align: center;
            margin-top: 22px;
            font-size: 15px;
            color: #4a5a6a;
        }

        .footer-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Daftar Akun Baru</h2>
        <?php if ($errors): ?>
            <div class="alert alert-error">
                <ul style="margin:0; padding-left:18px;">
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif ($success): ?>
            <div class="alert alert-success">
                Pendaftaran berhasil! Silakan <a href="login.php" style="color:#007bff;text-decoration:underline;">login</a>.
            </div>
        <?php endif; ?>

        <form method="post" autocomplete="off">
            <div class="form-group">
                <label for="username">Username</label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
                    required
                    minlength="4"
                    maxlength="20"
                    pattern="[a-zA-Z0-9_]+"
                    placeholder="Username (4-20 karakter)">
                <div class="info">Hanya huruf, angka, dan underscore.</div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    required
                    maxlength="100"
                    placeholder="Alamat Email">
                <div class="info">Gunakan email aktif Anda.</div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    minlength="6"
                    placeholder="Minimal 6 karakter">
            </div>
            <button type="submit" class="btn">Daftar</button>
        </form>
        <div class="footer-link">
            Sudah punya akun? <a href="login.php">Login di sini</a>
        </div>
    </div>
</body>



</html>