<?php
require "conection.php";
$mahasiswa = query("SELECT * FROM daftar");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1 {
            margin-top: 30px;
            margin-bottom: 30px;
            color: #343a40;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-warning, .btn-danger {
            padding: 4px 8px;
            font-size: 1rem;
        }
        .btn-primary {
            font-weight: bold;
        }
        .container {
            margin-top: 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            padding: 30px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Daftar Pasien</h1>
                <a href="" class="btn btn-primary mb-3">tambah data pasien</a>
                <table class="table table-striped table-hover" border="1" cellspacing="0" cellpadding="10">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>User_type</th>
                        <th>Aksi</th>
                    </tr>
                    <?php $i = 1; ?>

                    <?php foreach ($mahasiswa as $psn) : ?>

                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= isset($psn['nama']) ? htmlspecialchars($psn['nama']) : '-'; ?></td>
                            <td><?= $psn['email']; ?></td>
                            <td><?= $psn['password']; ?></td>
                            <td><?= isset($psn['user_type']) ? htmlspecialchars($psn['user_type']) : '-'; ?></td>
                            <td>
                                <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a> | <a href="" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>