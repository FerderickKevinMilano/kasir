<?php
include "koneksi.php";
$id =$_GET['id'];
$edit =mysqli_query($koneksi, "SELECT *FROM penjualan Join 
pelanggan ON penjualan.PelangganID = pelanggan.PelangganID WHERE PenjualanID='$id'");
$data =mysqli_fetch_array($edit);
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

<form action="updatepenjualan.php" style="max-width:500px;margin:auto" method="post">
  <h2>Form Penjualan</h2>
  <input type="hidden" name="id" value="<?php echo $data['PenjualanID']; ?>">
<div class="input-container">
  <i class="fa fa-calendar icon"></i>
  <label class="input-field">Tanggal Penjualan</label>
  <input class="input-field" type="date" name="TanggalPenjualan" value="<?php echo $data['TanggalPenjualan']; ?>" required>
</div>

<div class="input-container">
  <i class="fa fa-shopping-basket icon"></i>
  <label class="input-field">Total Harga</label>
  <input class="input-field" type="number" name="TotalHarga" placeholder="Masukan Total Harga" value="<?php echo $data['TotalHarga']; ?>" required>
</div>

<!-- Select Pelanggan -->
<div class="input-container">
  <i class="fa fa-phone-square icon"></i>
  <label class="input-field">Pelanggan</label>
  <select class="input-field" name="NamaPelanggan" required>
    <option value="<?php echo $data['PelangganID']; ?>"><?php echo $data['NamaPelanggan']; ?></option>
    <!-- Retrieve and display other options -->
    <?php
    $query_pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan") or die(mysqli_error($koneksi));
    while ($data_pelanggan = mysqli_fetch_array($query_pelanggan)) {
      if ($data_pelanggan['PelangganID'] != $data['PelangganID']) {
        echo "<option value='" . $data_pelanggan['PelangganID'] . "'>" . $data_pelanggan['NamaPelanggan'] . "</option>";
      }
    }
    ?>
  </select>
</div>



  <button type="submit" name="Edit" class="btn">Tambah</button><br><br>
  <button type="text" class="btn"><a href="tampilanpenjualan.php">Batal Tambah</a></button>
</form>

</body>
</html>
