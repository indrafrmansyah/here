<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php 
$id=$_GET['id'];
$sql=mysql_query("select * from supplier where kode_supplier='$id'");
while($row=mysql_fetch_array($sql))
{
$i=$row['kode_supplier'];
$nama=$row['nama_supplier'];
$alamat=$row['alamat_supplier'];
$telepon=$row['telepon_supplier'];
}

?>

<body>
<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b><h4>Form Ubah Data Supplier</h4></b></div>
                            </div><br>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="">
                                      <fieldset>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Kode Supplier</label>
                                          <div class="controls">
                                            <input name="kode" type="text" class="input-xlarge focused" id="focusedInput" readonly="true"
											value="<?php echo $i; ?>">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama Supplier</label>
                                          <div class="controls">
                                            <input name="nama" type="text" class="input-xlarge focused" id="focusedInput" required="true" 
											value="<?php echo $nama; ?>">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Alamat Supplier</label>
                                          <div class="controls">
                                            <textarea name="alamat" class="input-xlarge focused" id="focusedInput" required="true"><?php echo $alamat; ?></textarea>
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">No Telepon</label>
                                          <div class="controls">
                                            <input name="telepon" type="text" class="input-xlarge focused" id="focusedInput" required="true"
											value="<?php echo $telepon; ?>">
                                          </div>
                                        </div>
									
                                      <div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<input name="simpan" type="submit" class="btn btn-primary" id="simpan" value="Simpan" />
                                        <input type="reset" class="btn btn-danger" name="reset" id="reset" value="Cancel" onclick="window.location='home.php?page=supplier'">
                                        </div>
                                      </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
</body>
</html>

<?php 
if (isset($_POST['simpan'])){
$nama=$_POST['nama'];
$kode=$_POST['kode'];
$alamat=$_POST['alamat'];
$telepon=$_POST['telepon'];
$query="update supplier set kode_supplier='$kode', nama_supplier='$nama', alamat_supplier='$alamat', telepon_supplier='$telepon' where kode_supplier='$i'";
$result=mysql_query($query) or mysql_error($query);
	if($result) 
	{echo "<script>alert('Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=supplier'</script>";}
	else
	{echo "<script>alert('Gagal Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=esupplier'</script>";}}
?>