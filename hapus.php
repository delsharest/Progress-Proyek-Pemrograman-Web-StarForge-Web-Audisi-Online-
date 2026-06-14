<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data untuk mengetahui nama file yang akan dihapus
    $query = mysqli_query($conn, "SELECT * FROM peserta WHERE id='$id'");
    $data = mysqli_fetch_array($query);
    
    // Hapus file TTD dari folder
    if(file_exists("uploads/".$data['ttd'])) {
        unlink("uploads/".$data['ttd']);
    }
    
    // Hapus multiple file berkas dari folder
    if(!empty($data['berkas'])) {
        $daftar_berkas = explode(",", $data['berkas']);
        foreach($daftar_berkas as $file) {
            if(file_exists("uploads/".$file)) {
                unlink("uploads/".$file);
            }
        }
    }
    
    // Hapus data dari database
    $hapus = mysqli_query($conn, "DELETE FROM peserta WHERE id='$id'");
    if($hapus) {
        echo "<script>alert('Data berhasil dihapus beserta berkasnya!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); window.location='index.php';</script>";
    }
}
?>