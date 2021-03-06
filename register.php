<?php
include('koneksi.php');
session_start();

$error = '';
$validate = '';
if (isset($_POST['submit'])) {
   $username = stripslashes($_POST['username']);
   $password = stripslashes($_POST['password']);
   $repass   = stripslashes($_POST['repassword']);
   $no_telp   = $_POST['no_telp'];
   $hak_akses = $_POST['hak_akses'];
   if (!empty(trim($username)) && !empty(trim($password)) && !empty(trim($repass))) {
      if ($password == $repass) {
         if (cek_nama($name, $koneksi) == 0) {
            $pass  = $password;
            $query = "INSERT INTO guest (username, password, no_telp,hak_akses ) VALUES ('$username','$pass','$no_telp','$hak_akses')";
            $result   = mysqli_query($koneksi, $query);
            if ($result) {
               $_SESSION['username'] = $username;
               echo '<script type="text/javascript">
                     alert("Register Berhasil!");
                     window.location.href = "index.php";
                     </script>';
            } else {
               $error =  'Register User Gagal !!';
            }
         } else {
            $error =  'Username sudah terdaftar !!';
         }
      } else {
         $validate = 'Password tidak sama !!';
      }
   } else {
      $error =  'Data tidak boleh kosong !!';
   }
}
function cek_nama($username, $koneksi)
{
   $nama = mysqli_real_escape_string($koneksi, $username);
   $query = "SELECT * FROM guest WHERE username = '$nama'";
   if ($result = mysqli_query($koneksi, $query)) return mysqli_num_rows($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<head>
   <!-- meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

   <!-- costum css -->
   <link rel="stylesheet" href="style.css">
</head>

<body>
   <section class="container-fluid mb-4">
      <section class="row justify-content-center">
         <section class="col-12 col-sm-6 col-md-4">
            <form class="form-container" action="register.php" method="POST">
               <h4 class="text-center font-weight-bold"> Sign-Up </h4>
               <?php if ($error != '') { ?>
                  <div class="alert alert-danger" role="alert"><?= $error; ?></div>
               <?php } ?>
               <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" autocomplete="off">
               </div>
               <div class="form-group">
                  <label for="InputPassword">Password</label>
                  <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password">
                  <?php if ($validate != '') { ?>
                     <p class="text-danger"><?= $validate; ?></p>
                  <?php } ?>
               </div>
               <div class="form-group">
                  <label for="InputPassword">Re-Password</label>
                  <input type="password" class="form-control" id="InputRePassword" name="repassword" placeholder="Re-Password">
                  <?php if ($validate != '') { ?>
                     <p class="text-danger"><?= $validate; ?></p>
                  <?php } ?>
               </div>
               <div class="form-group">
                  <label for="username">No Telepon</label>
                  <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan no Telepon" autocomplete="off">
               </div>
               <div class="form-group">
                  <span><i class="fa fa-cog fa-fw"></i></span> <select name="hak_akses" required>
                     <option value="">Hak akses</option>
                     <option value="user">user</option>
                  </select>
               </div>
               <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
               <div class="form-footer mt-2">
                  <p> Sudah punya account? <a href="index.php">Login</a></p>
               </div>
            </form>
         </section>
      </section>
   </section>

</body>

</html>