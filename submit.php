<?php

session_start();
require_once __DIR__ . '/Customer.php';

// Endpoint ini hanya menerima POST.
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    header('Content-Type: text/plain; charset=UTF-8');
    echo '405 - Method Not Allowed. Gunakan POST untuk mengirim form.';
    exit;
}


$name = trim((string) ($_POST['name'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$number = trim((string) ($_POST['number'] ?? ''));
$nik = trim((string) ($_POST['nik'] ?? ''));
$address = trim((string) ($_POST['address'] ?? ''));
$province = trim((string) ($_POST['province'] ?? ''));
$city = trim((string) ($_POST['city'] ?? ''));
$postalCode = trim((string) ($_POST['postal_code'] ?? ''));
$birthPlace = trim((string) ($_POST['birth_place'] ?? ''));
$birthDate = trim((string) ($_POST['birth_date'] ?? ''));
$parentName = trim((string) ($_POST['parent_name'] ?? ''));

$errors = [];

if ($name === '') {
    $errors[] = 'Nama customer wajib diisi.';
}

if ($email === '' || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $errors[] = 'Email wajib diisi dengan format yang valid.';
}

if ($number === '' || strlen($number) < 9 || strlen($number) > 15) {
    $errors[] = 'Nomor wajib diisi dengan format yang valid.';
}

if ($nik < 17) {
    $errors[] = 'NIK wajib diisi dengan 16 digit angka.';
}

if ($address === '') {
    $errors[] = 'Alamat wajib diisi lengkap (10-255 karakter).';
}

if ($province === '') {
    $errors[] = 'Provinsi wajib dipilih.';
}

if ($city === '') {
    $errors[] = 'Kota/Kabupaten wajib dipilih.';
}

if ($postalCode < 6) {
    $errors[] = 'Kode POS wajib diisi dengan 5 digit angka.';
}

if ($birthPlace === '') {
    $errors[] = 'Tempat lahir wajib diisi (hanya huruf).';
}
$date = DateTime::createFromFormat('Y-m-d', $birthDate);
if (
    $birthDate === '' ||
    !$date ||
    $date->format('Y-m-d') !== $birthDate ||
    $date > new DateTime('today') ||
    $date < new DateTime('1900-01-01')
) {
    $errors[] = 'Tanggal lahir wajib diisi dengan tanggal yang valid.';
}

if ($parentName === '') {
    $errors[] = 'Nama orang tua wajib diisi (hanya huruf).';
}

if ($errors !== []) {
    http_response_code(422);
    header('Content-Type: text/html; charset=UTF-8');

    function e(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
    ?>
    <!doctype html>
    <html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>422 - Data Tidak Valid</title>
        <style>body{font:16px/1.5 Arial,sans-serif;max-width:680px;margin:40px auto;padding:0 16px;color:#203129}h1{color:#9b1c1c}a{color:#0f6a4a}</style>
    </head>
    <body>
        <h1>422 — Data Tidak Valid</h1>
        <p>Request sudah mencapai server, tetapi data belum lolos validasi.</p>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= e($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <p><a href="index.php">Kembali ke formulir</a></p>
    </body>
    </html>
    <?php
    exit;
}

// Buat object dari class yang sudah dikenal sejak Session 14.
$customer = new Customer($name, $email, $number, $nik,
 $address, $province, $city, $postalCode, $birthPlace, $birthDate, $parentName);

// Simpan sementara untuk menunjukkan session lintas-request.
$_SESSION['customer_name'] = $customer->getName();
$_SESSION['customer_email'] = $customer->getEmail();
$_SESSION['customer_number'] = $customer->getNumber();
$_SESSION['customer_nik']         = $customer->getNik();
$_SESSION['customer_address']     = $customer->getAddress();
$_SESSION['customer_province']    = $customer->getProvince();
$_SESSION['customer_city']        = $customer->getCity();
$_SESSION['customer_postal_code'] = $customer->getPostalCode();
$_SESSION['customer_birth_place'] = $customer->getBirthPlace();
$_SESSION['customer_birth_date']  = $customer->getBirthDate();
$_SESSION['customer_parent_name'] = $customer->getParentName();
session_write_close();

// PRG: POST -> 303 -> GET halaman sukses.
header('Location: success.php', true, 303);
exit;