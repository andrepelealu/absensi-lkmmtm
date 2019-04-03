<?php
require_once "conn.php";

if(isset($_POST['submit'])){
  session_start();
  $nama = mysqli_real_escape_string($conn,$_POST["nama"]);
  $nim = mysqli_real_escape_string($conn,$_POST["nim"]);
  $kementrian = mysqli_real_escape_string($conn,$_POST["kementrian"]);


  $nama = strtoupper($nama);
  $nim = strtoupper($nim);
  $kementrian = strtoupper($kementrian);
  $sql = "INSERT INTO data (nama, nim ,kementrian )
  VALUES ('$nama','$nim','$kementrian')";
  $query = mysqli_query($conn,$sql);

  if($query){
    $_SESSION["nama"] = $nama;
    $_SESSION["nim"] = $nim;
    $_SESSION["kementrian"] = $kementrian;
    $_SESSION["start"] = true;

    header('Location: ../sukses');
    // echo "<script>alert('Transaksi Sukses.Data Sudah ada dalam Laporan');window.location='sukses.php'</script>";

  }else{
    echo "<script>alert('Pendaftaran Gagal , Silahkan Hubungi Panitia');window.location=''</script>";
  }
}else{
  echo "<script>alert('No Direct Access');window.location='index.php'</script>";

}

///header("Location: sukses.php");

 ?>
