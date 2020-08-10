<!DOCTYPE html>
<html lang="en">
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 35px;
  background-color:#0f0f0f;
  color: white;
  text-align: center;
}
</style>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>h e r e . c a f f e</title>
    <link href="liblogin/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="liblogin/style.css">
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid" style="background-color:#262626;">
        <div class="navbar-header">
          <img class="navbar-brand" src="" alt="">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

          <a class="brand" href="#" style="color:#FFFFFF;"><font style="font-family:baskerville;" size="6"</font></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
      </div>
      </div>
    </nav>
  <!-- Akhir Navbar -->
	
  <!-- login -->
  <section class="login">
  <div class="page-header">
<h1 class="text-center"><img src="images/here1.png" width="700" height="630"  style="margin-top:-270px; margin-left:490px; margin-bottom:-730px;"></h1>
  </div>
  <div class="container">
  <div class="row">
  <div class="col-sm-4 col-sm-offset--5">
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <i class="" aria-hidden="true"></i>
      <label for="username" class="control-label"><font style="font-family:baskerville;" size="4">Username :</font></label>
        <input type="text" class="form-control" name="username" id="username" placeholder="">
    </div>
    <div class="form-group">
      <i class="" aria-hidden="true"></i>
      <label for="password" class="control-label"><font style="font-family:baskerville;" size="4">Password :</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="">
    </div>
    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-success" style="float: center;">Login</button> &nbsp;
	  <button type="reset" name="reset" class="btn btn-danger" style="float: center;">Reset</button>
    </div>
  </form>
  </div>
  </div>
  </div>
  </section>
<!-- akhir login -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="liblogin/js/bootstrap.min.js"></script>
  </body>
</html>
<div class="footer">
  <p><font style="font-family:baskerville;" size="2">C o p y r i g h t &nbsp; &copy; &nbsp; 2 0 2 0</font></p>
</div>
<?php
if (isset($_POST['submit'])){
include "lib/koneksi.php";
$username=$_POST['username'];
$password=$_POST['password'];
$perintah="select * from user where username='$username' and password='$password'";

$hasil=mysql_query($perintah);
$baris=mysql_fetch_array($hasil);

if ($baris['username']==$username && $baris['password']==$password &&!empty($username)&&!empty($password))
{
	session_start();
	$_SESSION['user']=$baris['username'];
	$_SESSION['nama']=$baris['nama_user'];
	$_SESSION['akses']=$baris['hak_akses'];
	echo"<script>alert('LOGIN BERHASIL')</script>";
	echo"<script>location.href='home.php'</script>";}
else
{
	echo"<script>alert('Username dan Password Anda salah')</script>";
	echo"<script>location.href='index.php'</script>";
}
}
?>
