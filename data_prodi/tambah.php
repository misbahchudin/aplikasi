<?php require("../atas.php"); ?>
<?php
  //nilai awal
  $kd_prodi ='';
  $nm_prodi ='';

  if(isset($_POST["cmdSIMPAN"]))
  {
    $kd_prodi = $_POST["kd_prodi"];
    $nm_prodi = $_POST["nm_prodi"];

    $query = "INSERT INTO prodi(
      kd_prodi,
      nm_prodi
      ) VALUES (
      '$kd_prodi',
      '$nm_prodi'
      )";
   echo $query; 
    $sambung = mysqli_query($theLink, $query);

    if (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) == 1062 )
    {
      echo '<script type="text/javascript">alert("terjadi duplikasi pada KODE KOTA, dengan Kode  ' . $kd_prodi . ' ganti KODE KOTA dengan yang lain");</script>';
    }elseif (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) <> 1062 )
    {
      echo '<script type="text/javascript">alert("terjadi kesalahan, proses tambah data tidak berhasil");</script>';
    }
    else
    {
      echo '<script>window.location="tampil.php"</script>';
    }  
  }
  
?>

<div class="card mt-3">
  <div class="card-header bg-primary text-white">Tambah Data Kota</div>
  <div class="card-body">
    <form action="" method="post">
      <div class="form-group">
        <label for="kd_prodi">Kode Prodi</label>
        <input type="text" class="form-control" name="kd_prodi" id="kd_prodi". 
        required value="<?= $kd_prodi; ?>">
      </div>
      <div class="form-group">
        <label for="nm_prodi">Nama Prodi</label>
        <input type="text" class="form-control" name="nm_prodi" id="nm_prodi" 
        required value="<?= $nm_prodi; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="cmdSIMPAN">Simpan</button>
      <button type="button" class="btn btn-danger" onclick="window.location='tampil.php'">Batal</button>
    </form>
  </div>

<?php require("../bawah.php"); ?>