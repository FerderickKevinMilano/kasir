<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
    $tanggalpenjualan = $_POST['TanggalPenjualan'];
    $totalharga = $_POST['TotalHarga'];
    $namapelanggan = $_POST['namapelanggan'];

    $penjualan = "INSERT INTO penjualan (TanggalPenjualan, TotalHarga, PelangganID)
                  VALUES ('$tanggalpenjualan', '$totalharga', '$namapelanggan')";

    if ($koneksi->query($penjualan) === TRUE) {
        ?>
        <script>
        alert('Data berhasil Ditambahkan');
        window.location = "tampilanpenjualan.php";
        </script>
        <?php
    } else {
        echo "Error: " . $penjualan . "<br>" . $koneksi->error;
    }
    $koneksi->close();
}
?>
