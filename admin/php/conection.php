<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pw2025_tubes_243040081"; // sesuaikan dengan nama databasenya

$conn = mysqli_connect($host, $user, $pass, $db);

// fungsi query untuk ambil data
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah data
function tambah($data)
{
    global $conn;
    $konsultasi_kesehatan = htmlspecialchars($data['konsultasi_kesehatan']);
    $informasi_kesehatan = htmlspecialchars($data['informasi_kesehatan']);
    $tanya_dokter_24_jam = htmlspecialchars($data['tanya_dokter_24_jam']);
    $booking_online = htmlspecialchars($data['booking_online']);

    // query insert data
    $query = "INSERT INTO booking (nama, email, tanggal, jumlah) VALUES ('$konsultasi_kesehatan', '$informasi_kesehatan', $tanya_dokter_24_jam, ' $booking_online')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function koneksi(){
$conn = mysqli_connect('localhost', 'root', '', 'pw2025_tubes_243040081');

return $conn; 
}

// function query($query)
// {
//     $result = mysqli_query(koneksi(), $query);

//     $row = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
// }

// return $rows;
// }

$conn=koneksi();

