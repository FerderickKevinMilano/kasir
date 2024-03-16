<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $petugas = $_POST['petugas'];
    $password = $_POST['password'];
    
    $admin = "INSERT INTO petugas (petugas, password)
VALUES ('$petugas ', '$password')";

if ($koneksi->query($admin) === TRUE) {
    ?>
    <script>
    alert('Registrasi Berhasil');
    window.location = "loginpetugas.html";
</script>
    <?php
} else {
  echo "Error: " . $admin . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>


