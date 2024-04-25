<?php
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM pesanan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        $nama = $row['nama'];
        $nomor_telp = $row['nomor_telp'];
        $waktu = $row['waktu'];
        $jumlah_peserta = $row['jumlah_peserta'];
        $paket_perjalanan = $row['paket_perjalanan'];
        $harga = $row['harga'];
        $jumlah_tagihan = $row['jumlah_tagihan'];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID tidak diberikan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <h2 class="text-center">Detail Pesanan</h2>

    <div class="card border-danger mb-3" style="max-width: 70%; border-width: 3px; color: #000; margin: auto;">
        <div class="card-body">
            <ul>
                <li>Nama: <?php echo $nama; ?></li>
                <li>Nomor Telp/HP: <?php echo $nomor_telp; ?></li>
                <li>Waktu Pelaksanaan: <?php echo $waktu; ?></li>
                <li>Jumlah Peserta: <?php echo $jumlah_peserta; ?></li>
                <li>Paket Perjalanan: <?php echo $paket_perjalanan; ?></li>
                <li>Harga: <?php echo $harga; ?></li>
                <li>Jumlah Tagihan: <?php echo $jumlah_tagihan; ?></li>
            </ul>
            <a href="datapesan.php" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</body>
</html>
