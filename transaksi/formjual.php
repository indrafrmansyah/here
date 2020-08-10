<?php
$sql=mysql_query("select count(kode_jual) as kode from jual");//hitung jumlah baris
$data=mysql_fetch_array($sql);
$data=$data[kode]+1;//ditambah
$char="PJ".date('ym');
$kodebaru= $char .sprintf("%03s", $data);
$stoktersisa=array();
$stokterpakai=array();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b><h4>Form Penjualan</h4></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span6">
                                     <form class="form-horizontal" method="post" action="">
                                      <fieldset style="overflow: visible; height: 290px;">
									  
										<div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Kode Penjualan</b></label>
                                          <div class="controls">
                                            <input name="kode" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $kodebaru;?>" readonly="true">
                                          </div>
                                        </div>
							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Tanggal</b></label>
                                          <div class="controls">
                                            <input name="tanggal" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo date("Y-m-d");?>" readonly="true">
                                          </div>
                                        </div>       
										
										<div class="control-group" style="">
										<label class="control-label"><b>Pilih Menu</b></label>
										<div class="controls">
											<select name="barang" class="chzn-select" style="width:100%; height: 100%; overflow: visible;">
											<?php $q = mysql_query("select * from menu");
												while ($row = mysql_fetch_array($q))
												{echo "<option value='$row[kode_menu]'>$row[nama_menu] | stok $row[stok] | Rp.".number_format($row[harga_menu])."</option>";}?>
										  </select>
										</div>
									   </div>
									   
										<div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Jumlah</b></label>
                                          <div class="controls">
                                            <input name="jumlah" type="text" class="input-xsmall focused" id="focusedInput" value="0" required='true'>
                                          </div>                                          
                                        </div>
										
										
										<div class="controls" style="margin-left:180px"> 
                                        <input name="pilih" type="submit" class="btn btn-success" id="pilih" value="Tambah" />
                                        <input  type="submit" class="btn btn-danger" name="batal" id="batal" value="Batal" />
												</fieldset></div>
                                    
									
							</div>
						
									<div class="block-content collapse in">
                                <div class="span12">
                                    <h4>DATA PENJUALAN :</h4>
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Kode Menu</th>
												<th>Nama Menu</th>
												<th>Jumlah</th>
												<th>Subtotal</th>
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
										<?php
										  $i=1; $total=0;
										   $sql=mysql_query("select menu.*,jual_detail.* from jual_detail inner join menu on jual_detail.kode_menu=menu.kode_menu 
										   where jual_detail.kode_jual='$kodebaru'");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $row['kode_menu']; ?>
												<input name="kodemenu" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $row['kode_menu'];?>" readonly="true">
												<input name="jumlah[]" type="text" readonly="true" value="<?php echo $row['jumlah']; ?>"/>
												
												
												<?php
											$barang=$row['kode_menu'];
										   $sql2=mysql_query("select menu_bahan.*, bahan.* from menu_bahan inner join bahan on menu_bahan.kode_bahan=bahan.kode_bahan 
										   where menu_bahan.kode_menu='$barang'");
										   while($row1=mysql_fetch_array($sql2)){
										    
											$jumlah=$row['jumlah'];
											$stok=$row1['jml'];
											$terpakai=$stok*$jumlah;
											$tersisa = $row1['stok']-$terpakai;
											$stokterpakai[$row1['kode_bahan']] = $terpakai;
											$stoktersisa[$row1['kode_bahan']] = $tersisa;
											
											

											
										  ?>
										  <input name="kodebahan[]" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $row1['kode_bahan'];?>" readonly="true">
										  <input name="terpakai[]" type="text" readonly="true" value="<?php echo $terpakai; ?>" style="width:50px"/>
										  <input name="tersisa[]" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $tersisa;?>" readonly="true">
										
											<?php } ?>
											
											
												</td>
                                                <td><?php echo $row['nama_menu']; ?></td>
                                                <td><?php echo $row['jumlah']; ?></td>
                                                <td><?php echo number_format($row['subtotal']); ?></td>
                                                <td><a href="transaksi/jualhapus.php?id=<?php echo $row['kode_jual'];?>&id2=<?php echo $row['kode_menu']?>&id3=<?php echo $row['jumlah']?>" 
												onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini')">
												<div align="center"><i class="icon-remove"></div></a></td>
											</tr>
											<?php $i++; $total=$total+$row['subtotal']; } ?>
										</tbody>
									</table>
                               
							   </div>
                            </div>
										
										<div class="control-group" style="margin-left:20px">
                                          <label class="control-label" for="focusedInput">Nama Konsumen</label>
                                          <div class="controls">
											<input name="konsumen" type="text" class="input-xsmall focused" id="focusedInput">
                                          </div>                                          
                                        </div>
										<div class="control-group" style="margin-left:20px">
                                          <label class="control-label" for="focusedInput">Total Harga</label>
                                          <div class="controls">
                                            <input name="total" type="hidden" class="input-xsmall focused" id="focusedInput" value="<?php echo $total; ?>" readonly="true">
											<input name="total1" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo number_format($total); ?>" readonly="true">
                                          </div>                                          
                                        </div>
										<div class="control-group" style="margin-left:20px">
                                          <label class="control-label" for="focusedInput">Bayar</label>
                                          <div class="controls">
                                            <input name="bayar" type="number" class="input-xsmall focused" id="focusedInput" value="0" required="true">
                                          </div>                                          
                                        </div>

										<div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<input name="simpan" type="submit" class="btn btn-success" id="pilih" value="Simpan & Cetak Nota Penjualan" />
										<input name="batal" type="submit" class="btn btn-danger" id="pilih" value="Batalkan Penjualan" />
                                        </div>
									</form>
                                </div>
                            </div>
                        </div>
</body>
</html>
<?php 



if (isset($_POST['pilih'])){
$kode=$_POST['kode'];
$barang=$_POST['barang'];
$jumlah=$_POST['jumlah'];



$stokquery=implode("','", array_keys($stoktersisa));
$alert="";
$sqlstring="select * from bahan where kode_bahan in ('".$stokquery."')";
$sqlquery = mysql_query($sqlstring) or die("eror sql query ".mysql_error());

var_dump($stokquery);

$row=mysql_fetch_array($sqlquery);


foreach($stokterpakai as $key => $value){
	var_dump($value);
	if($stoktersisa[$key] < $value ){
		$alert=$key." habis";
	}
}
var_dump($alert);




$sql=mysql_query("select * from menu where kode_menu='$barang'");
$row=mysql_fetch_array($sql);
$subtotal=$jumlah*$row['harga_menu'];
if($jumlah>$row['stok'])
{echo "<script>alert('Porsi Menu Kurang / Habis')</script>";}
else
{
mysql_query("update menu set stok=stok-$jumlah where kode_menu='$barang'");
$query="INSERT INTO jual_detail values ('$kode','$barang','$jumlah','$subtotal')";
$result=mysql_query($query) or mysql_error($query);
if($result) 
{echo"<script>location.href='home.php?page=formjual&id=$kode'</script>";}
}
}

/*


$stokquery=implode("','", array_keys($stoktersisa));
$alert="";
$sqlstring="select * from bahan where kode_bahan in ('".$stokquery."')";
$sqlquery = mysql_query($sqlstring) or die("eror sql query ".mysql_error());

$row=mysql_fetch_array($sqlquery);

var_dump($stokterpakai);
var_dump($stoktersisa);

foreach($stokterpakai as $key => $value){
	var_dump($value);
	if($stoktersisa[$key] < $value ){
		$alert=$key." habis";
	}
}
var_dump($alert);

*/
?>

<?php 
if (isset($_POST['pilih'])){
$kode=$_POST['kode'];
$barang=$_POST['barang'];
$tersisa=$_POST['jml'];

$terpakai=$_POST['terpakai'];
$tanggalpk=$_POST['tanggalpk'];
$sql=mysql_query("select menu_bahan.*, bahan.* from menu_bahan inner join bahan on menu_bahan.kode_bahan=bahan.kode_bahan 
					where menu_bahan.kode_menu='$barang'");
$row=mysql_fetch_array($sql);
$kodebahan=$_POST['kode_bahan'];
for($i=0; $i<count($row['kode_bahan']); $i++)
{
mysql_query("insert into bahan_pakai values ('$row[kode_bahan][$i]','$tanggalpk[$i]','$terpakai[$i]')");
}

	}
?>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$tanggal=$_POST['tanggal'];
$total=$_POST['total'];
$bayar=$_POST['bayar'];
$konsumen=$_POST['konsumen'];
if($bayar<$total)
{echo "<script>alert('Jumlah Pembayaran Kurang')</script>";}
else
{
/*

$stokquery=implode("','", array_keys($stoktersisa));
$alert="";
$sql="select * from bahan where kode_menu in ($stokquery)";
var_dump($stoktersisa);
$sqlquery = mysql_query($sql) or die(mysql_error("select bahan"));
$row=mysql_fetch_array($sqlquery);

for($i=0; $i<count($row); $i++){
	if($stokterpakai[$i]<$stoktersisa[$i]){
		$alert="stok ".key($stokterpakai[$i])." habis";
	}
}

*/	
	
	foreach($stoktersisa as $key => $value){
		$queryupdate = "update bahan set stok='".$value."' where kode_bahan='".$key."'";
		mysql_query($queryupdate) or die(mysql_error());
		
	}
	foreach($stokterpakai as $key => $value){
		$insertbahanpakai="insert into bahan_pakai values ('".$key."','$tanggal','".$value."')";
		mysql_query($insertbahanpakai) or die(mysql_error());
			
	}
	
$insertdatajual="insert into jual values ('$kode','$tanggal','$total','$konsumen','Selesai')";
$result=mysql_query($insertdatajual) or die(mysql_error());
if($result) 
	{
	echo"<script type='text/javascript'>window.open('Laporan/nota.php?id=$kodebaru&bayar=$bayar');</script>";
	echo "<script>alert('Penjualan Tersimpan')</script>";
	echo"<script>location.href='home.php?page=datajual'</script>";
	}
}
}
?>


<?php 
if (isset($_POST['batal'])){
$kode=$_POST['kode'];
$query="delete from jual where kode_jual='$kode'";
$query2="delete from jual_detail where kode_jual='$kode'";
$result=mysql_query($query) or mysql_error($query);
$result2=mysql_query($query2) or mysql_error($query2);
	if($result) 
	{echo "<script>alert('Penjualan Dibatalkan')</script>";
	echo"<script>location.href='home.php?page=formjual'</script>";}}
?>