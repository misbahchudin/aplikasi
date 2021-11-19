<?php require("../atas.php"); ?>
<?php
  //nilai awal
  $nim ='';
  $nm_mhs ='';
  $prodi ='';
  $sex ='';
//$tgl_lhr ='';
  $dosen_wali ='';
  $alamat ='';
  $kota ='';



  if(isset($_POST["cmdSIMPAN"]))
  {
    $nim = $_POST["nim"];
    $nm_mhs = $_POST["nm_mhs"];
    $prodi = $_POST["prodi"];
    $sex = $_POST["sex"];
    $tgl_lhr = $_POST["tgl_lhr"];
    $dosen_wali = $_POST["dosen_wali"];
    $alamat = $_POST["alamat"];
    $kota = $_POST["kota"];
      
    $query = "INSERT INTO mahasiswa(
        nim,
        nm_mhs,
        prodi,
        sex,
        tgl_lhr,
        dosen_wali,
        alamat,
        kota
      ) VALUES (
        '$nim',
        '$nm_mhs',
        '$prodi',
        '$sex',
        '$tgl_lhr',
        '$dosen_wali',
        '$alamat',
        '$kota'
      )";
    echo $query;

    $sambung = mysqli_query($theLink, $query);

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
      echo '<script>window.location="tampil.php"</script>';
    }  
  }
  
?>

<div class="card mt-3">
  <div class="card-header bg-primary text-white">Tambah Data Kota</div>
  <div class="card-body">
    <form action="" method="post">
    <div class="form-group">
        <label for="nim">nim</label>
        <input type="text" class="form-control" name="nim" id="nim". 
        required value="<?= $nim; ?>">
      </div>                 

      <div class="form-group">
        <label for="nm_mhs">nm_mhs</label>
        <input type="text" class="form-control" name="nm_mhs" id="nm_mhs". 
        required value="<?= $nm_mhs; ?>">
      </div>                 

      <div class="form-group">
        <label for="prodi">prodi</label>
        <input type="text" class="form-control" name="prodi" id="prodi". 
        required value="<?= $prodi; ?>">
      </div>                 

      <div class="form-group">
        <label for="sex">sex</label>
        <input type="text" class="form-control" name="sex" id="sex". 
        required value="<?= $sex; ?>">
      </div>                 

      <div class="form-group">
        <label for="tgl_lhr">tgl_lhr</label>
        <input type="date" class="form-control" name="tgl_lhr">
      </div>                 

      <div class="form-group">
        <label for="dosen_wali">dosen_wali</label>
        <input type="text" class="form-control" name="dosen_wali" id="dosen_wali". 
        required value="<?= $dosen_wali; ?>">
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