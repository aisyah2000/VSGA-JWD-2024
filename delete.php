<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pesanan WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Redirect kembali ke halaman produk setelah penghapusan
        header("Location: datapesan.php");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "Permintaan tidak valid.";
}
?>
