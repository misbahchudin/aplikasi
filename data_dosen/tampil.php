<?php require("../atas.php"); ?>

<h3>Daftar Dosen</h3>
  <a href="tambah.php" class="btn btn-primary btn-sm mb-3">Add Data</a>
  <table class="table table-striped table-secondary table-sm">
   <thead>
    <tr>
        <th>nomor</th>
        <th>nik</th>
        <th>nm_dos</th>
        <th>sex</th>
        <th>alamat</th>
        <th>kota</th>
     <th class="text-center">EDIT</th>
     <th class="text-center">DELETE</th>
    </tr>
   </thead>
   <tbody>
   <?php
   $nomor   = 1;
   $queri   = "SELECT dosen.nik,dosen.nm_dos,dosen.sex,dosen.alamat,kota.nm_kota as kota FROM dosen INNER JOIN 	kota 	ON dosen.kota = kota.kd_kota ORDER BY nik";
   $sambung = mysqli_query($theLink, $queri);
   while ($row = mysqli_fetch_array($sambung))
   {
   ?>
    <tr>
     <td><?= $nomor; ?></td>
     <td><?= $row["nik"]; ?></td>
     <td><?= $row["nm_dos"]; ?></td>
     <td><?= $row["sex"]; ?></td>
     <td><?= $row["alamat"]; ?></td>
     <td><?= $row["kota"]; ?></td>
     <td class="text-center">
      <form action="ubah.php" method="post">
      <input type="hidden" name="tempKODE" id="tempKODE" value="<?= $row["nik"]; ?>">
      <button type="submit" class="btn btn-success btn-sm" name="cmdEDIT">Edit</button>
      </form>
     </td>
     <td class="text-center">
      <form action="hapus.php" method="post">
      <input type="hidden" name="tempKODE" id="tempKODE" value="<?= $row["nik"]; ?>">
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