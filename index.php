<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"> </script>
<link rel="stylesheet" type="text/css" href="style.css">

<head>
   <title>LOGIN</title>
</head>

<body>
   <h2>
      <center>Form Login</center>
   </h2>

   <div class="kotak_login">
      <p class="tulisan_login">Silahkan login</p>

      <form method="POST" action="ceklogin.php">
         <label>Username</label>
         <input type="text" name="username" class="form_login" placeholder="Username ..">

         <label>Password</label>
         <input type="password" name="password" class="form_login" placeholder="Password ..">

         <input type="submit" class="tombol_login" value="LOGIN">
         <br />
         <p> Belum punya akun?
            <a href="register.php">Daftar di sini</a>
         </p>
      </form>

   </div>

   <div class="kotak_pesan">
      <!-- cek pesan notifikasi -->
      <?php
      if (isset($_GET['pesan'])) {
         if ($_GET['pesan'] == "gagal") {
            echo "Login gagal! username dan password salah!";
         } else if ($_GET['pesan'] == "logout") {
            echo "Anda telah berhasil logout";
         } else if ($_GET['pesan'] == "belum_login") {
            echo "Anda harus login untuk mengakses halaman admin";
         }
      }
      ?>
   </div>


</body>

</html>