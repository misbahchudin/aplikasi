<?php
 $dbhost = "127.0.0.1";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "test8";

 $theLink = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
            or die("database tidak bisa terhubung");

 $thePORT = "http://localhost/aplikasi/"; 
 
?> 
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Prodi MIK Stikes Mitra Husada</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= $thePORT . 'library/css/bootstrap.min.css';?>">
</head>
<body>
 <div class="container-fluid"> 
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
     <img src="<?= $thePORT . 'Logo_Bhakti_Husada.png'; ?>" width="40" height="55" class="d-inline-block align-top">
     </a>
   <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
     <a class="nav-link" href="<?= $thePORT ?>">Beranda</a>
    </li>

    <li class="nav-item active dropdown">
     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
      Master Data
     </a>
     <div class="dropdown-menu">
      <a class="dropdown-item" href="<?= $thePORT . 'data_kota/tampil.php'; ?>">Data Kota</a>
      <a class="dropdown-item" href="<?= $thePORT . 'data_prodi/tampil.php'; ?>">Data Prodi</a>
      <a class="dropdown-item" href="<?= $thePORT . 'data_dosen/tampil.php'; ?>">Data Dosen</a>
      <a class="dropdown-item" href="#">Data Mahasiswa</a>
     </div>
    </li>
  
   </ul>
  </nav>