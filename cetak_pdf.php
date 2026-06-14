<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Peserta - StarForge</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        /* Gaya khusus untuk dokumen cetak / PDF */
        body { 
            font-family: 'Inter', sans-serif; 
            padding: 40px; 
            color: #1f2937; /* Abu-abu gelap, lebih elegan dari hitam pekat */
            background-color: #ffffff;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e5e7eb;
        }
        
        .header h2 {
            margin: 0 0 5px 0;
            color: #111827;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .header p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
            font-size: 13px;
        }
        
        th, td { 
            padding: 12px 15px; 
            text-align: left; 
            border-bottom: 1px solid #e5e7eb;
        }
        
        th { 
            background-color: #f9fafb; 
            color: #4b5563;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 0.5px;
        }
        
        tr:nth-child(even) {
            background-color: #fdfdfd;
        }

        .ttd-img {
            height: 40px;
            object-fit: contain;
        }

        .footer-note {
            margin-top: 50px;
            font-size: 11px;
            color: #9ca3af;
            text-align: right;
            font-style: italic;
        }

        /* Menghilangkan elemen yang tidak perlu saat diprint */
        @media print {
            body { padding: 0; }
            @page { margin: 1.5cm; }
        }
    </style>
</head>
<body onload="window.print()">
    
    <div class="header">
        <h2>STARFORGE CASTING REPORT</h2>
        <p>Dokumen Resmi Data Peserta Virtual Casting</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="40%">Nama Lengkap</th>
                <th width="25%">Kategori Bakat</th>
                <th width="30%">Verifikasi Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM peserta ORDER BY id DESC");
            while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                <td style="color: #6b7280; font-weight: 600;">#<?= sprintf("%03d", $no++); ?></td>
                <td style="font-weight: 600; color: #111827;"><?= htmlspecialchars($row['nama']); ?></td>
                <td><?= htmlspecialchars($row['bakat']); ?></td>
                <td>
                    <img src="uploads/<?= htmlspecialchars($row['ttd']); ?>" class="ttd-img" alt="TTD">
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="footer-note">
        Dokumen ini di-generate secara otomatis oleh Sistem StarForge pada <?= date('d M Y, H:i'); ?> WIB.
    </div>

</body>
</html>