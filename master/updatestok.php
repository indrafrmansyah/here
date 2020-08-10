<?php 
$id=$_GET['id'];
$sql=mysql_query("select * from menu where kode_menu='$id'");
while($row=mysql_fetch_array($sql))
{
$a=$row['nama_menu'];
$c=$row['harga_menu'];
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form class="form-horizontal" method="post" action="">
<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b><h4>Form Bahan Baku Produk</h4></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span6">
                                     
                                      <fieldset>
									  
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Kode Menu</label>
                                          <div class="controls">
                                            <input name="kode" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $_GET['id'];?>" readonly="true">
                                          </div>
                                        </div>
							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama Menu</label>
                                          <div class="controls">
                                            <input name="nama" type="text" class="input-xsmall focused" id="focusedInput" value="<?php echo $a;?>" readonly="true">
                                          </div>
                                        </div>      
							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Jumlah Update Stok</label>
                                          <div class="controls">
                                            <input name="stok" type="number" value="<?php echo $_POST['stok']; ?>" class="input-xsmall focused" id="focusedInput" value="0" required='true'>
                                          </div>                                          
                                        </div>
                                     									
										<div class="controls" style="margin-left:180px"> 
                                        <input name="pilih" type="submit" class="btn btn-success" id="pilih" value="Hitung Bahan" />
                                        </fieldset></div>
                                    
							</div>
						
						
									<div class="block-content collapse in">
                                <div class="span12">
                                    <h4>DATA BAHAN BAKU PEMBUATAN KOPI :</h4>
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Kode Bahan Baku</th>
												<th>Nama Bahan Baku</th>
												<th>Jumlah</th>
												<th>Stok</th>
												<th>Terpakai</th>
											</tr>
										</thead>
										<tbody>
										<?php
										   $sql=mysql_query("select menu_bahan.*, bahan.* from menu_bahan inner join bahan on menu_bahan.kode_bahan=bahan.kode_bahan 
										   where menu_bahan.kode_menu='$id'");
										   while($row=mysql_fetch_array($sql)){
										    $stokbahan=$row['stok'];
											$pemakaian=$row['jml'];
											$stok=$_POST['stok'];
											$terpakai=$stok*$pemakaian;
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $row['kode_bahan']; ?></td>
                                                <td><?php echo $row['nama_bahan']; ?></td>
                                                <td><?php echo $row['jml']." ".$row['satuan']; ?></td>
												<td><?php echo $row['stok']." ".$row['satuan']; ?></td>
												<td>
												<input name="bahan[]" type="hidden" readonly="true" value="<?php echo $row['kode_bahan']; ?>"/>
												<input name="jumlah[]" type="text" readonly="true" value="<?php echo $terpakai; ?>" style="width:50px"/> <?php echo $row['satuan']; ?>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
                                </div>
                            </div>
										
										<div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<input name="simpan" type="submit" value="Update Stok" class="btn btn-success"/>
										<a href="?page=menu"><input name="simpan" type="button" class="btn btn-danger" id="pilih" value="Kembali" /></a>
                                        </div>
									
                                </div>
                            </div>
                        </div>
						</form>
</body>
</html>
<?php 
if (isset($_POST['simpan'])){
$kodemenu=$_GET['id'];
$stok=$_POST['stok'];
$bahan=$_POST['bahan'];
$jumlah=$_POST['jml'];
for($i=0; $i<count($bahan); $i++)
{
mysql_query("update bahan set stok=stok-'$jumlah[$i]' where kode_bahan='$bahan[$i]'");
}
$query="update menu set stok=stok+$stok where kode_menu='$kodemenu'";
$result=mysql_query($query) or mysql_error($query);
	if($result) 
	{echo "<script>alert('Data Stok Terupdate')</script>";
	echo"<script>location.href='?page=menu'</script>";}
	else
	{echo "<script>alert('Gagal Data Terupdate')</script>";
	echo"<script>location.href='?page=menu'</script>";}}
?>