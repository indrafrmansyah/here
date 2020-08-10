<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 35px;
  background-color:#0f0f0f;
  color: white;
  text-align: center;
}
</style> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>
						<!-- kasir -->
						<?php if($_SESSION['akses']=="Kasir") { ?>
						
					<!--	<li>
                            <a href="home.php?page=menu"><i class="icon-chevron-right"></i>Data Menu Kopi </a></li>
						<li>
                            <a href="home.php?page=bahan"><i class="icon-chevron-right"></i>Data Bahan Baku </a></li>
                        <li>
                            <a href="home.php?page=supplier"><i class="icon-chevron-right"></i>Data Supplier </a></li> 
						<li class="active">
                            <a href="#" style="background-color:#262626;"><span class="badge badge-success pull-right"></span>Menu Penjualan</a></li>-->
						
                        <li>
                            <a href="home.php?page=formjual"><span class="badge badge-success pull-right"></span>Form Penjualan</a></li>
                        <li>
                            <a href="home.php?page=datajual"><span class="badge badge-info pull-right"></span>Data Penjualan</a></li>
                   <!--     <li class="active">
                            <a href="#" style="background-color:#262626;"><span class="badge badge-success pull-right"></span>Menu Pembelian Bahan Baku</a></li>
                        <li>
                            <a href="home.php?page=beli"><span class="badge badge-success pull-right"></span>Pemesanan Bahan Baku</a></li>
							<li>
                            <a href="home.php?page=terima"><span class="badge badge-success pull-right"></span>Penerimaan Bahan Baku</a></li> -->
                       <!--  <li class="active">
                            <a href="#" style="background-color:#262626;"><span class="badge badge-success pull-right"></span>Menu Laporan</a></li>
						 <li>
							<a href="Laporan/laporan1.php" target="_blank">Laporan Stok Bahan Baku</a></li>
						 <li>                            
							<a href="home.php?page=laporan2">Laporan Penjualan</a></li>
						 <li>                            
							<a href="home.php?page=laporan3">Laporan Pembelian</a></li> -->
						<li class="active">
                            <a href="logout.php" style="background-color:#262626;"><b>Logout</b></a></li>
                        <!-- akhir kasir -->
						<!-- owner -->
						<?php } else if($_SESSION['akses']=="Owner") { ?>               
						 <li>
							<a href="Laporan/laporan1.php" target="_blank">Laporan Stok Bahan Baku</a></li>
						 <li>                            
							<a href="home.php?page=laporan2">Laporan Penjualan</a></li>
					 <li>                            
							<a href="home.php?page=laporan3">Laporan Pembelian</a></li> 
						<li class="active">
                            <a href="#" style="background-color:#262626;"><span class="badge badge-success pull-right"></span><b>Data User</b></a></li>
                         <li>
                            <a href="home.php?page=user">Data User </a></li>
						<li class="active">
                            <a href="logout.php" style="background-color:#262626;"><b>Logout</b></a></li>
						<!-- akhir owner -->
						<!-- admin -->
						<?php } else if($_SESSION['akses']=="Admin") { ?>
				        <li>
                            <a href="home.php?page=menu">Data Menu Kopi </a></li>
						<li>
                            <a href="home.php?page=bahan">Data Bahan Baku </a></li>
                        <li>
                            <a href="home.php?page=supplier">Data Supplier </a></li>
						<li>
                            <a href="home.php?page=formjual"><span class="badge badge-success pull-right"></span>Form Penjualan</a></li>
                        <li>
                            <a href="home.php?page=datajual"><span class="badge badge-info pull-right"></span>Data Penjualan</a></li>
						<li class="active">
                            <a href="#" style="background-color:#262626;"><span class="badge badge-success pull-right"></span><b>Menu Pembelian Bahan Baku</b></a></li>
						<li>
                            <a href="home.php?page=beli"><span class="badge badge-success pull-right"></span>Pemesanan Bahan Baku</a></li>
							<li>
                            <a href="home.php?page=terima"><span class="badge badge-success pull-right"></span>Penerimaan Bahan Baku</a></li>
						<li class="active">
                            <a href="logout.php" style="background-color:#262626;"><b>Logout</b></a></li>
						<?php } ?>
                       
</body>

</html>
