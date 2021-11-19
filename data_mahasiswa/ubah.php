<?php require("../atas.php"); ?>
<?php
  //nilai awal
  $tempKODE = $_POST["tempKODE"];
  $query = "SELECT * FROM mahasiswa WHERE nim = '$tempKODE'";

  $sambung = mysqli_query($theLink, $query);
  while ($row = mysqli_fetch_array($sambung))
  {
    $nim = $row["nim"];
    $nm_mhs = $row["nm_mhs"];
    $prodi = $row["prodi"];
    $sex = $row["sex"];
    $tgl_lhr = $row["tgl_lhr"];
    $dosen_wali = $row["dosen_wali"];
    $alamat = $row["alamat"];
    $kota = $row["kota"];
  }
  
  if(isset($_POST["cmdSIMPAN"]))
  {
    $tempKODE = $_POST["tempKODE"];
    $nim = $_POST["nim"];
    $nm_mhs = $_POST["nm_mhs"];
    $prodi = $_POST["prodi"];
    $sex = $_POST["sex"];
    $tgl_lhr = $_POST["tgl_lhr"];
    $dosen_wali = $_POST["dosen_wali"];
    $alamat = $_POST["alamat"];
    $kota = $_POST["kota"];
        
    $query = "UPDATE  mahasiswa SET 
                nim = '$nim',
                nm_mhs = '$nm_mhs',
                prodi = '$prodi',
                sex = '$sex',
                tgl_lhr = '$tgl_lhr',
                dosen_wali = '$dosen_wali',
                alamat = '$alamat',
                kota = '$kota'
              WHERE nim  = '$tempKODE'";
    echo $query;
    $sambung = mysqli_query($theLink, $query);

    if (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) == 1062 )
    {
      echo '<script type="text/javascript">alert("terjadi duplikasi pada KODE KOTA, dengan Kode  ' . $nim . ' ganti KODE KOTA dengan yang lain");</script>';
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
        <input type="text" class="form-control" name="tgl_lhr" id="tgl_lhr". 
        required value="<?= $tgl_lhr; ?>">
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