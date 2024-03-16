<?php
include "koneksi.php";

if(isset($_POST['Edit'])) {
   
    $id = $_POST['id'];
    $namaPelanggan = $_POST['NamaPelanggan'];
    $alamat = $_POST['Alamat'];
    $nomorTelepon = $_POST['NomorTelepon'];

    
    $update = mysqli_query($koneksi, "UPDATE pelanggan SET NamaPelanggan='$namaPelanggan', Alamat='$alamat', NomorTelepon='$nomorTelepon' WHERE PelangganID='$id'");
    
 if ($update) {
    ?>
    <script>
    alert('Berhasil Mengedit Data');
    window.location="Pelanggan.php";
    </script>
    <?php
   }else {
 ?>   
   <script>
    alert('Gagal Mengedit Data');
    window.location="Pelanggan.php";
    </script>
<?php
   }
}