<?php require("../atas.php"); ?>
<?php
  //nilai awal
  $nik    ='';
  $nm_dos ='';
  $sex    ='';
  $alamat ='';
  $kota   ='';

   if(isset($_POST["cmdSIMPAN"]))
  {
    $nik    = $_POST["nik"];
    $nm_dos = $_POST["nm_dos"];
    $sex    = $_POST["sex"];
    $alamat = $_POST["alamat"];
    $kota   = $_POST["kota"];
   
    $query = "INSERT INTO dosen (nik, nm_dos, sex, alamat, kota) VALUES 
             ('$nik','$nm_dos', '$sex', '$alamat', '$kota')";
    $sambung = mysqli_query($theLINK, $query);

    if (mysqli_errno($theLINK) > 0 && mysqli_errno($theLINK) == 1062 )
    {
      ?>
      <script>
        alert("terjadi duplikasi pada KODE KOTA, ganti KODE KOTA dengan yang lain");
      </script>
      <?php
    }
    efseif (mysqli_errno($theLINK > 0 && mysqli_errno($theLINK) <> 1062 )
    {
     ?>
      <script>
        alert("terjadi kesalahan, proses tambah data tidak berhasil");
      </script>
      <?php
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
        <label for="kd_kota">KODE INDEKS DOSEN</label>
        <input type="text" class="form-control" name="nik" id="nik" 
        required value="<?=$nik;?>">
      </div>
      <div class="form-group">
        <label for="nm_kota">NAMA LENGKAP DOSEN</label>
        <input type="text" class="form-control" name="nm_dos" id="nm_dos" 
        required value="<?=$nm_dos;?>">
      </div>
      <div class="form-group">
        <label for="sex">JENIS KELAMIN DOSEN</label>&nbsp;&nbsp;&nbsp;
        <?php
        if ($sex == 'L')
            $CEK = 'checked';
        else
            $CEK = '';
        ?>
          <input type="radio" name="sex" id="sex" value="L" required checked> <?=$CEK?>
          <label for="sex">Laki-Laki</label>&nbsp;&nbsp;&nbsp;
        <?php
        if ($sex == 'P')
            $CEK = 'checked';
        else
            $CEK = '';
        ?>
            <input type="radio" name="sex" id="sex" value="P" required> <?=$CEK?>
            <label for="sex">Perempuan</label>
      </div>
      <div class="form-group">
        <label for="nm_kota">ALAMAT LENGKAP DOSEN</label>
        <input type="text" class="form-control" name="alamat" id="alamat" 
        required value="<?=$alamat;?>">
      </div>
      <div class="form-group">
        <label for="kota">ASAL KOTA</label>
        <select class="form-control" name="kota" id="kota">
         <?php
         $query   = "SELECT * FROM kota ORDER BY nm_kota";
         $sambung = mysqli_query($theLINK, $query);
         while ($row = mysqli_fetch_array($sambung))
         {
          if ($row ["kd_kota"] == $kota)
              $PILIH = 'selected'
          else
              $PILIH = '';
         ?>        
        <option value="<?=$row["kd_kota"];?>" <?=$PILIH;?>><?=$row["nm_kota"];?></option>
        <?php
         }
         ?>
         </select>
        </div>
        <button type="submit" class="btn btn-primary" name="cmdSIMPAN">Simpan</button>
      <button type="button" class="btn btn-danger" onclick="window.location='tampil.php'">Batal</button>
    </form>
<?php require("../bawah.php"); ?>