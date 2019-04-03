<?php
   include('session.php');
   include ('../conn.php');
?>
<html>

   <head>
      <title>Dashboard Panitia </title>
      <title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
<link rel="icon" type="../table/image/png" href="table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../table/vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="../table/css/util.css">
<link rel="stylesheet" type="text/css" href="../table/css/main.css">
   </head>

   <body>
      <h3>Welcome <?php echo $login_session; ?></h3>

      <a href = "sudahbayar.php" class="btn btn-primary">Peserta Sudah Bayar</a>
      <a href = "logout.php" class="btn btn-danger">Sign Out</a>
      <form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari" placeholder ="Masukan Nama atau NIM" border='1'>
	<input type="submit" value="Cari" class="btn btn-info">
</form>
<h2> Peserta Pendaftar LKMM-TM</h2>
<?php
if(isset($_POST['konf'])){
  // echo "<script>alert('Berhasil disimpan')</script>";
  $id = $_POST['konf'];
  $query1 = "SELECT * FROM formbem WHERE id=$id";
  $ekseq1 = mysqli_query($conn,$query1);
  $ambil1 = mysqli_fetch_array($ekseq1);
  $nama = $ambil1['nama'];
  $nim = $ambil1['nim'];
  $fakultas = $ambil1['fakultas'];
  $prodi = $ambil1['prodi'];
  $email = $ambil1['email'];
  $no_hp = $ambil1['no_hp'];
  $cek = mysqli_query($conn,"select nim from sudahbayar where nim = '$nim'");
  $count = mysqli_num_rows($cek);
  if($count == 1) {
    echo "<script>alert('Peserta Sudah Bayar')</script>";
  }else{
    $query = "INSERT INTO sudahbayar (nama,nim,fakultas,prodi,email,no_hp) VALUES ('$nama','$nim','$fakultas','$prodi','$email','$no_hp') ";
    $query = mysqli_query($conn,$query);
    if($query){
      echo "<script>alert('Berhasil disimpan')</script>";

    }else{
      echo "<script>alert('Gagal')</script>";

    }
  }


}
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
  $cari = strtoupper($cari);
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<br><a href="index.php">tampilkan semua</a>
<div class="limiter">
  <div class="">
    <div class="wrap-table100">
      <div class="table100">
<table>
  <thead>
  <tr class="table100-head">
    <th class="column1">No</th>
    <th class="column2">Nama</th>
    <th class="column3">NIM</th>
    <th class="column4">Fakultas</th>
    <th class="column5">Prodi</th>
    <th class="column6">Email</th>
    <th class="column7">No Hp</th>
    <th class="column8">Konfirmasi</th>
  </tr>
</thead>
	<?php


	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];

		$data = mysqli_query($conn,"select * from formbem where nama like '%".$cari."%' OR nim like '%".$cari."%' ");
	}else{
    $halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $result = mysqli_query($conn,"SELECT * FROM formbem");
    $cek = mysqli_fetch_array($result);
    $cek = $cek['nim'];
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);
		$data = mysqli_query($conn,"select * from formbem  LIMIT $mulai, $halaman ");
	}
	$no =$mulai+1;
	while($d = mysqli_fetch_array($data)){


  ?>

<tbody>
	<tr>
		<td class="column1"><?php echo $no++; ?></td>
		<td class="column2"><?php echo $d['nama']; ?></td>
    <td class="column3"><?php echo $d['nim']; ?></td>
    <td class="column4"><?php echo $d['fakultas']; ?></td>
    <td class="column5"><?php echo $d['prodi']; ?></td>
    <td class="column6"><?php echo $d['email']; ?></td>
    <td class="column7"><?php echo $d['no_hp']; ?></td>
    <form action="" method="post">
    <td class="column8"><button class = "btn btn-warning" input type="submit" name="konf" value="<?php echo $d['id']?>">Konfirmasi</button> </td>
  </form>
	</tr>
	<?php } ?>
  </tbody>
</table>
<div class="">
  Hal :
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

  <?php } ?>

          </div>
          </div>
          </div>
          </div>
   </body>
   <!--===============================================================================================-->
   	<script src="../table/vendor/jquery/jquery-3.2.1.min.js"></script>
   <!--===============================================================================================-->
   	<script src="../table/vendor/bootstrap/js/popper.js"></script>
   	<script src="../table/vendor/bootstrap/js/bootstrap.min.js"></script>
   <!--===============================================================================================-->
   	<script src="../table/vendor/select2/select2.min.js"></script>
   <!--===============================================================================================-->
   	<script src="../table/js/main.js"></script>
</html>
