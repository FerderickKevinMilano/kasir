<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM penjualan WHERE PenjualanID = $id";
mysqli_query($koneksi, $query);

 if ($query) {
    ?>
    <script>
    alert('Berhasil Menghapus Data');
    window.location="tampilanpenjualan.php";
    </script>
    <?php
   }else {
 ?>   
   <script>
    alert('Gagal Menghapus Data');
    window.location="tampilanpenjualan.php";
    </script>
<?php
   }