<?php 
error_reporting(0);
ob_start();
$a=$_POST['a'];
$b=$_POST['b'];
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
          <td style="width:80%"><p style="font-size:22px;"><strong>LAPORAN PEMBELIAN BAHAN BAKU<br>HERE CAFFE CIMAHI<br/>PERIODE <?php echo date("d/m/Y",strtotime($a))." s/d ".date("d/m/Y",strtotime($b));?></strong></p></td>
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
<div class="natnam"></div>
</div>
<table border='1' align='center'>
<tr>
  <th width='40' align='center'>No</th>
  <th width='100' align='center'>Kode Beli</th>
  <th width='100' align='center'>Tanggal</th>
  <th width='200' align='center'>Nama Bahan</th>
  <th width='100' align='center'>Jumlah</th>
  <th width='100' align='center'>Total</th>
</tr>
<?php
$i=1;
$total=0;
include "../lib/koneksi.php";
$result = mysql_query("select bahan.*,beli_detail.*, beli.* from beli_detail inner join bahan on beli_detail.kode_bahan=bahan.kode_bahan inner join beli on beli.kode_beli=beli_detail.kode_beli
where beli.tanggal_beli>='$a' and beli.tanggal_beli<='$b'");
while ($data1=mysql_fetch_array($result)){
echo"
<tr>
<th width='40' align='center'>$i</th>
<td width='100' align='center'>$data1[kode_beli]</td>
<td width='100' align='center'>$data1[tanggal_beli]</td>
<td width='200' align='center'>$data1[nama_bahan]</td>
<td width='100' align='center'>$data1[jumlah_beli] $data1[satuan]</td>
<td width='100' align='center'>".number_format($data1[subtotal_beli])."</td>
</tr>"; $i++; $total=$total+$data1['subtotal_beli']; }?>
<tr>
<td colspan="5" align="right">TOTAL</td>
<td align="center"><?php echo number_format($total); ?></td>
</tr>
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
		<td width="216"></td>
    <td width="253"><p align="center"><strong>Owner </strong></p>
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
