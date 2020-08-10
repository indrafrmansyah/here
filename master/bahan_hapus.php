<?php
include "../lib/koneksi.php";
$id=$_GET["id"];
mysql_query("DELETE FROM bahan WHERE kode_bahan='$id'");
echo"<script>location.href='../home.php?page=bahan'</script>";
?>
