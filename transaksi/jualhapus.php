<?php
error_reporting(0);
include "../lib/koneksi.php";
$id=$_GET["id"];
$kode=$_GET["id2"];
$jumlah=$_GET["id3"];
mysql_query("DELETE FROM jual_detail WHERE kode_jual='$id' and kode_menu='$kode'");
$result=mysql_query($query) or mysql_error($query);
if(strpos($nama, 'Cetak')!==false)
{}
else{mysql_query("update menu set stok=stok+$jumlah where kode_menu='$kode'");}
if($result)
{echo"<script>location.href='../home.php?page=formjual&id=$id'</script>";}
else	
{echo"<script>location.href='../home.php?page=formjual&id=$id'</script>";}
?> 
