<?php 
error_reporting(0);
ob_start();
$id=$_GET['id'];
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
<body>
<div id="kojo">
<div class="header"></div>
<h2 align="center">HERE CAFFE CIMAHI<br>FORM PEMESANAN BARANG</h2>
<?php
include "../lib/koneksi.php";
$result = mysql_query("select beli.*, supplier.* from beli inner join supplier on beli.kode_supplier=supplier.kode_supplier where beli.kode_beli='$id'");
if($data=mysql_fetch_array($result)){
$kode=$data['kode_beli'];
$tgl=$data['tanggal_beli'];
$nama=$data['nama_supplier'];
} ?>
<table width="700" border="0">
  <tr>
    <td width="140"><strong>Tanggal</strong></td>
    <td width="22" align="center"><strong>:</strong></td>
    <td width="524"><strong><?php echo date("d M Y", strtotime($tgl)); ?></strong></td>
  </tr>
  <tr>
    <td width="140"><strong>Kode PO</strong></td>
    <td width="22" align="center"><strong>:</strong></td>
    <td><strong><?php echo $kode; ?></strong></td>
  </tr>
  <tr>
    <td><strong>Nama Supplier</strong></td>
    <td width="22" align="center"><strong>:</strong></td>
    <td><strong><?php echo $nama; ?></strong></td>
  </tr>
</table>
<br />
<table border="1">
<tr>
	<th width="30" align='center'>No</th>
    <th width="550" align="center">Nama Barang </th>
  <th width="100" align='center'>QTY </th>
  
</tr>
<?php
$jum=0;
$subtotal=0;
$total=0;
$result = mysql_query("select beli_detail.*, bahan.* from beli_detail inner join bahan on beli_detail.kode_bahan=bahan.kode_bahan where beli_detail.kode_beli='$id'");
$i=1;
while ($data=mysql_fetch_array($result)){
echo"
<tr>
<td width='30' align='center'>$i</td>
<td width='550'>$data[nama_bahan]</td>
<td width='100' align='center'>$data[jumlah_beli] $data[satuan]</td>
</tr>";
$i++;}?>
</table>
</div>
<br /><br />
 <table width="700" border="0">
   <tr>
     <td width="207"><div align="center"><strong>Kasir : </strong><br />
             <br />
       <br />
       _____________________</div></td>
     <td width="239"><div align="center"><br />
             <br />
       <br />
     </div></td>
     <td width="240"><div align="center"><strong>Owner : </strong><br />
           <br />
       <br />
       _____________________</div></td>
   </tr>
 </table>
</body>
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
