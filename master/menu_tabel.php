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
                                <div class="muted pull-left"><b><h4>Data Menu</h4></b></div>
								<div class="pull-right"><a class="btn btn-success" href="home.php?page=tmenu" style="margin-bottom:10px">Tambah Menu</a></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span15">
                    			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Menu</th>
												<th>Nama Menu</th>
												<th>Harga</th>
												<th>Stok Menu</th>
												<th>Bahan Baku</th>
												<th>Edit</th>
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
										<?php
										  $i=1;
										   $sql=mysql_query("select * from menu order by kode_menu");
										   while($row=mysql_fetch_array($sql)){										   
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $i; ?></td>
                                                <td><?php echo $row['kode_menu']; ?></td>
                                                <td><?php echo $row['nama_menu']; ?></td>
												<td><?php echo number_format($row['harga_menu']); ?></td>
												<td><?php echo $row['stok']; ?> 
												<a href="?page=updatestok&&id=<?php echo $row['kode_menu']; ?>">
												<input type="button" class="btn btn-primary btn-small" value="Update" style="margin-left:20px"/></a></td>
                                                <td><a href="home.php?page=bmenu&&id=<?php echo $row['kode_menu']; ?>">
												<input type="button" class="btn btn-warning btn-small" value="Kelola Bahan Baku" style="margin-left:20px"/></a></td>
												<td><a href="home.php?page=emenu&&id=<?php echo $row['kode_menu']; ?>">
												<div align="center"><i class="icon-edit"></div></a></td>
												<td><a href="master/menu_hapus.php?id=<?php echo $row['kode_menu']; ?>" 
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
