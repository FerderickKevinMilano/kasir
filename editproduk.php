<?php
include "koneksi.php"; 
$id =$_GET['id'];

$edit =mysqli_query($koneksi, "SELECT *FROM produk WHERE ProdukID='$id'");
$data =mysqli_fetch_array($edit);

if(!$data){
die("data tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edith</title>
    <style>
        input{
            text-align: left;
             width: 85%;
             padding: 10px;
             margin: auto;
             float: right;
             
        }
        body{
            background-color: gray;
            margin: auto;
            
        }
        label{
            font-size: 20px;
            font-family: 'Times New Roman';
            
            
        }
        #Pengaturan{
            text-align: left;
             width: 1267px;
             padding: 10px;
             margin: auto;
             float: right;
             
        }
        
button{
    background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin-left: 1%;

}
button:hover{
    background-color: orange;
}
a{
    color: white;
    text-decoration: none;
}

        

    </style>
</head>
<body>
    <form class="bingkai" action="updateproduk.php" method="POST"  enctype="multipart/form-data">
    <h2>SILAHKAN EDIT DATA ANDA</h2>
    <input type="hidden" name="id" value="<?php echo $data['ProdukID'];?>" required>
    <br>   
        <label>Nama Produk</label>
        <input type="text" name="NamaProduk" value="<?php echo $data['NamaProduk'];?>" required><br><br>
        
        <label>Harga</label>
        <input type="number" name="Harga" value="<?php echo $data['Harga'];?>" required><br><br>

        <label>Stok</label>
        <input type="number" name="Stok" value="<?php echo $data['Stok'];?>" required><br><br>

        <label>Keterangan</label>
        <input type="text" name="Keterangan" value="<?php echo $data['Keterangan'];?>" required><br><br>

 <Button type="submit" name="Edit">Edit</Button>
 <button><a href="tampilanproduk.php">Batal Edit</a></button>
 </form>
</body>
</html>
