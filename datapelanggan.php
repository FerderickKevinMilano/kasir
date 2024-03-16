<?php
include "koneksi.php";
$tabel = "SELECT *From pelanggan";
$data = mysqli_query($koneksi, $tabel);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>
    <link rel="stylesheet" href="Tabel.css">
    <style>


tr:hover{
    background-color: orangered;
}
button:hover{
    background-color: orange;
}
a{
    text-decoration: none;
    color: black;
}
body{
    color: grey;
    
}
button{
    background-color: white;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
h1{
    text-align: center;
    color: black
}

.header {
  overflow: hidden;
  background-color: rgb(27, 24, 27);
  padding: 5px 10px;
}

.header a {
  float: left;
  color: rgb(255, 255, 255);
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}

    </style>
</head>
<body>
<div class="header">
  <a href="#default" class="logo">KELOLA DATA PELANGGAN</a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="LoginPHP.html">Log Out</a>
    <a href="dashboard.html">Kembali</a>
  </div>
</div>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
    <table id="myTable">
        <thead>
            <th colspan="4">TABEL DATA PELANGGAN</th>
            <tr>
<th>NAMA PELANGGAN</th>
<th>ALAMAT</th>
<th>NOMOR PELANGGAN</th>
<th colspan="2">AKSI</th>
</tr>
        </thead>
    <?php
    while ($tampil = mysqli_fetch_assoc($data)) {
    ?>
   
<tbody>         
<tr>           
<td><?php echo $tampil['NamaPelanggan'];?></td>
<td><?php echo $tampil['Alamat'];?></td>
<td><?php echo $tampil['NomorTelepon'];?></td>
<td><button type="text"><a href="inputpelanggan.html?id=<?php echo $tampil['PelangganID'];?>">Tambah</a></button></td>
<td><button type="text"><a href="editpelanggan.php?id=<?php echo $tampil['PelangganID'];?>">EDIT</a></button>
<button type="text"><a href="hapuspelanggan.php?id=<?php echo $tampil['PelangganID'];?>">HAPUS</a></button>
</tr>
<?php 
}
?>
        </tbody>
    </table>
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>
</html>