<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil & Amankan Data Teks
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $bakat = mysqli_real_escape_string($conn, $_POST['bakat']);
    
    // 2. Proses Tanda Tangan (Canvas -> Image)
    $ttd_data = $_POST['signature_data'];
    $ttd_data = str_replace('data:image/png;base64,', '', $ttd_data);
    $ttd_data = str_replace(' ', '+', $ttd_data);
    $data_gambar = base64_decode($ttd_data);
    $nama_file_ttd = 'ttd_' . time() . '.png';
    file_put_contents('uploads/' . $nama_file_ttd, $data_gambar);

    // 3. Proses File Spesifik
    // Upload Portfolio (1 Foto / PDF)
    $nama_berkas = "";
    if (!empty($_FILES['berkas']['name'])) {
        $nama_berkas = time() . '_' . $_FILES['berkas']['name'];
        move_uploaded_file($_FILES['berkas']['tmp_name'], 'uploads/' . $nama_berkas);
    }

    // Upload Video (MP4)
    $nama_video = "";
    if (!empty($_FILES['video']['name'])) {
        $nama_video = time() . "_" . $_FILES['video']['name'];
        move_uploaded_file($_FILES['video']['tmp_name'], 'uploads/' . $nama_video);
    }
    
    // Upload Audio (MP3)
    $nama_audio = "";
    if (!empty($_FILES['audio']['name'])) {
        $nama_audio = time() . "_" . $_FILES['audio']['name'];
        move_uploaded_file($_FILES['audio']['tmp_name'], 'uploads/' . $nama_audio);
    }

    // 4. Simpan Ke Database MySQL
    // Pastikan kolom video dan audio sudah ada di tabel 'peserta'
    $query = "INSERT INTO peserta (nama, bakat, berkas, ttd, video, audio) VALUES ('$nama', '$bakat', '$nama_berkas', '$nama_file_ttd', '$nama_video', '$nama_audio')";
    
    if (mysqli_query($conn, $query)) {
        
        // 5. Fitur Sync Ke Google Sheets
        $url_gas = "https://script.google.com/macros/s/AKfycbwSAho4hCPCylygD8wBHtIp_a5RXN6qEvX0JwOj9zR1V1xZ3d9FnPso_fbO1kFpPkPtBw/exec"; 
        
        $data_sheet = [
            'nama' => $nama,
            'bakat' => $bakat,
            'berkas' => $nama_berkas
        ];

        $ch = curl_init($url_gas);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data_sheet));
        curl_exec($ch);
        curl_close($ch);
        
        // Selesai -> Redirect
        echo "<script>alert('Pendaftaran Berhasil & Data Tersinkronisasi!'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>