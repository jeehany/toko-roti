<?php 
include 'header.php';

// Query untuk cek produksi dengan kondisi tertentu
$sortage = mysqli_query($conn, "SELECT * FROM produksi WHERE cek = '1'");
$cek_sor = mysqli_num_rows($sortage);
?>

<div class="container">
    <h2 style="width: 100%; border-bottom: 4px solid gray"><b>Daftar Pesanan</b></h2>
    <br>
    <h5 class="bg-success" style="padding: 7px; width: 710px; font-weight: bold;">
        <marquee>Lakukan Reload Setiap Masuk Halaman ini, untuk menghindari terjadinya kesalahan data dan informasi</marquee>
    </h5>
    <a href="produksi.php" class="btn btn-default"><i class="glyphicon glyphicon-refresh"></i> Reload</a>
    <br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Invoice</th>
                <th scope="col">Kode Customer</th>
                <th scope="col">Status</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $result = mysqli_query($conn, "
            SELECT DISTINCT invoice, kode_customer, status, kode_produk, qty, terima, tolak, cek 
            FROM produksi 
            GROUP BY invoice, kode_customer, status, kode_produk, qty, terima, tolak, cek
            ");
            $no = 1;

            while ($row = mysqli_fetch_assoc($result)) {
                $kodep = $row['kode_produk'];
                $inv = $row['invoice'];
                ?>

                <tr>
                    <td><?= $no; ?></td>
                    <td><?= htmlspecialchars($row['invoice']); ?></td>
                    <td><?= htmlspecialchars($row['kode_customer']); ?></td>
                    <td>
                        <?php 
                        if ($row['terima'] == 1) {
                            echo "<span style='color: green; font-weight: bold;'>Pesanan Diterima (Siap Kirim)</span>";
                        } elseif ($row['tolak'] == 1) {
                            echo "<span style='color: red; font-weight: bold;'>Pesanan Ditolak</span>";
                        } else {
                            echo "<span style='color: orange; font-weight: bold;'>" . htmlspecialchars($row['status']) . "</span>";
                        }
                        ?>
                    </td>
                    <td>2020/26-01</td>
                    <td>
                        <?php if ($row['tolak'] == 0 && $row['cek'] == 1 && $row['terima'] == 0) { ?>
                            <a href="inventory.php?cek=0" class="btn btn-warning">
                                <i class="glyphicon glyphicon-warning-sign"></i> Request Material Shortage
                            </a>
                            <a href="proses/tolak.php?inv=<?= urlencode($row['invoice']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menolak ?')">
                                <i class="glyphicon glyphicon-remove-sign"></i> Tolak
                            </a>
                        <?php } elseif ($row['terima'] == 0 && $row['cek'] == 0) { ?>
                            <a href="proses/terima.php?inv=<?= urlencode($row['invoice']); ?>&kdp=<?= urlencode($row['kode_produk']); ?>" class="btn btn-success">
                                <i class="glyphicon glyphicon-ok-sign"></i> Terima
                            </a>
                            <a href="proses/tolak.php?inv=<?= urlencode($row['invoice']); ?>" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menolak ?')">
                                <i class="glyphicon glyphicon-remove-sign"></i> Tolak
                            </a>
                        <?php } ?>
                        <a href="detailorder.php?inv=<?= urlencode($row['invoice']); ?>&cs=<?= urlencode($row['kode_customer']); ?>" class="btn btn-primary">
                            <i class="glyphicon glyphicon-eye-open"></i> Detail Pesanan
                        </a>
                    </td>
                </tr>
                <?php
                $no++; 
            }
            ?>
        </tbody>
    </table>

    <?php if ($cek_sor > 0) { ?>
        <br><br>
        <div class="row">
            <div class="col-md-4 bg-danger" style="padding: 10px;">
                <h4>Kekurangan Material</h4>
                <h5 style="color: red; font-weight: bold;">Silahkan Tambah Stok Material di bawah ini:</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Material</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Pastikan $nama_material adalah array
                        $nama_material = $nama_material ?? []; // Inisialisasi array kosong jika null
                        $arr = array_values(array_unique($nama_material)); // Hilangkan duplikat

                        if (!empty($arr)) {
                            foreach ($arr as $index => $material) {
                                echo "<tr><td>" . ($index + 1) . "</td><td>" . htmlspecialchars($material) . "</td></tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php } ?>
</div>

<br>
<br>
<br>
<br>
<br>

<?php include 'footer.php'; ?>
