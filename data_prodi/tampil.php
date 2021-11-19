<?php require("../atas.php"); ?>

<h3>Daftar Prodi</h3>
  <a href="" class="btn btn-primary btn-sm mb-3">Add Data</a>

  <table class="table table-striped table-secondary table-sm">
   <thead>
    <tr>
     <th>NO</th>
     <th>KODE PRODI</th>
     <th>NAMA PRODI</th>
     <th class="text-center">EDIT</th>
     <th class="text-center">DELETE</th>
    </tr>
   </thead>
   <tbody>
   <?php
   $nomor   = 1;
   $queri   = "SELECT * FROM prodi ORDER BY nm_prodi";
   $sambung = mysqli_query($theLink, $queri);
   while ($row = mysqli_fetch_array($sambung))
   {
   ?>
    <tr>
     <td><?= $nomor; ?></td>
     <td><?= $row["kd_prodi"]; ?></td>
     <td><?= $row["nm_prodi"]; ?></td>
     <td class="text-center">
      <form method="post" action="">
      <button type="submit" class="btn btn-success btn-sm" name="cmdEDIT">Edit</button>
      </form>
     </td>
     <td class="text-center">
      <form method="post" action="">
      <button type="submit" class="btn btn-danger btn-sm" name="cmdDELETE"
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