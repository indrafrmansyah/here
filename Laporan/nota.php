<?php 
error_reporting(0);
ob_start();
$id=$_GET['id'];
?>

<style type="text/css">
#kojo{
width:500px;
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
<table style="width: 83%; text-align: center;">
        <tr>
          <td style="width:7%" rowspan="4"><img src="here1.png" alt="Logo" width="85" height="73"></td>
          <td style="width:90%"><p style="font-size:22px;"><strong>NOTA PENJUALAN</strong></p></td>
        </tr>
        <tr>
          <td><strong></strong></td>
        </tr>
        <tr>
          <td><p style="font-size:10px;"><i>Jalan Kolonel Masturi No. 28, Kecamatan Cimahi Utara, 40511<br><br>Kota Cimahi</i></p></td>
        </tr>
        <tr>
          <td></td>
        </tr>
        <tr>
            <td colspan="2"></td>
        </tr>
    </table>
<div id="kojo">
<div class="natnam"></div>
<?php
include "../lib/koneksi.php";
$result = mysql_query("SELECT * from jual where kode_jual='$id'");
if($data=mysql_fetch_array($result)){
$no=$data['kode_jual'];
$total=$data['total_jual'];
$tgl=date('d-m-Y',strtotime($data['tanggal_jual']));
} ?>
<table width="500" border="0">
  <tr>
    <td width="250">No. Penjualan : <?php echo $no; ?></td>
    <td width="200"></td>
    </tr>
  <tr>
    <td>Tgl Penjualan : <?php echo $tgl; ?></td>
    <td></td>
    </tr>
	<tr>
    <td>Konsumen : <?php echo $data['nama_konsumen']; ?></td>
    <td></td>
    </tr>
</table>
<br />
<br />
<table border="1" align="center">
<tr>
  <th width="40" align="center">No</th>
  <th width="200" align="center">Nama Barang </th>
  <th width="100" align="center">Jumlah</th>
  <th width="100" align="center">Subtotal</th>
</tr>
<?php
$i=1;
$result = mysql_query("select menu.*,jual_detail.* from jual_detail inner join menu on jual_detail.kode_menu=menu.kode_menu where jual_detail.kode_jual='$id'");
while ($data=mysql_fetch_array($result)){
echo"
<tr>
<th width='40' align='center'>$i</th>
<td width='200' align='center'>$data[nama_menu]</td>
<td width='100' align='center'>$data[jumlah]</td>
<td width='100' align='center'>".number_format($data[subtotal])."</td>
</tr>";
$i++; }?>
<tr>
<td colspan="3" align="right">TOTAL</td>
<td align='center'><?php echo number_format($total); ?></td>
</tr>
<tr>
<td colspan="3" align="right">BAYAR</td>
<td align='center'><?php echo number_format($_GET['bayar']); ?></td>
</tr>
<tr>
<td colspan="3" align="right">KEMBALI</td>
<td align='center'><?php echo number_format($_GET['bayar']-$total); ?></td>
</tr>
</table>
</div>
<br>
<table width="500" border="0" align="center">
  <tr>
    <td width="166" height="135"><div align="center">
      <p><strong>Kasir </strong></p>
      <p>&nbsp;</p>
      <p>
      (<?php session_start(); echo $_SESSION['nama']; ?>)</p>
    </div></td>
		<td width="141"></td>
    <td width="179"><p align="center">&nbsp;</p>
    </td>
  </tr>
</table>
<br><br><br><p style="font-size:10px;"><i></i></p> 

































 <?php $content = ob_get_clean();
// conversion HTML => PDF
 require_once('html2pdf/html2pdf.class.php');
 try
 {
 $html2pdf = new HTML2PDF('P','A5', 'fr', false, 'ISO-8859-15');
 $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
 $html2pdf->Output('Convert1.pdf');
 }
 catch(HTML2PDF_exception $e) { echo $e; }
 ?>
