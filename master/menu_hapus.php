<?php
include "../lib/koneksi.php";
$id=$_GET["id"];
mysql_query("DELETE FROM menu WHERE kode_menu='$id'");
echo"<script>location.href='../home.php?page=menu'</script>";
?>
