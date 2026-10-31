<?php

session_start();

$name = $_SESSION['customer_name'] ?? null;
$email = $_SESSION['customer_email'] ?? null;
$number = $_SESSION['customer_number'] ?? null;
$nik = $_SESSION['customer_nik'] ?? null;
$address = $_SESSION['customer_address'] ?? null;
$province = $_SESSION['customer_province'] ?? null;
$city = $_SESSION['customer_city'] ?? null; 
$postalCode = $_SESSION['customer_postal_code'] ?? null;
$birthPlace = $_SESSION['customer_birth_place'] ?? null;
$birthDate = $_SESSION['customer_birth_date'] ?? null;
$parentName = $_SESSION['customer_parent_name'] ?? null;
unset($_SESSION['customer_name'], $_SESSION['customer_email'],$_SESSION['customer_number']);

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
    <title>Hasil Pengiriman Customer</title>
    <style>
        body{font:16px/1.5 Arial,sans-serif;max-width:680px;margin:40px auto;padding:0 16px;color:#203129}
        .card{padding:24px;border:1px solid #d8e2dc;border-radius:12px;background:#fff}
        h1{color:#0f6a4a}.muted{color:#5c6d63}a{color:#0f6a4a}
    </style>
</head>
<body>
    <main class="card">
        <h1>200 — Halaman Berhasil Dimuat</h1>
        <?php if ($name !== null && $email !== null && $number !== null): ?>
            <p>JavaScript mengizinkan submit dan server juga menerima data yang valid.</p>
            <p><strong>Nama:</strong> <?= e((string) $name) ?></p>
            <p><strong>Email:</strong> <?= e((string) $email) ?></p>
            <p><strong>Number:</strong> <?= e((string) $number) ?></p>
            <p><strong>NIK:</strong> <?= e((string) $nik) ?></p>
            <p><strong>Alamat:</strong> <?= e((string) $address) ?></p>
            <p><strong>Provinsi:</strong> <?= e((string) $province) ?></p>
            <p><strong>Kota/Kabupaten:</strong> <?= e((string) $city) ?></p>
            <p><strong>Kode POS:</strong> <?= e((string) $postalCode) ?></p>
            <p><strong>Tempat Lahir:</strong> <?= e((string) $birthPlace) ?></p>
            <p><strong>Tanggal Lahir:</strong> <?= e((string) $birthDate) ?></p>
            <p><strong>Nama Orang Tua:</strong> <?= e((string) $parentName) ?></p>
            <p class="muted">Data ini disimpan sementara di session, bukan database.</p>
        <?php else: ?>
            <p>Belum ada data customer dari pengiriman terbaru.</p>
        <?php endif; ?>
        <p><a href="index.php">Kembali ke formulir</a></p>
    </main>
</body>
</html>