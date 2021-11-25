<?php
    session_start();
    if ($_SESSION['status_login'] != true) {
      header('location:index.php');
    }
    include "koneksi.php";
    $query_login=mysqli_query($koneksi,"SELECT * FROM siswa where id_siswa = '".$_SESSION['id_siswa']."'");
    $data_login = mysqli_fetch_array($query_login);
    $_SESSION['saldo']=$data_login['saldo'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<script>
    setInterval(function(){ 
      let uang = Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(<?=$_SESSION['saldo']?>);
          document.getElementById("saldo").innerHTML  = uang;  
    }, 1);
  </script>
<body>
  <nav class="navbar navbar-dark bg-dark shadow-sm navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="buku.php">ini toko onlen</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Keranjang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="peminjaman.php">Pembelian</a>
          </li>
  </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="tambah_saldo.php" id="saldo"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="proses_logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</body>
</html>