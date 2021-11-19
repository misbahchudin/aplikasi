<?php require("../atas.php"); ?>

<h3>Daftar Mahasiswa</h3>
  <a href="tambah.php" class="btn btn-primary btn-sm mb-3">Add Data</a>
  <table class="table table-striped table-secondary table-sm">
   <thead>
    <tr>
     <th>NO</th>
     <th>nim</th>
     <th>nm_mhs</th>
     <th>prodi</th>
     <th>sex</th>
     <th>tgl_lhr</th>
     <th>dosen_wali</th>
     <th>alamat</th>
     <th>kota</th>
     <th class="text-center">EDIT</th>
     <th class="text-center">DELETE</th>
    </tr>
   </thead>
   <tbody>
   <?php
   $nomor   = 1;
   $queri   = "SELECT * FROM mahasiswa ORDER BY nim";
   $sambung = mysqli_query($theLink, $queri);
   while ($row = mysqli_fetch_array($sambung))
   {
   ?>
    <tr>
     <td><?= $nomor; ?></td>
     <td><?= $row["nim"]; ?></td>
     <td><?= $row["nm_mhs"]; ?></td>
     <td><?= $row["prodi"]; ?></td>
     <td><?= $row["sex"]; ?></td>
     <td><?= $row["tgl_lhr"]; ?></td>
     <td><?= $row["dosen_wali"]; ?></td>
     <td><?= $row["alamat"]; ?></td>
     <td><?= $row["kota"]; ?></td>
     <td class="text-center">
      <form action="ubah.php" method="post">
      <input type="hidden" name="tempKODE" id="tempKODE" value="<?= $row["nim"]; ?>">
      <button type="submit" class="btn btn-success btn-sm" name="cmdEDIT">Edit</button>
      </form>
     </td>
     <td class="text-center">
      <form action="hapus.php" method="post">
      <input type="hidden" name="tempKODE" id="tempKODE" value="<?= $row["nim"]; ?>">
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