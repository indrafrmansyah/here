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
                                <div class="muted pull-left"><b><h4>Data Bahan Baku</h4></b></div>
								<div class="pull-right"><a class="btn btn-success" href="home.php?page=tbahan" style="margin-bottom:10px">Tambah Bahan Baku</a></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span15">
                    			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
										<thead>
											<tr>
												<th>No</th>
												<th>Kode Bahan</th>
												<th>Nama Bahan</th>
												<th>Stok</th>
												<th>Satuan</th>
												<th>Expired</th>
												<th>Edit</th>
												<th>Hapus</th>
											</tr>
										</thead>
										<tbody>
										<?php
										  $i=1;
										   $sql=mysql_query("select * from bahan order by kode_bahan");
										   while($row=mysql_fetch_array($sql)){										   
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $i; ?></td>
                                                <td><?php echo $row['kode_bahan']; ?></td>
                                                <td><?php echo $row['nama_bahan']; ?></td>
												<td <?php if($row['stok']<=("500")) echo 'style="background-color:#FF0000"'; ?>><?php echo $row['stok']; ?></td>
												<td><?php echo $row['satuan']; ?></td>
												<td <?php if($row['expired']<=date("Y-m-d")) echo 'style="background-color:#FF0000"'; ?>><?php echo $row['expired']; ?></td>
                                                <td><a href="home.php?page=ebahan&&id=<?php echo $row['kode_bahan']; ?>">
												<div align="center"><i class="icon-edit"></div></a></td>
												<td><a href="master/bahan_hapus.php?id=<?php echo $row['kode_bahan']; ?>" 
												onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini')">
												<div align="center"><i class="icon-remove"></div></a></td>
											</tr>
											<?php $i++;} ?>
										</tbody>
									</table>
									<table border="0" width="50%">
									<tr><td colspan="2"><b>Keterangan</b></td></tr>
									<tr>
									<td width="15%" height="20" bgcolor="#FF0000">
									&nbsp;
									</td>
									<td width="70%">
									: Stok bahan baku sudah di bawah batas minimum
									</td>
									</tr>
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

</body>
</html>
