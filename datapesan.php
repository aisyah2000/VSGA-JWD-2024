<?php
require "koneksi.php";

$query = "SELECT * FROM pesanan";
$result = mysqli_query($koneksi, $query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="table-responsive">
    <h2 class="text-center">Daftar Pesanan</h2>
    <table class="table table-hover" style="font-size: 0.9em;">
        <thead>
            <tr>
                <th>id</th>
                <th>Nama</th>
                <th>Nomor Telp/HP</th>
                <th>Waktu Pelaksanaan</th>
                <th>Jumlah Peserta</th>
                <th>paket Perjalanan</th>
                <th>Harga Paket Perjalanan</th>
                <th>Jumlah Tagihan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['nomor_telp']; ?></td>
                    <td><?php echo $row['waktu']; ?></td>
                    <td><?php echo $row['jumlah_peserta']; ?></td>
                    <td><?php echo $row['paket_perjalanan']; ?></td>
                    <td><?php echo $row['harga']; ?></td>
                    <td><?php echo $row['jumlah_tagihan']; ?></td>
                    <div>
                        <td>
                        <button type="button" class="btn btn-success">                     
                            <a class="text-decoration-none" href='detail.php?id=<?php echo $row['id']; ?>' style="color: white;" >Detail</a>
                        </button>
                        <button type="button" class="btn btn-warning">                        
                            <a class="text-decoration-none" href='update.php?id=<?php echo $row['id']; ?>' style="color: white;">Edit</a>
                        </button>
                        <button type="button" class="btn btn-danger">                        
                            <a class="text-decoration-none" href='delete.php?id=<?php echo $row['id']; ?>' onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" style="color: white;">Hapus</a>
                        </button>
                        </td>
                    </div>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
