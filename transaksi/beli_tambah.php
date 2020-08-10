<?php
$sql=mysql_query("select count(kode_beli) as kode from beli");//hitung jumlah baris
$data=mysql_fetch_array($sql);
$data=$data[kode]+1;//ditambah
$char="P".date('dm');
$kodebaru= $char .sprintf("%03s", $data);
$supplier=$_GET['supplier'];
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
                                <div class="muted pull-left"><b><h4>Form Pemesanan Bahan Baku</h4></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span6">
                                     <form class="form-horizontal" method="post" action="">
                                      <fieldset>
									  
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Kode beli</label>
                                          <div class="controls">
                                            <input name="kode" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $kodebaru;?>" readonly="true">
                                          </div>
                                        </div>
							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Tanggal</label>
                                          <div class="controls">
                                            <input name="tanggal" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo date("Y-m-d");?>" readonly="true">
                                          </div>
                                        </div>  
										
										<div class="control-group">
										<label class="control-label">Pilih Supplier</label>
										<div class="controls">
											<select name="supplier" class="chzn-select">
											<?php $q = mysql_query("select * from supplier");
												while ($row = mysql_fetch_array($q))
												{echo "<option value='$row[kode_supplier]'"; if($supplier==$row['kode_supplier']) echo "selected='true'"; echo">$row[nama_supplier]</option>";}?>
										  </select>
										</div>
									   </div>                              								
										
                                  									
										<div class="control-group">
										<label class="control-label">Pilih Bahan Baku</label>
										<div class="controls">
											<select name="barang" class="chzn-select" style="width: 370px;">
											<?php $q = mysql_query("select * from bahan where stok < 3000");
												while ($row = mysql_fetch_array($q))
												{echo "<option value='$row[kode_bahan]'>$row[nama_bahan] | Stok :  $row[stok] $row[satuan]</option>";}?>
										  </select>
										</div>
									   </div>
							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Jumlah beli</label>
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
                                    <h4>DATA PEMBELIAN BAHAN BAKU :</h4>
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Kode Bahan Baku</th>
												<th>Nama Bahan Baku</th>
												<th>Jumlah</th>
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
										<?php
										  $i=1;
										   $sql=mysql_query("select beli_detail.*, bahan.* from beli_detail inner join bahan on beli_detail.kode_bahan=bahan.kode_bahan 
										   where beli_detail.kode_beli='$kodebaru'");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $row['kode_bahan']; ?></td>
                                                <td><?php echo $row['nama_bahan']; ?></td>
                                                <td><?php echo $row['jumlah_beli']." ".$row['satuan']; ?></td>
                                                <td><a href="transaksi/beli_hapus.php?id=<?php echo $row['kode_beli'];?>&id2=<?php echo $row['kode_bahan']?>&id3=<?php echo $row['jumlah_beli']?>
												&id4=<?php echo $supplier; ?>" 
												onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini')">
												<div align="center"><i class="icon-remove"></div></a></td>
											</tr>
											<?php $i++; $total=$total+$row['subtotal_beli'];} ?>
										</tbody>
									</table>
                                </div>
                            </div>
										
										<div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<input name="simpan" type="submit" class="btn btn-success" id="pilih" value="Simpan Pemesanan Bahan Baku" />
										<input name="batal" type="submit" class="btn btn-danger" id="pilih" value="Batalkan Pemesanan Bahan Baku" />
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
$harga=0;
$query="INSERT INTO beli_detail values ('$kode','$barang','$jumlah','$harga')";
$result=mysql_query($query) or mysql_error($query);
if($result) 
{echo"<script>location.href='home.php?page=tbeli&supplier=$_POST[supplier]'</script>";}
}
?>

<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$tanggal=$_POST['tanggal'];
$supplier=$_POST['supplier'];
$query="insert into beli values ('$kode','$tanggal','$supplier','$total','Pesan')";
$result=mysql_query($query) or mysql_error($query);
	if($result) 
	{
	echo "<script>alert('Data Pemesanan Bahan Baku Tersimpan')</script>";
	echo"<script>location.href='home.php?page=beli'</script>";}}
?>


<?php 
if (isset($_POST['batal'])){
$kode=$_POST['kode'];
$query="delete from beli where kode_beli='$kode'";
$query2="delete from beli_detail where kode_beli='$kode'";
$result=mysql_query($query) or mysql_error($query);
$result2=mysql_query($query2) or mysql_error($query2);
	if($result) 
	{echo "<script>alert('Input Data beli Dibatalkan')</script>";
	echo"<script>location.href='home.php?page=beli'</script>";}}
?>