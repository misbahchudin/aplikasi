<?php require("../atas.php"); ?>
<?php
  //nilai awal
  $nik ='';
  $nm_dos ='';
  $sex ='';
  $alamat ='';
  $kota ='';

  if(isset($_POST["cmdSIMPAN"]))
  {
    $nik = $_POST["nik"];
    $nm_dos = $_POST["nm_dos"];
    $sex = $_POST["sex"];
    $alamat = $_POST["alamat"];
    $kota = $_POST["kota"];
     
    $query = "INSERT INTO dosen(nik,
      nm_dos,
      sex,
      alamat,
      kota
) VALUES (
      '$nik',
      '$nm_dos',
      '$sex',
      '$alamat',
      '$kota'
      )";
    $sambung = mysqli_query($theLink, $query);
echo $query;
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
  <div class="card-header bg-primary text-white">Tambah Data Kota</div>
  <div class="card-body">
    <form action="" method="post">
      <div class="form-group">
        <label for="nik">nik</label>
        <input type="text" class="form-control" name="nik" id="nik". 
        required value="<?= $nik; ?>">
      </div>

      <div class="form-group">
        <label for="nm_dos">nm_dos</label>
        <input type="text" class="form-control" name="nm_dos" id="nm_dos". 
        required value="<?= $nm_dos; ?>">
      </div>

      <div class="form-group">
        <label for="sex">sex</label>
        <input type="text" class="form-control" name="sex" id="sex". 
        required value="<?= $sex; ?>">
      </div>

      <div class="form-group">
        <label for="alamat">alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat". 
        required value="<?= $alamat; ?>">
      </div>

      <div class="form-group">
        <label for="kota">kota</label>
        <input type="text" class="form-control" name="kota" id="kota". 
        required value="<?= $kota; ?>">
      </div>

      <button type="submit" class="btn btn-primary" name="cmdSIMPAN">Simpan</button>
      <button type="button" class="btn btn-danger" onclick="window.location='tampil.php'">Batal</button>
    </form>
  </div>

<?php require("../bawah.php"); ?>