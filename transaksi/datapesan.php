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
                                <div class="muted pull-left">Data Penjualan Kedai</div>
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
                                                <th><div align="center">Rincian Order</div></th>	
												<th><div align="center">Proses Pembuatan</div></th>											
											</tr>
										</thead>
										<tbody>
										<?php
										   $sql=mysql_query("select * from jual where status_jual!='Selesai'");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><div align="center"><?php echo $row['kode_jual']; ?></div></td>
                                                <td><div align="center"><?php echo $row['tanggal_jual']; ?></div></td>
												<td><div align="center"><?php echo $row['nama_konsumen']; ?></div></td>
												<td><div align="center"><?php echo number_format($row['total_jual']); ?></div></td>
												<td><div align="center"><?php echo $row['status_jual']; ?></div></td>
                                                <td>
												  <div align="center"><?php echo "<a href='home.php?page=datapesan&&id=".$row['kode_jual']."&fungsi=lihat'>
												<div align='center'>Lihat</div></a>";
												?></div></td>
												<td>
												  <div align="center"><?php echo "<a href='home.php?page=datapesan&&id=".$row['kode_jual']."&fungsi=pembuatan'>
												<div align='center'>Proses</div></a>";
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
<?php if($_GET['fungsi']=="lihat") { ?>
<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Pesanan</div>
							</div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Kode Menu</th>
												<th>Nama Nenu</th>
												<th>Jumlah</th>									
											</tr>
										</thead>
										<tbody>
										<?php
										   $sql=mysql_query("select menu.*,jual_detail.* from jual_detail inner join menu on jual_detail.kode_menu=menu.kode_menu 
										   where jual_detail.kode_jual='$_GET[id]'");
										   while($row=mysql_fetch_array($sql)){
										  ?>
											<tr class="odd gradeX">
												<td><?php echo $row['kode_menu']; ?></td>
                                                <td><?php echo $row['nama_menu']; ?></td>
                                                <td><?php echo $row['jumlah']; ?></td>
										  </tr>
											<?php } ?>
										</tbody>
									</table>
									<a href="home.php?page=datapesan">Kembali</a>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
<?php } ?>                    
</body>
</html>
<?php 
if ($_GET['fungsi']=="pembuatan"){
$kode=$_GET['id'];
$query="update jual set status_jual='Selesai' where kode_jual='$kode'";
$result=mysql_query($query) or mysql_error($query);
	if($result) 
	{echo "<script>alert('Pesanan sudah dibuatkan')</script>";
	echo"<script>location.href='home.php?page=datapesan'</script>";}}
?>