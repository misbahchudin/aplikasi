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
        <label for="Prodi">Prodi</label>
        <select class="form-control" id="prodi" name="prodi">
          <?php
            $query = "SELECT prodi.kd_prodi, prodi.nm_prodi FROM prodi";
            $sambung = mysqli_query($theLink,$query);
            while($data = mysqli_fetch_array($sambung))
            {
              if($prodi == $data["kd_prodi"])
              {
                echo('<option selected="selected" value="'.$data["kd_prodi"].'">'.$data["nm_prodi"].'</option>');  
              }else echo('<option value="'.$data["kd_prodi"].'">'.$data["nm_prodi"].'</option>');
            }
          ?>
        </select>
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
        <label for="Prodi">Dosen Wali</label>
        <select class="form-control" id="dosen_wali" name="dosen_wali">
          <?php
            $query = "SELECT nik, nm_dos FROM dosen";
            $sambung = mysqli_query($theLink,$query);
            while($data = mysqli_fetch_array($sambung))
            {
              if($dosen_wali == $data["nik"])
              {
                echo('<option selected="selected" value="'.$data["nik"].'">'.$data["nm_dos"].'</option>');  
              } else echo('<option value="'.$data["nik"].'">'.$data["nm_dos"].'</option>');
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
        <select class="form-control" id="kota" name="kota">
          <?php
            $query = "SELECT kd_kota, nm_kota FROM kota";
            $sambung = mysqli_query($theLink,$query);
            while($data = mysqli_fetch_array($sambung))
            {
              if($kota == $data["kd_kota"])
              {
                echo('<option selected="selected" value="'.$data["kd_kota"].'">'.$data["nm_kota"].'</option>');
              } else echo('<option value="'.$data["kd_kota"].'">'.$data["nm_kota"].'</option>');
            }
          ?>
        </select>
      </div>                 

      <button type="submit" class="btn btn-primary" name="cmdSIMPAN">Simpan</button>
      <button type="button" class="btn btn-danger" onclick="window.location='tampil.php'">Batal</button>
    </form>
  </div>

<?php require("../bawah.php"); ?>