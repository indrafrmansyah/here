<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><b><h4>Data User</h4></b></div>
								<div class="pull-right"><a class="btn btn-success" href="home.php?page=tuser" style="margin-bottom:10px">Tambah Data</a></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama User</th>
												<th>Username</th>
												<th>Password</th>
												<th>Hak Akses</th>
												<th>Edit</th>
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
										<?php
										  $i=1;
										   $sql=mysql_query("select * from user");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $i; ?></td>
                                                <td><?php echo $row['nama_user']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['hak_akses']; ?></td>
												<td><a href="home.php?page=euser&&id=<?php echo $row['username']; ?>">
												<div align="center"><i class="icon-edit"></div></a></td>
												<td><a href="master/user_hapus.php?id=<?php echo $row['username']; ?>" 
												onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini')">
												<div align="center"><i class="icon-remove"></div></a></td>
											</tr>
											<?php $i++;} ?>
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
</body>
</html>
