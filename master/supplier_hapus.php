<?php
include "../lib/koneksi.php";
$id=$_GET["id"];
mysql_query("DELETE FROM supplier WHERE kode_supplier='$id'");
echo"<script>location.href='../home.php?page=supplier'</script>";
?>
