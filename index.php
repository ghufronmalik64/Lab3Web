<?php 
include("koneksi.php");

// querry untuk menampilkan data
$sql = "SELECT * FROM data_barang";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>

    <div class="container">
        <h1>Data Barang</h1>
        <a href="tambah.php" >Tambah Barang</a>
        <div class="main">
            <table border="2" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
                <?php if($result): ?>
                <?php while($row = mysqli_fetch_array($result)): ?>
                
                <tr>
                    <td><img src="gambar/<?= $row['gambar'];?>" alt="<?=$row['nama'];?>"></td>
                    <td><?= $row['nama'];?></td> 
                    <td><?= $row['kategori'];?></td> 
                    <td><?= $row['harga_beli'];?></td> 
                    <td><?= $row['harga_jual'];?></td> 
                    <td><?= $row['stok'];?></td> 
                    <td><?= $row['id_barang'];?></td> 
                    <td class="aksi"> 
                <button class="button-ubah">
                    <a href="update.php?id=<?= $row ["id"]?>">Ubah</a>
                </button>
                <button class="button-hapus">
                    <a href="hapus.php?id=<?= $row ["id"]?>" onclick="return confirm('yakin?')">Hapus</a>
                </button>
            </td>
                </tr>
                <?php endwhile; else: ?>

                <tr>
                    <td colspan ="7">Belum ada data</td>
                </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>

</body>
</html>