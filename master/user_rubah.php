<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php 
$id=$_GET['id'];
$sql=mysql_query("select * from user where username='$id'");
while($row=mysql_fetch_array($sql))
{
$user=$row['username'];
$password=$row['password'];
$nama=$row['nama_user'];
$akses=$row['hak_akses'];
}

?>

<body>
<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b><h4>Edit Data User</h4></b></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="">
                                      <fieldset>
                                      <br>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Nama Pegawai</b></label>
                                          <div class="controls">
                                            <input name="nama" type="text" class="input-xlarge focused" id="focusedInput" required="true" 
											value="<?php echo $nama; ?>">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Username</b></label>
                                          <div class="controls">
                                            <input name="username" type="text" class="input-xlarge focused" id="focusedInput" required="true" 
											value="<?php echo $user; ?>">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <label class="control-label" for="focusedInput"><b>Password</b></label>
                                          <div class="controls">
                                            <input name="password" type="text" class="input-xlarge focused" id="focusedInput" required="true" 
											value="<?php echo $password; ?>">
                                          </div>
                                        </div>
										
										<div class="control-group">
  								<label class="control-label"><b>Hak Akses</b></label>
  								<div class="controls">
  									<select name="akses" class="span3 m-wrap" id="akses">
  										<option value="">--Select--</option>
  										<option value="Kasir" <?php if($akses=="Kasir") echo"selected='selected'"; ?>>Kasir</option>
										<option value="Admin" <?php if($akses=="Admin") echo"selected='selected'"; ?>>Admin</option>
  										<option value="Owner" <?php if($akses=="Owner") echo"selected='selected'"; ?>>Owner</option>
								    </select>
  								</div>
  							</div>
										
                                      <div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
										<input name="simpan" type="submit" class="btn btn-success" id="simpan" value="Simpan" />
                                          <button type="reset" class="btn btn-danger" onclick="window.location='home.php?page=user'">Cancel</button>
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
$username=$_POST['username'];
$password=$_POST['password'];
$akses=$_POST['akses'];
$query="update user set username='$username', password='$password', hak_akses='$akses', nama_user='$nama' where username='$id'";
$result=mysql_query($query) or mysql_error($query);
	if($result) 
	{echo "<script>alert('Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=user'</script>";}
	else
	{echo "<script>alert('Gagal Data Tersimpan')</script>";
	echo"<script>location.href='home.php?page=euser'</script>";}}
?>