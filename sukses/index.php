<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Pendaftaran Panitia LKMM-TM BEM-KM Udinus</title>

    <!-- Icons font CSS-->
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/main.css" rel="stylesheet" media="all">

    <title></title>
  </head>
  <body>
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680">
              <div class="card card-4">
                  <div class="card-body">
                    <center>
                    <?php session_start();
                    if (isset($_SESSION["start"])){
                      echo "<h1>Pendaftaran Berhasil !</h1>";
                      ?>
                        <h2>Hai <br>  <?php echo $_SESSION["nama"] ?> </h2>;
                       <h3><?php echo $_SESSION["nim"]?> </h3><br>;
                       <h3><?php echo 'Kementrian '.$_SESSION["kementrian"]?> </h3><br>;
                       <h4>Semangat Proker nya , jangan lupa senyum :)</h4>
                       <a href="/">Back to Home</a>
                    </center>

                    <?php session_destroy(); }else{
                      echo '<h1>apa ?!</h1><br>
                      <a href="/">Back to Home</a>';

                    }?>







                  </div>
                  </div>

            </div>
          </div>
  </body>
</html>
