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
        <label for="Prodi">Prodi</label>
        <select class="form-control" id="prodi" name="prodi">
          <?php
            $query = "SELECT prodi.kd_prodi, prodi.nm_prodi FROM prodi";
            $sambung = mysqli_query($theLink,$query);
            while($data = mysqli_fetch_array($sambung))
            {
              echo('<option value="'.$data["kd_prodi"].'">'.$data["nm_prodi"].'</option>');
            }
          ?>
        </select>
      </div>
      
      <div class="form-group">
        <label for="sex">sex</label>
        <div class="radio">
          <label><input type="radio" name="sex" checked required value="L"> Laki-Laki</label>
          <label><input type="radio" name="sex" checked required value="P"> Perempuan</label>
        </div>
      </div>  

      <div class="form-group">
        <label for="tgl_lhr">tgl_lhr</label>
        <input type="date" class="form-control" name="tgl_lhr">
      </div>                 

      <div class="form-group">
        <label for="Prodi">Dosen</label>
        <select class="form-control" id="prodi" name="dosen_wali">
          <?php
            $query = "SELECT nik, nm_dos FROM dosen";
            $sambung = mysqli_query($theLink,$query);
            while($data = mysqli_fetch_array($sambung))
            {
              echo('<option value="'.$data["nik"].'">'.$data["nm_dos"].'</option>');
            }
          ?>
        </select>
      </div>             

      <div class="form-group">
        <label for="alamat">alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat". 
        required value="<?= $alamat; ?>">
      </div>   

      <div class="form-group">
        <label for="Prodi">Kota</label>
        <select class="form-control" id="prodi" name="kota">
          <?php
            $query = "SELECT kd_kota, nm_kota FROM kota";
            $sambung = mysqli_query($theLink,$query);
            while($data = mysqli_fetch_array($sambung))
            {
              echo('<option value="'.$data["kd_kota"].'">'.$data["nm_kota"].'</option>');
            }
          ?>
        </select>
      </div>                

      <button type="submit" class="btn btn-primary" name="cmdSIMPAN">Simpan</button>
      <button type="button" class="btn btn-danger" onclick="window.location='tampil.php'">Batal</button>

    </form>
  </div>

<?php require("../bawah.php"); ?>