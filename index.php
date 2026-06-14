<?php
session_start();
include 'koneksi.php';

// PROSES LOGIN
if (isset($_POST['btn_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password' AND role='$role'");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;
        echo "<script>alert('Login Berhasil!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Login Gagal! Username atau Hak Akses salah.'); window.location='index.php';</script>";
    }
}
?>

<?php include 'header.php'; ?>

<?php if (!isset($_SESSION['username'])) { ?>
    <?php include 'login.php'; ?>
<?php } else { ?>
    <?php include 'navbar.php'; ?>
    <?php include 'dashboard.php'; ?>
    <?php include 'form_tambah.php'; ?>
<?php } ?>

<?php include 'footer.php'; ?>