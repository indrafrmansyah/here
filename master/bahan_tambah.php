<?php
include "../lib/koneksi.php";
$sql=mysql_query("select count(kode_bahan) as kode from bahan");//hitung jumlah baris
$data=mysql_fetch_array($sql);
$data=$data[kode]+1;//ditambah
$char="B-";
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
                                <div class="muted pull-left">Tambah Data Bahan Baku </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="">
                                      <fieldset>
                                        <legend>Form bahan</legend>
                                        							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Kode Bahan</label>
                                          <div class="controls">
                                            <input name="a" type="text" class="input-xlarge focused" id="a" value="<?php echo $kodebaru; ?>" readonly="true">
                                          </div>
                                        </div>
													
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama Bahan</label>
                                          <div class="controls">
                                            <input name="b" type="text" class="input-xlarge focused" id="focusedInput" required="true">
                                          </div>
                                        </div>

										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Satuan</label>
                                          <div class="controls">
                                            <input name="c" type="text" class="input-xlarge focused" id="focusedInput" value="" required="true" />
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Stok</label>
                                          <div class="controls">
                                            <input name="e" type="text" class="input-xlarge focused" id="focusedInput" value="" required="true" />
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Expired</label>
                                          <div class="controls">
                                            <input name="f" type="date" class="input-xlarge focused" id="focusedInput" value="" required="true" />
                                          </div>
                                        </div>
										
                                      <div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<input name="simpan" type="submit" class="btn btn-primary" id="simpan" value="Simpan" />
                                        <input type="reset" class="btn btn-danger" name="reset" id="reset" value="Cancel" onclick="window.location='home.php?page=bahan'">
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
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$e=$_POST['e'];
$f=$_POST['f'];
$query="INSERT INTO bahan values ('$a','$b','$c','$e','$f')";
$result=mysql_query($query) or mysql_error($query);
	if($result) 
	{echo "<script>alert('Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=bahan'</script>";}
	else
	{echo "<script>alert('Gagal Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=bahan'</script>";}}
?>