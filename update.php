<?php
require "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data pesanan berdasarkan ID
    $query = "SELECT * FROM pesanan WHERE id = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Data ditemukan, gunakan untuk mengisi nilai-nilai pada form
        $nama = $row['nama'];
        $nomor_telp = $row['nomor_telp'];
        $waktu = $row['waktu'];
        $jumlah_peserta = $row['jumlah_peserta'];
        $paket_perjalanan = explode(", ", $row['paket_perjalanan']);
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
    <title>Edit Pesanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Edit Pesanan</h2>
        <form action="prosesupdate.php" method="POST">
            <div class="card border-danger mb-3" style="max-width: 70%; border-width: 3px; color: #000; margin: auto;">
                <div class="card-body">

                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="nama">Nama Pemesanan:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomor_telp">Nomor Telp/HP:</label>
                        <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" value="<?php echo $nomor_telp; ?>">
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu Pelaksanaan:</label>
                        <input type="text" class="form-control" id="waktu" name="waktu" value="<?php echo $waktu; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta:</label>
                        <input type="text" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo $jumlah_peserta; ?>">
                    </div>
                    <div class="form-group">
                    <label>
                        <span class="name">Pelayanan Paket Perjalanan<span class="required"></span></span>
                        <div style="margin-left: 50px;">
                            <input class="form-check-input" type="checkbox" value="Penginapan" id="penginapan" name="paket_perjalanan[]" <?php if (in_array("Penginapan", $paket_perjalanan)) echo "checked"; ?>>
                            <label class="form-check-label ml-3" for="penginapan">Penginapan</label>
                        </div>
                        <div style="margin-left: 50px;">
                            <input class="form-check-input" type="checkbox" value="Transportasi" id="transportasi" name="paket_perjalanan[]" <?php if (in_array("Transportasi", $paket_perjalanan)) echo "checked"; ?>>
                            <label class="form-check-label ml-3" for="transportasi">Transportasi</label>
                        </div>
                        <div style="margin-left: 50px;">
                            <input class="form-check-input" type="checkbox" value="Makanan" id="makanan" name="paket_perjalanan[]" <?php if (in_array("Makanan", $paket_perjalanan)) echo "checked"; ?>>
                            <label class="form-check-label ml-3" for="makanan">Makanan</label>
                        </div>
                    </label>

                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Paket Perjalanan:</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>">
                    </div>

                    <div class="form-group">
                        <label for="jumlah_tagihan">Jumlah Tagihan:</label>
                        <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan" value="<?php echo $jumlah_tagihan; ?>">
                    </div>
                </div>

                
                <div class="card-footer border-danger d-flex justify-content-end" style="border-width: 3px; background-color: #ffb6b6;">
                    <button type="submit" class="btn btn-primary m-1">Submit</button>
                    <a href="datapesan.php" class="btn btn-secondary m-1">Batal</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
