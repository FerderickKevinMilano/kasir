<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM produk WHERE ProdukID = $id";
mysqli_query($koneksi, $query);

 if ($query) {
    ?>
    <script>
    alert('Berhasil Menghapus Data');
    window.location="tampilanproduk.php";
    </script>
    <?php
   }else {
 ?>   
   <script>
    alert('Gagal Menghapus Data');
    window.location="tampilanproduk.php";
    </script>
<?php
   }