<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nomor_telp = $_POST['nomor_telp'];
    $waktu = $_POST['waktu'];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $paket_perjalanan = isset($_POST['paket_perjalanan']) ? implode(", ", $_POST['paket_perjalanan']) : '';

    $harga = $_POST['harga'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];

    $query = "UPDATE pesanan SET nama='$nama', nomor_telp='$nomor_telp', waktu='$waktu', jumlah_peserta='$jumlah_peserta', paket_perjalanan='$paket_perjalanan', harga='$harga', jumlah_tagihan='$jumlah_tagihan' WHERE id='$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: datapesan.php");
        exit();
    } else {
        echo "Gagal melakukan update data.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
