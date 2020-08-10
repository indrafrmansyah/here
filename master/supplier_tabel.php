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
                                <div class="muted pull-left"><b><h4>Data Supplier</h4></b></div>
								<div class="pull-right"><a class="btn btn-success" href="home.php?page=tsupplier" style="margin-bottom:10px">Tambah Supplier</a></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Supplier</th>
												<th>Nama Supplier</th>
												<th>Alamat</th>
												<th>No Telepon</th>
												<th>Edit</th>
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
										<?php
										  $i=1;
										   $sql=mysql_query("select * from supplier");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $i; ?></td>
                                                <td><?php echo $row['kode_supplier']; ?></td>
                                                <td><?php echo $row['nama_supplier']; ?></td>
												<td><?php echo $row['alamat_supplier']; ?></td>
												<td><?php echo $row['telepon_supplier']; ?></td>
                                                <td><a href="home.php?page=esupplier&&id=<?php echo $row['kode_supplier']; ?>">
												<div align="center"><i class="icon-edit"></div></a></td>
												<td><a href="master/supplier_hapus.php?id=<?php echo $row['kode_supplier']; ?>" 
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
