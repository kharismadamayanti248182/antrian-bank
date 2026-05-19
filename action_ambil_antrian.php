<?php
include "./config.php";
// terima dulu datnya
$no_hp = $_POST['no_hp'];
$layanan = $_POST['layanan'];

$today = date("Y-m-d");

$cek = mysqli_query($conn, "
    SELECT COUNT(*) as total
    FROM queues
    WHERE visitor_phone = '$no_hp'
    AND DATE(appointment_date) = '$today'
");

$data_cek = mysqli_fetch_assoc($cek);

// jika sudah 2 antrian
if($data_cek['total'] >= 2){

    echo "
    <script>
        alert('Nomor HP hanya bisa mengambil maksimal 2 antrian per hari');
        window.history.back();
    </script>
    ";

    exit;
}


// cek nomor terakhir hari ini sesuai loket
$result = mysqli_query($conn, "
    SELECT queue_number
    FROM queues
    WHERE service_id = '$layanan'
    AND DATE(appointment_date) = '$today'
    ORDER BY queue_number DESC
    LIMIT 1
");

$data = mysqli_fetch_assoc($result);


$nomor = $data['queue_number'] + 1;
$nomor_format = str_pad($nomor, 3, "0", STR_PAD_LEFT);

//tulisquery
$query = "INSERT INTO queues (service_id, visitor_phone, queue_number, appointment_date) 
VALUES ('$layanan', '$no_hp', '$nomor', NOW())";

//jalankan
$result = $conn->query($query);

header("Location: nomerantrian.php?no=$nomor_format&loket=$layanan&hp=$no_hp");

?>