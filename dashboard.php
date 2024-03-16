<?php
include "koneksi.php";
$pelanggan = "SELECT *From pelanggan";
$jum_pelanggan = mysqli_query($koneksi, $pelanggan);

$jumlah_pelanggan = mysqli_num_rows($jum_pelanggan);

$Produk = "SELECT SUM(Stok) as total FROM produk";
$jum_produk = mysqli_query($koneksi, $Produk);

$barang = mysqli_fetch_assoc($jum_produk);
$totalstock = $barang['total'];

$Petugas = "SELECT *From produk";
$jum_petugas = mysqli_query($koneksi, $Petugas);

$jumlah_petugas = mysqli_num_rows($jum_petugas);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>DashboardLandingpage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="Tabel.css">
    <link rel="stylesheet" href="card.css">
    <style>
        
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url('gambar/Download\ premium\ vector\ of\ Black\ and\ white\ hexagon\ geometric\ pattern\ poster\ vector\ by\ katie\ about\ black\ mockup\ background\,\ abstract\ geometric\ background\,\ grey\ geometric\,\ background\,\ and\ background\ product\ mockup\ .jpg'); 

        }
        
        .navbar {
          overflow: hidden;
          background-color: #333;
        z-index: 2;
          
        }
        
        .navbar a {
          float: left;
          font-size: 16px;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }
        
        .dropdown {
          float: left;
          overflow: hidden;
        }
        
        .dropdown .dropbtn {
          font-size: 16px;  
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }
        
        .navbar a:hover, .dropdown:hover .dropbtn {
          background-color: red;
        }
        
        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 243px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
        
        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: center;
        }
        
        .dropdown-content a:hover {
          background-color: #ddd;
        }
        
        .dropdown:hover .dropdown-content {
          display: block;
        }

        .sidebar {
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 250px; /* Same as the width of the sidenav */
  padding: 0px 10px;
}
.icons{
 font-size: 35px;

}
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}
/* CSS for the buttons */
button {
  background-color: white;
  border: none;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
 
}

/* CSS for the "Edit" button */
button.edit {
  background-color: #008CBA; /* Blue */
}

/* CSS for the "Hapus" button */
button.hapus {
  background-color: #f44336; /* Red */
}
button:hover{
  background-color: red;
}
a{
  text-decoration: none;
color: black;
}
.kiko {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
.kiko:hover{
  background-color: green;
  opacity: 0.8;
}
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}
.dropdown-btn {
  padding: 6px 8px 6px 10px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

        </style>

  </head>
  <body>
    

        

        <div class="navbar">
          <a href="#home"><i class="fa fa-home"></i>Home</a>
          <div class="dropdown" style="float: right; margin-right: 60px;">
            <button class="dropbtn">SELAMAT DATANG ADMIN 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <button type="submit" class="kiko" onclick="myfunction()">Log out</button>
            
            </div>
          </div> 
        </div>

        <div class="sidebar">
        <a href="#dashboard"><i class="		fa fa-navicon"></i> Dashboard</a>
            <a href="Pelanggan.php"><i class="	fa fa-users"></i> Pelanggan</a>
            <a href="tampilanproduk.php"><i class="	fa fa-inbox"></i> Stock Barang</a>
            <button class="dropdown-btn"><i class="fa fa-shopping-basket"></i>Penjualan
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="tampilanDetailpenjualan.php"><i class="fa fa-pencil-square"></i> Detail Penjualan</a>
    <a href="tampilanpenjualan.php"><i class="fa fa-bar-chart-o"></i>Data Penjualan</a>
  </div>
            <a href="login.html"><i class="fa fa-power-off"></i> Logout</a>
          </div>
          <div class="main">
          <div class="row">
  <div class="column">
    <div class="card">
      <h3>Jumlah Pelanggan</h3>
      <div class="icons"><i class="	fa fa-users"></i></div>
      <p><?php echo "" . $jumlah_pelanggan .""; ?></p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>Jumlah Stock Barang</h3>
      <div class="icons"><i class="	fa fa-inbox"></i> </div>
      <p><?php echo "" . $barang['total'] .""; ?></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3 >Jumlah Petugas</h3>
      <div class="icons"><i	class="fa fa-user-secret"></i></div>
      <p><?php echo "" . $jumlah_petugas .""; ?></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Total Penjualan</h3>
      <div class="icons"><i class="fa fa-truck"></i></div>
      <p>0</p>
    </div>
  </div>
</div>        
          </div>
          <script>
  function myfunction() {
    var txt;
    if(confirm("Apakah Anda Yakin Logout?")) {
      window.location = "landingpage.html";
    } else {
      window.location = "dashboard.php";
    }
  }
</script>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>

  </body>
</html>

