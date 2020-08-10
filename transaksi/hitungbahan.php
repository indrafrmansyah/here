<?php
error_reporting(0);
include "../lib/koneksi.php";
$id=$_GET['kode_menu'];
$kodebahan=$_GET['id2'];
$jml=$_GET['jml'];
for($i=0; $i<count($bahan); $i++)
{
mysql_query("update bahan set stok=stok-'$jml[$i]' where kode_bahan='$kodebahan[$i]'");
$result=mysql_query($query) or mysql_error($query);
if($result)
{echo"<script>location.href='../home.php?page=formjual&id=$id'</script>";}
else	
{echo"<script>location.href='../home.php?page=formjual&id=$id'</script>";}
}
?> 

