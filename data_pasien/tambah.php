<?php require("../atas.php"); ?>
<?php
  //nilai awal
  $no_rm ='';
  $nm_psn ='';
  $sex ='';
  $tgl_lhr ='';
  $photo ='';


  if(isset($_POST["cmdSIMPAN"]))
  {
    // Isi Data
    $no_rm = $_POST["no_rm"]; 
    $nm_psn = $_POST["nm_psn"]; 
    $sex = $_POST["sex"]; 
    $tgl_lhr = $_POST["tgl_lhr"]; 
    //$photo = $_POST["photo"]; 
   
    $tipefile   = array('png','jpg','jpeg','gif');
    $namafile   = $_FILES['photo']['name'];
    $ukuranfile = $_FILES['photo']['size'];
    $EXT        = pathinfo($namafile, PATHINFO_EXTENSION); 
   
   if (!in_array($EXT, $tipefile))
   {
     echo '<script type="text/javascript">alert("Tipe File Salah");</script>';
   } elseif ($ukuranfile > 1048576)
   {
    echo '<script type="text/javascript">alert("Ukuran File Lebih dari 1MB");</script>'; 
   } else
   {
     $photo = rand().'_'.date("YmdHis").'.'.$EXT;
     $query = "INSERT INTO pasien(
        no_rm,                 
        nm_psn,                 
        sex,                 
        tgl_lhr,                 
        photo) VALUES (
        '$no_rm',
        '$nm_psn',
        '$sex',
        '$tgl_lhr',
        '$photo')";
     $sambung = mysqli_query($theLink,$query);
   }
    if (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) == 1062 )
    {
      echo '<script type="text/javascript">alert("terjadi duplikasi pada KODE KOTA, dengan Kode  ' . $nim . ' ganti KODE KOTA dengan yang lain");</script>';
    }elseif (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) <> 1062 )
    {
      echo mysqli_errno($theLink);
      echo '<script type="text/javascript">alert("terjadi kesalahan, proses tambah data tidak berhasil");</script>';
    }
    else
    {
      move_uploaded_file($_FILES['photo']['tmp_name'],'../photo/'.$photo);
      echo '<script>window.location="tampil.php"</script>';
    }  
  }
  
?>

<div class="card mt-3">
 <div class="card-header bg-primary text-white">Tambah Data Dosen</div>
  <div class="card-body">
   <form action="" method="post" enctype="multipart/form-data">
   <!-- *********************************************************************************** -->
    <div class="form-group">
     <label for="no_rm">NOMOR REKAM MEDIS</label>
     <input type="text" class="form-control" name="no_rm" id="no_rm" minlength="8" 
     maxlength="8" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}" value="">
    </div>
   <!-- *********************************************************************************** -->
    <div class="form-group">
     <label for="nm_dos">NAMA LENGKAP PASIEN</label>
     <input type="text" class="form-control" name="nm_psn" id="nm_psn" 
     maxlength="80" required value="">
    </div>
   <!-- *********************************************************************************** -->
    <div class="form-group">
     <label for="sex">JENIS KELAMIN PASIEN</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" name="sex" id="sex" value="L" required >
      <label for="sex">Laki-Laki</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" name="sex" id="sex" value="P" required >
      <label for="sex">Perempuan</label>
    </div>
   <!-- *********************************************************************************** -->
    <div class="form-group">
     <label for="tgl_lhr">TANGGAL LAHIR</label>
     <input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" 
     value="" required>
    </div>
   <!-- *********************************************************************************** -->
    <div class="form-group">
     <label for="photo">PHOTO PASIEN</label>
     <input type="file" class="form-control" name="photo" id="photo" required>
     <p style="color: red"><b>Ekstensi harus .png | .jpg | .jpeg | .gif - Maksimal 1Mb</b></p>
    </div>
   <!-- *********************************************************************************** -->
    <button type="submit" class="btn btn-primary mt-3" name="cmdSIMPAN">Simpan</button>
    <button type="button" class="btn btn-danger mt-3" 
    onclick="window.location='tampil.php'">Batal</button>
   <!-- *********************************************************************************** -->
   </form>
</div>

<?php require("../bawah.php"); ?>