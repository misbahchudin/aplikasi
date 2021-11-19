<?php 
    require("../atas.php"); 

    $tempKODE = $_POST["tempKODE"];
    $query = "DELETE FROM kota WHERE kd_kota = '$tempKODE'";
    $sambung = mysqli_query($theLink, $query);

    if (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) == 1451 )
    {
      echo '<script type="text/javascript">alert("Data tidak bisa dihapus karena masih terhubung dengan data yang lain");</script>';
      echo '<script>window.location="tampil.php"</script>';
    }elseif (mysqli_errno($theLink) > 0 && mysqli_errno($theLink) <> 1451 )
    {
      echo '<script type="text/javascript">alert("Terjadi kesalahan, proses ubah data tidak berhasil");</script>';
      echo '<script>window.location="tampil.php"</script>';
    }
    else
    {
      echo '<script>window.location="tampil.php"</script>';
      echo '<script>window.location="tampil.php"</script>';
    }  
?>
