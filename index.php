<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $nama = mysqli_real_escape_string($db,$_POST['nama']);
      $nim = mysqli_real_escape_string($db,$_POST['nim']);
      $nama = strtoupper($nama);
      $nim = strtoupper($nim);
      $sql = "SELECT id FROM data WHERE nama = '$nama' and nim = '$nim'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         // session_register("nama");
         $_SESSION['login_user'] = $nama;

         header("location: dashboard");
      }else {
         echo "<script>alert('GAGAL ! Kamu bukan anak bem');window.location=''</script>";
         echo $nama;
      }
   }
?>
<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Atas  :</label><input type = "text" name = "nama" class = "box" placeholder="kamu"/><br /><br />
                  <label>Bawah  :</label><input type = "text" name = "nim" class = "box" placeholder="angka univ"/><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>



            </div>

         </div>

      </div>

   </body>
</html>
