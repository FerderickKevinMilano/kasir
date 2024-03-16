<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $Petugas = $_POST['petugas'];
    $password = $_POST['password'];
    $login = mysqli_query($koneksi, "SELECT * FROM petugas where
    petugas = '$Petugas' AND password = '$password'");
    $cek = mysqli_num_rows($login);
    if ($cek){
        ?>
        <script>
        alert('USERNAME DAN PASSWORD BENAR');
        window.location = "dashboard.php";
    </script>
        <?php
    } else {
        ?>
        <script>
        alert('USERNAME ATAU PASSWORD SALAH !! SILAHKAN DICEK KEMBALI.');
        window.location = "loginpetugas.html";
    </script>
    <?php
    }
}
?>