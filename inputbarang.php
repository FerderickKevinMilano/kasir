<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $namaproduk = $_POST['NamaProduk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok']; 
    $keterangan = $_POST['Keterangan'];

    $produk = "INSERT INTO produk (NamaProduk, Harga, Stok, Keterangan)
VALUES ('$namaproduk ', '$harga', '$stok', '$keterangan')";

if ($koneksi->query($produk) === TRUE) {
    ?>
    <script>
    alert('Data berhasil Ditambahkan');
    window.location = "tampilanproduk.php";
</script>
    <?php
} else {
  echo "Error: " . $produk . "<br>" . $koneksi->error;
}
$koneksi->close();
}
?>


