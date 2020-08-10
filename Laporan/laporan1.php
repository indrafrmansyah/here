<?php 
error_reporting(0);
ob_start();
?>

<style type="text/css">
#kojo{
width:700px;
margin-left:10px;
margin-top:10px;
}
.header{
padding-bottom:10px;
}
.headerkiri{float:left; width:100px;}
.headerkanan{float:left;}
.natnam{
border-bottom:#000000 5.0px double;
}
</style>
<div id="kojo">
<div class="header">
<table style="width: 83%; text-align: center;">
        <tr>
          <td style="width:7%" rowspan="4"><img src="here1.png" alt="Logo" width="145" height="153"></td>
          <td style="width:80%"><p style="font-size:22px;"><strong>HERE CAFFE CIMAHI<br>LAPORAN STOK BAHAN BAKU <br/>BULAN <?php echo strtoupper(date("M Y"));?></strong></p></td>
        </tr>
        
        <tr>
          <td><p style="font-size:10px;"><i>Jalan Kolonel Masturi No. 28, Kecamatan Cimahi Utara, Kota Cimahi 40511</i></p></td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>
<div align="center"></div>
<div class="natnam"></div>
</div>
<table border="1">
<tr>
<td><div align="center"><b>No</b></div></td>
<td><div align="center"><b>Kode Bahan Baku</b></div></td>
<td><div align="center"><b>Nama Bahan Baku</b></div></td>
<td><div align="center"><b>Stok</b></div></td>
</tr>
<?php
$i=1;
include "../lib/koneksi.php";
$result1 = mysql_query("select menu.*,jual_detail.*, SUM(jumlah) jumlah from jual_detail inner join menu on jual_detail.kode_menu=menu.kode_menu GROUP BY nama_menu ORDER BY jumlah DESC LIMIT 5");
while($data1=mysql_fetch_array($result1)){
echo"
<tr>
<th width='50' align='center'>$i</th>
<td width='120' align='center'>$data1[kode_menu]</td>
<td width='120' align='center'>$data1[nama_menu]</td>
<td width='150' align='center'>$data1[jumlah]</td>
</tr>"; $i++; }?>
</table>
</div>
<br>
<table width="700" border="0" align="center">
  <tr>
  <td width="217" height="135"><div align="center">
      <p><strong>Admin</strong></p>
      <p>&nbsp;</p>
      <p>
      (<?php $q = mysql_query("SELECT nama_user FROM user WHERE hak_akses='Admin' ");
												while ($row = mysql_fetch_array($q))
												{echo "$row[nama_user]";}?>)</p>
    </div></td>
		<td width="141"></td>
    <td width="179"><p align="center"><strong>Owner </strong></p>
      <p align="center">&nbsp;</p>
      <p align="center">
    (<?php session_start(); echo $_SESSION['nama']; ?>)</p></td>
  </tr>
</table>































 <?php $content = ob_get_clean();
// conversion HTML => PDF
 require_once('html2pdf/html2pdf.class.php');
 try
 {
 $html2pdf = new HTML2PDF('P','A4', 'fr', false, 'ISO-8859-15');
 $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
 $html2pdf->Output('Convert1.pdf');
 }
 catch(HTML2PDF_exception $e) { echo $e; }
 ?>
