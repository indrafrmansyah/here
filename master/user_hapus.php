<?php
include "../lib/koneksi.php";
$id=$_GET["id"];
mysql_query("DELETE FROM user WHERE username='$id'");
echo"<script>location.href='../home.php?page=user'</script>";
?>
