<?php
include "koneksi.php";

if(isset($_POST['Edit'])) {
   
    $id = $_POST['id'];
    $namaproduk = $_POST['NamaProduk'];
    $harga = $_POST['Harga'];
    $stok = $_POST['Stok']; 
    $keterangan = $_POST['Keterangan'];
    
    $update = mysqli_query($koneksi, "UPDATE produk SET NamaProduk='$namaproduk', Harga='$harga', Keterangan='$keterangan' WHERE ProdukID='$id'");
    
 if ($update) {
    ?>
    <script>
    alert('Berhasil Mengedit Data');
    window.location="tampilanproduk.php";
    </script>
    <?php
   }else {
 ?>   
   <script>
    alert('Gagal Mengedit Data');
    window.location="tampilanproduk.php";
    </script>
<?php
   }
}