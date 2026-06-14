<?php
include 'koneksi.php';

// Script untuk memaksa browser mendownload sebagai file Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Peserta_Audisi.xls");
?>

<center>
    <h3>Data Pendaftar StarForge Virtual Casting</h3>
</center>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Peserta</th>
        <th>Kategori Bakat</th>
        <th>Nama File Berkas (Terlampir)</th>
    </tr>
    <?php 
    $query = mysqli_query($conn, "SELECT * FROM peserta ORDER BY id DESC");
    $no = 1;
    while($row = mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['bakat']; ?></td>
        <td><?= $row['berkas']; ?></td>
    </tr>
    <?php } ?>
</table>