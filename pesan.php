<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses pendaftaran
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor_telp'];
    $waktu = $_POST['waktu'];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $paket_perjalanan = isset($_POST['paket_perjalanan']) ? implode(", ", $_POST['paket_perjalanan']) : '';
    $harga = $_POST['harga'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];

    // Persiapkan pernyataan SQL
    $query = "INSERT INTO pesanan (nama, nomor_telp, waktu, jumlah_peserta, paket_perjalanan, harga, jumlah_tagihan) VALUES ('$nama', '$nomor', '$waktu', '$jumlah_peserta', '$paket_perjalanan', '$harga', '$jumlah_tagihan')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: datapesan.php");
        exit();
    } else {
        echo "Gagal menyimpan data ke database.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Paket Wisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateForm()">
            <div class="card border-danger mb-3" style="max-width: 70%; border-width: 3px; color: #000; margin: auto;">
                <div class="card-body">
                <h2 class="card-title" style="color: #19006b;">Form Pemesan Paket Wisata</h2>
                    <label>
                        <span class="name">Nama Pemesanan : <span class="required"></span></span>
                        <input style="border: none" type="text" name="nama">
                    </label>
                    <br>
                    <label>
                        <span class="name">Nomor Telp/HP : <span class="required"></span></span>
                        <input style="border: none" type="text" name="nomor_telp">
                    </label> 
                    <br>
                    <label>
                        <span class="name">Waktu Pelaksanaan : <span class="required"></span></span>
                        <input style="border: none" type="text" name="waktu">
                    </label>
                    <br>
                    <label>
                        <span class="name">Jumlah Paket Perjalanan : <span class="required"></span></span>
                        <input style="border: none" type="text" name="jumlah_peserta">
                    </label>
                    <br>
                    <label>
                        <span class="name">Pelayanan Paket Perjalanan<span class="required"></span></span>
                        <div style="margin-left: 50px;">
                            <input class="form-check-input" type="checkbox" value="Penginapan" id="penginapan" name="paket_perjalanan[]">
                            <label class="form-check-label ml-3" for="penginapan">Penginapan</label>
                        </div>
                        <div style="margin-left: 50px;">
                            <input class="form-check-input" type="checkbox" value="Transportasi" id="transportasi" name="paket_perjalanan[]">
                            <label class="form-check-label ml-3" for="transportasi">Transportasi</label>
                        </div>
                        <div style="margin-left: 50px;">
                            <input class="form-check-input" type="checkbox" value="Makanan" id="makanan" name="paket_perjalanan[]">
                            <label class="form-check-label ml-3" for="makanan">Makanan</label>
                        </div>
                    </label>
                    <br>
                    <label>
                        <span class="name">Harga Paket Perjalanan : <span class="required"></span></span>
                        <input style="border: none" type="text" name="harga">
                    </label>
                    <br>
                    <label>
                        <span class="name">Jumlah Tagihan : <span class="required"></span></span>
                        <input style="border: none" type="text" name="jumlah_tagihan">
                    </label>
                    <br>
                </div>

                <div class="card-footer border-danger d-flex justify-content-end" style="border-width: 3px; background-color: #ffb6b6;">
                    <p class="d-inline-flex gap-5">
                        <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><a class="tiket" href="./tiket.php" style="text-decoration: none; color: white;">Review Tiket</a></button>
                        <button type="submit" class="btn btn-success" name="pesanan">Simpan</button>
                        <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2" style="background-color: #cf0c0c;"><a style="text-decoration: none; color: white;" href="./pesan.php">Batal</a></button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
