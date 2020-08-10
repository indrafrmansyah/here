<?php
include "../lib/koneksi.php";
$sql=mysql_query("select count(kode_supplier) as kode from supplier");//hitung jumlah baris
$data=mysql_fetch_array($sql);
$data=$data[kode]+1;//ditambah
$char="S-";
$kodebaru= $char .sprintf("%03s", $data);
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
                                <div class="muted pull-left"><b><h4>Form Data Supplier</h4></b></div>
                            </div><br>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="">
                                      <fieldset>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Kode Supplier</label>
                                          <div class="controls">
                                            <input name="kode" type="text" class="input-xlarge focused" id="focusedInput" readonly="true" value="<?php echo $kodebaru;?>">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama Supplier</label>
                                          <div class="controls">
                                            <input name="nama" type="text" class="input-xlarge focused" id="focusedInput" required="true">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Alamat Supplier</label>
                                          <div class="controls">
                                            <textarea name="alamat" class="input-xlarge focused" id="focusedInput" required="true"></textarea>
                                          </div>
                                        </div>
																				
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">No Telepon</label>
                                          <div class="controls">
                                            <input name="telepon" type="text" class="input-xlarge focused" id="focusedInput" required="true">
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
$query="INSERT INTO supplier values ('$kode','$nama','$telepon','$alamat')";
$result=mysql_query($query) or mysql_error($query);
	if($result) 
	{echo "<script>alert('Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=supplier'</script>";}
	else
	{echo "<script>alert('Gagal Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=tsupplier'</script>";}}
?>