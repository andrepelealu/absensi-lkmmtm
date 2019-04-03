<?php
   include('session.php');
   include ('../conn.php');
?>
<html">

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <h2><a href = "index.php">Home</a></h2>
      <h2><a href = "sudahbayar.php">Peserta Sudah Bayar</a></h2>
      <h2><a href = "logout.php">Sign Out</a></h2>
      <form action="index.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari" placeholder ="Masukan Nama atau NIM">
	<input type="submit" value="Cari">
</form>
<h2> Peserta Pendaftar LKMM-TM</h2>
<?php
if(isset($_POST['konf'])){
  // echo "<script>alert('Berhasil disimpan')</script>";
  $id = $_POST['konf'];
  $query1 = "SELECT * FROM sudahbayar WHERE id=$id";
  $ekseq1 = mysqli_query($conn,$query1);
  $ambil1 = mysqli_fetch_array($ekseq1);
  $nama = $ambil1['nama'];
  $nim = $ambil1['nim'];
  $fakultas = $ambil1['fakultas'];
  $prodi = $ambil1['prodi'];
  $email = $ambil1['email'];
  $no_hp = $ambil1['no_hp'];

  $query = "DELETE FROM sudahbayar WHERE id=$id ";
  $query = mysqli_query($conn,$query);
  if($query){
    echo "<script>alert('Berhasil Dihapus')</script>";

  }else{
    echo "<script>alert('Gagal')</script>";

  }
}
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
  $cari = strtoupper($cari);
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<br><a href="sudahbayar.php">tampilkan semua</a>

<table border="1">
	<tr>
		<th>No</th>
		<th>Nama</th>
    <th>NIM</th>
    <th>Fakultas</th>
    <th>Prodi</th>
    <th>Email</th>
    <th>No.Hp</th>
    <th>Pengaturan</th>


	</tr>
	<?php


	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];

		$data = mysqli_query($conn,"select * from sudahbayar where nama like '%".$cari."%' OR nim like '%".$cari."%' ");
	}else{
    $halaman = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
    $result = mysqli_query($conn,"SELECT * FROM sudahbayar");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halaman);

		$data = mysqli_query($conn,"select * from sudahbayar LIMIT $mulai, $halaman");
	}
	$no =$mulai+1;
	while($d = mysqli_fetch_array($data)){


  ?>
	<tr>
		<td><?php echo $no++; ?></td>
		<td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['nim']; ?></td>
    <td><?php echo $d['fakultas']; ?></td>
    <td><?php echo $d['prodi']; ?></td>
    <td><?php echo $d['email']; ?></td>
    <td><?php echo $d['no_hp']; ?></td>
    <form action="" method="post">
    <td><button input type="submit" name="konf" value="<?php echo $d['id']?>">Hapus</button> </td>
  </form>

	</tr>
	<?php } ?>
</table>
<div class="">
  Hal :
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>

  <?php } ?>
   </body>

</html>
