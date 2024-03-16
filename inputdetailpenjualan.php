<?php
include "koneksi.php";
$Kirim =mysqli_query($koneksi, "SELECT *FROM detailpenjualan Join 
penjualan ON detailpenjualan.PenjualanID = penjualan.PenjualanID");
$data =mysqli_fetch_array($Kirim);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: dodgerblue;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid dodgerblue;
}

/* Set a style for the submit button */
.btn {
  background-color: dodgerblue;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}
a{
    text-decoration: none;
    color: white;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<form action="" style="max-width:500px;margin:auto" method="post">
  <h2>Form Detail Penjualan</h2>
  <div class="input-container">
    <i class="	fa fa-calendar icon"></i>
    <label class="input-field">PenjualanID</label>
    <select class="input-field" name="PenjualanID" required>
    <option value="<?php echo $data['PenjualanID']; ?>"><?php echo $data['PenjualanID']; ?></option>
    <?php
    $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan") or die(mysqli_error($koneksi));
    while ($data_pelanggan = mysqli_fetch_array($query_pelanggan)) {
      if ($data_pelanggan['PenjualanID'] != $data['PenjualanID']) {
        echo "<option value='" . $data_pelanggan['PenjualanID'] . "'>" . $data_pelanggan['PenjualanID'] . "</option>";
      }
    }
    ?>
  </select>
</div>

<div class="input-container">
    <i class="	fa fa-calendar icon"></i>
    <label class="input-field">ProdukID</label>
    <select class="input-field" name="ProdukID" required>
    <option value="<?php echo $data['ProdukID']; ?>"><?php echo $data['ProdukID']; ?></option>
    <?php
    $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan") or die(mysqli_error($koneksi));
    while ($data_pelanggan = mysqli_fetch_array($query_pelanggan)) {
      if ($data_pelanggan['ProdukID'] != $data['ProdukID']) {
        echo "<option value='" . $data_pelanggan['ProdukID'] . "'>" . $data_pelanggan['ProdukID'] . "</option>";
      }
    }
    ?>
  </select>
</div>

  <div class="input-container">
    <i class="	fa fa-shopping-basket icon"></i> 
    <label class="input-field">Jumlah Produk</label>
    <input class="input-field" type="number" placeholder="Masukan Total Harga" name="jumlahproduk">
  </div>
  
  <div class="input-container">
    <i class="fa fa-phone-square icon"></i>
    <label class="input-field">Subtotal</label>
    <input class="input-field" type="number" placeholder="Masukan subtotal" name="subtotal">
  </div>

  <button type="submit" name="Kirim" class="btn">Tambah</button><br><br>
  <button type="text" class="btn"><a href="tampilanDetailpenjualan.php">Batal Tambah</a></button>
</form>

</body>
</html>
