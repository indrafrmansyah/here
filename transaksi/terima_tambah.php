<?php
$sql=mysql_query("select beli.*, supplier.* from beli inner join supplier on beli.kode_supplier=supplier.kode_supplier where kode_beli='$_GET[id]'");//hitung jumlah baris
$data=mysql_fetch_array($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form class="form-horizontal" method="post" action="">
<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b><h4>Form Penerimaan Bahan Baku</h4></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span6">
                                     
                                      <fieldset>
									  
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Kode beli</label>
                                          <div class="controls">
                                            <input name="kode" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $_GET['id'];?>" readonly="true">
                                          </div>
                                        </div>
							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Tanggal Penerimaan</label>
                                          <div class="controls">
                                            <input name="tanggal" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo date("Y-m-d");?>" readonly="true">
                                          </div>
                                        </div>  
										
										<div class="control-group">
										<label class="control-label"> Supplier</label>
										<div class="controls">
										<input name="supp" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $data['nama_supplier'];?>" readonly="true">
										</div>
									   </div>                              								
										
                                        </fieldset>
										</div>
                                    
							</div>
						
						
									<div class="block-content collapse in">
                                <div class="span12">
                                    <h4>DATA PENERIMAAN BAHAN BAKU :</h4>
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Kode Bahan Baku</th>
												<th>Nama Bahan Baku</th>
												<th>Jumlah Pesan</th>
												<th>Jumlah Terima</th>
												<th>Harga</th>
											</tr>
										</thead>
										<tbody>
										<?php
										  $i=1;
										   $sql=mysql_query("select beli_detail.*, bahan.* from beli_detail inner join bahan on beli_detail.kode_bahan=bahan.kode_bahan 
										   where beli_detail.kode_beli='$_GET[id]'");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $row['kode_bahan']; ?><input name="barang[]" type="hidden" value="<?php echo $row['kode_bahan']; ?>"></td>
                                                <td><?php echo $row['nama_bahan']; ?></td>
                                                <td><?php echo $row['jumlah_beli']." ".$row['satuan']; ?></td>
												<td>
												<input name="jumlah[]" type="text" value="<?php echo $row['jumlah_beli'] ?>" />
												<input type="text" class="input-xsmall focused" value="<?php
												
												 if($row['satuan']=="Gram"){
													 $hasil=$row['jumlah_beli']/1000;
													 echo "$hasil Bungkus";
												 }else if($row['satuan']=="ml"){
													 $hasil=$row['jumlah_beli']/1000;
													 echo "$hasil Botol";
												 }else if($konversi=="kelvin"){
													 $hasil=$suhu+273;
													 echo "Hasil Konversi ke Kelvin: $hasil";
												 }else{
													 echo "Zonk";
												 }
												?> "></td>
												<td><input name="harga[]" type="text" class="input-xsmall focused" required="true"></td>
											</tr>
											<?php $i++;} ?>
										</tbody>
									</table>
                                </div>
                            </div>
										
										<div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<input name="simpan" type="submit" class="btn btn-success" id="pilih" value="Simpan Penerimaan Bahan Baku" />
										<a href="?page=terima"><input name="batal" type="button" class="btn btn-danger" id="pilih" value="Kembali" /></a>
                                        </div>
									
                                </div>
                            </div>
                        </div>
</body>
</html>
</form>
<?php 
if (isset($_POST['simpan'])){
$kode=$_POST['kode'];
$barang=$_POST['barang'];
$jumlah=$_POST['jumlah'];
$harga=$_POST['harga'];
for($i=0;$i<count($barang);$i++)
{
$subtotal=$harga[$i];
mysql_query("update beli_detail set jumlah_beli='$jumlah[$i]', subtotal_beli='$subtotal' where kode_beli='$kode' and kode_bahan='$barang[$i]'");
mysql_query("update bahan set stok=stok+$jumlah[$i] where kode_bahan='$barang[$i]'");
$total=$total+$subtotal;
}
mysql_query("update beli set total_beli='$total', status_beli='Selesai' where kode_beli='$kode'");
echo "<script>alert('Data Penerimaan Bahan Baku Tersimpan')</script>";
echo"<script>location.href='home.php?page=beli'</script>";
}
?>