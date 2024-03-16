<?php
include "koneksi.php";

if(isset($_POST['Edit'])) {
    $id = $_POST['id'];
    $tanggalpenjualan = $_POST['TanggalPenjualan'];
    $totalharga = $_POST['TotalHarga'];
    $pelanggan = $_POST['NamaPelanggan'];
    
    $update = mysqli_query($koneksi, "UPDATE penjualan SET TanggalPenjualan='$tanggalpenjualan', TotalHarga='$totalharga', PelangganID='$pelanggan' WHERE PenjualanID='$id'");
    
    if ($update) {
        ?>
        <script>
        alert('Berhasil Mengedit Data');
        window.location="tampilanpenjualan.php";
        </script>
        <?php
    } else {
        ?>   
        <script>
        alert('Gagal Mengedit Data');
        window.location="tampilanpenjualan.php";
        </script>
        <?php
    }
}
?>
