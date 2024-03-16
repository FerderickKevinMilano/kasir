<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM detailpenjualan WHERE DetailID = $id";
mysqli_query($koneksi, $query);

 if ($query) {
    ?>
    <script>
    alert('Berhasil Menghapus Data');
    window.location="tampilanDetailpenjualan.php";
    </script>
    <?php
   }else {
 ?>   
   <script>
    alert('Gagal Menghapus Data');
    window.location="tampilanDetailpenjualan.php";
    </script>
<?php
   }