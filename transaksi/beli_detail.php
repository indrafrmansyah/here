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
                                <div class="muted pull-left"><b><h4>Detail Pembelian Bahan Baku</h4></b></div>
								<div class="pull-right"><a class="btn btn-danger" href="home.php?page=beli" style="margin-bottom:10px">Kembali</a></div>
							</div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Bahan Baku</th>
												<th>Jumlah</th>
												<th>Subtotal</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$no=1;
										   $sql=mysql_query("select beli_detail.*, bahan.* from beli_detail inner join bahan on beli_detail.kode_bahan=bahan.kode_bahan 
										   where beli_detail.kode_beli='$_GET[id]'");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $no; ?></td>
                                                <td><?php echo $row['nama_bahan']; ?></td>
                                                <td><?php echo $row['jumlah_beli']." ".$row['satuan']; ?></td>
												<td><?php echo number_format($row['subtotal_beli']); ?></td>
										  </tr>
											<?php $no++; } ?>
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    
</body>
</html>