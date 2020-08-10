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
                                <div class="muted pull-left"><b><h4>Data Penerimaan Bahan Baku</h4></b></div>
							</div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th><div align="center">No</div></th>
												<th><div align="center">No Pembelian</div></th>
												<th><div align="center">Tanggal Beli</div></th>
												<th><div align="center">Supplier</div></th>
												<th><div align="center">Total</div></th>
												<th><div align="center">Status</div></th>
                                                <th><div align="center">Form Penerimaan</div></th>								
											</tr>
										</thead>
										<tbody>
										<?php
										$no=1;
										   $sql=mysql_query("select beli.*, supplier.* from beli inner join supplier on beli.kode_supplier=supplier.kode_supplier where status_beli='Pesan'");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $no; ?></td>
                                                <td><div align="center"><?php echo $row['kode_beli']; ?></div></td>
												<td><div align="center"><?php echo $row['tanggal_beli']; ?></div></td>
												<td><div align="center"><?php echo $row['nama_supplier']; ?></div></td>
												<td><div align="center"><?php echo number_format($row['total_beli']); ?></div></td>
                                                <td><div align="center"><?php echo $row['status_beli']; ?></div></td>
												<td>
												  <div align="center"><?php echo "<a href='home.php?page=pterima&&id=".$row['kode_beli']."'>
												<div align='center'>Proses Penerimaan Bahan Baku</div></a>";
												?></div></td>
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
