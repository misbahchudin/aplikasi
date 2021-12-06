<?php require("../atas.php"); ?>

<h3>Daftar Pasien</h3>
  <a href="tambah.php" class="btn btn-primary btn-sm mb-3">Add Data</a>
  <table class="table table-striped table-secondary table-sm">
   <thead>
    <tr>
    <th>NO</th>
    <th>no_rm</th>
    <th>nm_psn</th>
    <th>sex</th>
    <th>tgl_lhr</th>
    <th>photo</th>
     <th class="text-center">EDIT</th>
     <th class="text-center">DELETE</th>
    </tr>
   </thead>
   <tbody>
   <?php
   $nomor   = 1;
  $queri   = "SELECT
                pasien.no_rm,
                pasien.nm_psn,
                pasien.sex,
                pasien.tgl_lhr,
                pasien.photo 
              FROM
                pasien 
                ORDER BY no_rm";

   $sambung = mysqli_query($theLink, $queri);
   while ($row = mysqli_fetch_array($sambung))
   {
   ?>
    <tr>
     <td><?= $nomor; ?></td>
     <td><?= $row["no_rm"]; ?></td>                                 
     <td><?= $row["nm_psn"]; ?></td>                                 
     <td><?= $row["sex"]; ?></td>                                 
     <td><?= $row["tgl_lhr"]; ?></td>                                                                
     <td><img src=<?= $thePORT.'photo/'.$row["photo"]; ?> width='80' height='80'> </td>

     <td class="text-center">
      <form action="ubah.php" method="post">
      <input type="hidden" name="tempKODE" id="tempKODE" value="<?= $row["no_rm"]; ?>">
      <button type="submit" class="btn btn-success btn-sm" name="cmdEDIT">Edit</button>
      </form>
     </td>
     <td class="text-center">
      <form action="hapus.php" method="post">
      <input type="hidden" name="tempKODE" id="tempKODE" value="<?= $row["no_rm"]; ?>">
      <button type="submit" class="btn btn-danger btn-sm" name="cmdD ELETE"
      onclick="return confirm('Anda yakin ingin menghapus data ini?');">Delete</button>
      </form>
     </td>
    </tr>
    <?php
    $nomor = $nomor + 1;
   }
   ?>
    </tbody>
  </table>

<?php require("../bawah.php"); ?>