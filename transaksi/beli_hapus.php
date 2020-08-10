<?php
include "../lib/koneksi.php";
$id=$_GET["id"];
$kode=$_GET["id2"];
$jumlah=$_GET['id3'];
mysql_query("DELETE FROM beli_detail WHERE kode_beli='$id' and kode_bahan='$kode'");
echo"<script>location.href='../home.php?page=tbeli&supplier=$_GET[id4]'</script>";
?>
