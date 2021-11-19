<?php require("../atas.php"); ?>
<?php
  //nilai awal
  $tempKODE = $_POST["tempKODE"];
  $query = "SELECT * FROM kota WHERE kd_kota = '$tempKODE'";

  $sambung = mysqli_query($theLink, $query);
  while ($row = mysqli_fetch_array($sambung))
  {
    $kd_kota = $row["kd_kota"];
    $nm_kota = $row["nm_kota"];
  }
  
  if(isset($_POST["cmdSIMPAN"]))
  {
    $tempKODE = $_POST["tempKODE"];
    $kd_kota = $_POST["kd_kota"];
    $nm_kota = $_POST["nm_kota"];
        
    $query = "UPDATE  kota SET kd_kota = '$kd_kota', nm_kota = '$nm_kota' 
              WHERE kd_kota  = '$tempKODE'";

    $sambung = mysqli_query($theLink, $query);

    if (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) == 1062 )
    {
      echo '<script type="text/javascript">alert("terjadi duplikasi pada KODE KOTA, dengan Kode  ' . $kd_kota . ' ganti KODE KOTA dengan yang lain");</script>';
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
        <label for="kd_kota">KODE KOTA</label>
        <input type="text" class="form-control" name="kd_kota" id="kd_kota". 
        required value="<?= $kd_kota; ?>">
      </div>
      <div class="form-group">
        <label for="nm_kota">NAMA KOTA</label>
        <input type="text" class="form-control" name="nm_kota" id="nm_kota" 
        required value="<?= $nm_kota; ?>">
      </div>
      <button type="submit" class="btn btn-primary" name="cmdSIMPAN">Simpan</button>
      <button type="button" class="btn btn-danger" onclick="window.location='tampil.php'">Batal</button>
    </form>
  </div>

<?php require("../bawah.php"); ?>