<?php 
$id=$_GET['id'];
$sql=mysql_query("select * from menu where kode_menu='$id'");
while($row=mysql_fetch_array($sql))
{
$a=$row['nama_menu'];
$c=$row['harga_menu'];
}
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
                                <div class="muted pull-left"><b><h4>Form Bahan Baku Produk</h4></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span6">
                                     <form class="form-horizontal" method="post" action="">
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
										<label class="control-label">Pilih Bahan digunakan</label>
										<div class="controls">
											<select name="barang" class="chzn-select">
											<?php $q = mysql_query("select * from bahan");
												while ($row = mysql_fetch_array($q))
												{echo "<option value='$row[kode_bahan]'>$row[nama_bahan]</option>";}?>
										  </select>
										</div>
									   </div>
							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Jumlah</label>
                                          <div class="controls">
                                            <input name="jumlah" type="text" class="input-xsmall focused" id="focusedInput" value="0" required='true'>
                                          </div>                                          
                                        </div>
                                     									
										<div class="controls" style="margin-left:180px"> 
                                        <input name="pilih" type="submit" class="btn btn-success" id="pilih" value="Tambah" />
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
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
										<?php
										  $i=1;
										   $sql=mysql_query("select menu_bahan.*, bahan.* from menu_bahan inner join bahan on menu_bahan.kode_bahan=bahan.kode_bahan 
										   where menu_bahan.kode_menu='$id'");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $row['kode_bahan']; ?></td>
                                                <td><?php echo $row['nama_bahan']; ?></td>
                                                <td><?php echo $row['jml']." ".$row['satuan']; ?></td>
                                                <td><a href="?page=bmenu&id=<?php echo $row['kode_menu'];?>&id2=<?php echo $row['kode_bahan']?>&id3=<?php echo $row['jumlah']?>
												&fungsi=hapus" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini')">
												<div align="center"><i class="icon-remove"></div></a></td>
											</tr>
											<?php $i++; } ?>
										</tbody>
									</table>
                                </div>
                            </div>
										
										<div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<a href="?page=menu"><input name="simpan" type="button" class="btn btn-danger" id="pilih" value="Kembali" /></a>
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
$query="INSERT INTO menu_bahan values ('$kode','$barang','$jumlah')";
$result=mysql_query($query) or mysql_error($query);
if($result) 
{echo"<script>location.href='home.php?page=bmenu&id=$kode'</script>";}
}
else if ($_GET['fungsi']=="hapus")
{
mysql_query("delete from menu_bahan where kode_menu='$_GET[id]' and kode_bahan='$_GET[id2]'");
echo"<script>location.href='home.php?page=bmenu&id=$_GET[id]'</script>";
}
?>