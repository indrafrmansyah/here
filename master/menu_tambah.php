<?php
include "../lib/koneksi.php";
$sql=mysql_query("select count(kode_menu) as kode from menu");//hitung jumlah baris
$data=mysql_fetch_array($sql);
$data=$data[kode]+1;//ditambah
$char="M-";
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
                                <div class="muted pull-left"><b><h4>Tambah Data Menu</h4></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="">
                                      <fieldset>
                                        <br>							
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Kode Menu</label>
                                          <div class="controls">
                                            <input name="a" type="text" class="input-xlarge focused" id="a" value="<?php echo $kodebaru; ?>" readonly="true">
                                          </div>
                                        </div>
													
										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Nama Menu</label>
                                          <div class="controls">
                                            <input name="b" type="text" class="input-xlarge focused" id="focusedInput" required="true">
                                          </div>
                                        </div>

										<div class="control-group">
                                          <label class="control-label" for="focusedInput">Harga</label>
                                          <div class="controls">
                                            <input name="c" type="number" class="input-xlarge focused" id="focusedInput" value="" required="true" />
                                          </div>
                                        </div>
										
                                      <div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<input name="simpan" type="submit" class="btn btn-success" id="simpan" value="Simpan" />
                                        <input type="reset" class="btn btn-danger" name="reset" id="reset" value="Cancel" onclick="window.location='home.php?page=menu'">
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
$query="INSERT INTO menu values ('$a','$b','$c','0')";
$result=mysql_query($query) or mysql_error($query);
	if($result) 
	{echo "<script>alert('Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=menu'</script>";}
	else
	{echo "<script>alert('Gagal Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=menu'</script>";}}
?>