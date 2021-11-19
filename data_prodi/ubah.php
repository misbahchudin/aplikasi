<?php require("../atas.php"); ?>
<?php
  //nilai awal
  $tempKODE = $_POST["tempKODE"];
  $query = "SELECT * FROM prodi WHERE kd_prodi = '$tempKODE'";

  $sambung = mysqli_query($theLink, $query);
  while ($row = mysqli_fetch_array($sambung))
  {
    $kd_prodi = $row["kd_prodi"];
    $nm_prodi = $row["nm_prodi"];
  }
  
  if(isset($_POST["cmdSIMPAN"]))
  {
    $tempKODE = $_POST["tempKODE"];
    $kd_prodi = $_POST["kd_prodi"];
    $nm_prodi = $_POST["nm_prodi"];
        
    $query = "UPDATE  prodi SET kd_prodi = '$kd_prodi', nm_prodi = '$nm_prodi' 
              WHERE kd_prodi  = '$tempKODE'";

    $sambung = mysqli_query($theLink, $query);

    if (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) == 1062 )
    {
      echo '<script type="text/javascript">alert("terjadi duplikasi pada KODE KOTA, dengan Kode  ' . $kd_prodi . ' ganti KODE dengan yang lain");</script>';
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
  <div class="card-header bg-primary text-white">Ubah Data Kota</div>
  <div class="card-body">
    <form action="" method="post">
      <input type="hidden" name="tempKODE" id="tempKODE" value="<?= $tempKODE; ?>">
      <div class="form-group">
        <label for="kd_prodi">KODE KOTA</label>
        <input type="text" class="form-control" name="kd_prodi" id="kd_prodi". 
        required value="<?= $kd_prodi; ?>">
      </div>
      <div class="form-group">
        <label for="nm_prodi">NAMA KOTA</label>
        <input type="text" class="form-control" name="nm_prodi" id="nm_prodi" 
        required value="<?= $nm_prodi; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="cmdSIMPAN">Simpan</button>
      <button type="button" class="btn btn-danger" onclick="window.location='tampil.php'">Batal</button>
    </form>
  </div>

<?php require("../bawah.php"); ?>