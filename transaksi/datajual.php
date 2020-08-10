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
                                <div class="muted pull-left"><b><h4>Data Penjualan</h4></b></div>
							</div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th><div align="center">Kode Penjualan</div></th>
												<th><div align="center">Tanggal</div></th>
												<th><div align="center">Nama Konsumen</div></th>
												<th><div align="center">Total</div></th>												
												<th><div align="center">Status Pesanan</div></th>
                                                <th><div align="center">Detail</div></th>	
												<th><div align="center">Hapus</div></th>											
											</tr>
										</thead>
										<tbody>
										<?php
										   $sql=mysql_query("select * from jual");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><div align="center"><?php echo $row['kode_jual']; ?></div></td>
                                                <td><div align="center"><?php echo $row['tanggal_jual']; ?></div></td>
												<td><div align="center"><?php echo $row['nama_konsumen']; ?></div></td>
												<td><div align="center"><?php echo number_format($row['total_jual']); ?></div></td>
												<td><div align="center"><?php echo $row['status_jual']; ?></div></td>
                                                <td>
												  <div align="center"><?php echo "<a href='home.php?page=detailjual&&id=".$row['kode_jual']."'>
												<div align='center'>Lihat Detail Penjualan</div></a>";
												?></div></td>
												<td>
												  <div align="center"><?php echo "<a href='home.php?page=datajual&&id=".$row['kode_jual']."&&fungsi=hapus'>
												<div align='center'>Hapus</div></a>";
												?></div></td>
										  </tr>
											<?php } ?>
										</tbody>
									</table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                    
</body>
</html>
<?php 
if ($_GET['fungsi']=="hapus"){
$kode=$_GET['id'];
$query="delete from jual where kode_jual='$kode'";
$query2="delete from jual_detail where kode_jual='$kode'";
$result=mysql_query($query) or mysql_error($query);
$result2=mysql_query($query2) or mysql_error($query2);
	if($result) 
	{echo "<script>alert('Penjualan Dibatalkan')</script>";
	echo"<script>location.href='home.php?page=datajual'</script>";}}
?>