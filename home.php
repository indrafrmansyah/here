<?php error_reporting (0);?>
<?php
include "lib/koneksi.php";
session_start();
if (empty($_SESSION['user'])) {
	echo"<script>location.href='index.php'</script>";}
else{
	?>
<!DOCTYPE html>
<html class="no-js">
   
    <head>
        <title>h e r e . c a f f e</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script type="text/javascript" src="../lib/jquery.js"></script>
		<script type="text/javascript" src="../lib/jquery-1.7.2.js"></script>
		

    </head>    
    <body style="background-color: #f2f2f2;">
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid" style="background-color:#262626;">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="home.php" style="color:#FFFFFF;" width="10%"><font style="font-family:baskerville;" size="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; h e r e . c a f f e</font></a>
                    <div class="btn-group pull-right">
			<a class="btn" href="#"><i class="icon-user"></i> <?php echo " ".$_SESSION['nama']." " ?></a>
            
          </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li class="active">
                            <a href="home.php" style="background-color:#262626;"><b>Menu Utama</b></a></li>
                            <?php 
							include "menu.php";
							?>
                        </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                      <div class="navbar">
                            	
                   	  </div>
               	  </div>
                    <div class="row-fluid">
                        <!-- block -->
                        <!-- /block -->
</div>
      <?php 
	if($_GET[page]=='user') {include "master/user_tabel.php";}
	else if($_GET[page]=='tuser') {include "master/user_tambah.php";}
	else if($_GET[page]=='euser') {include "master/user_rubah.php";}

	else if($_GET[page]=='menu') {include "master/menu_tabel.php";}
	else if($_GET[page]=='tmenu') {include "master/menu_tambah.php";}
	else if($_GET[page]=='emenu') {include "master/menu_rubah.php";}
	else if($_GET[page]=='bmenu') {include "master/menu_bahan.php";}
	else if($_GET[page]=='updatestok') {include "master/updatestok.php";}

	else if($_GET[page]=='bahan') {include "master/bahan_tabel.php";}
	else if($_GET[page]=='tbahan') {include "master/bahan_tambah.php";}
	else if($_GET[page]=='ebahan') {include "master/bahan_rubah.php";}

	else if($_GET[page]=='supplier') {include "master/supplier_tabel.php";}
	else if($_GET[page]=='tsupplier') {include "master/supplier_tambah.php";}
	else if($_GET[page]=='esupplier') {include "master/supplier_rubah.php";}
			
	else if($_GET[page]=='formjual') {include "transaksi/formjual.php";}
	else if($_GET[page]=='datajual') {include "transaksi/datajual.php";}
	else if($_GET[page]=='detailjual') {include "transaksi/detailjual.php";}
	else if($_GET[page]=='datapesan') {include "transaksi/datapesan.php";}
	
	else if($_GET[page]=='beli') {include "transaksi/beli.php";}
	else if($_GET[page]=='dbeli') {include "transaksi/beli_detail.php";}
	else if($_GET[page]=='tbeli') {include "transaksi/beli_tambah.php";}
	else if($_GET[page]=='terima') {include "transaksi/terima.php";}
	else if($_GET[page]=='pterima') {include "transaksi/terima_tambah.php";}
	
	else if($_GET[page]=='formminta1') {include "transaksi/formminta1.php";}
	else if($_GET[page]=='formminta2') {include "transaksi/formminta2.php";}
	else if($_GET[page]=='dataminta') {include "transaksi/dataminta.php";}
	else if($_GET[page]=='detailminta') {include "transaksi/detailminta.php";}
	else if($_GET[page]=='detailminta1') {include "transaksi/detailminta1.php";}
	else if($_GET[page]=='formkirim') {include "transaksi/formkirim.php";}
	else if($_GET[page]=='formbayar') {include "transaksi/formbayar.php";}
			
	else if($_GET[page]=='laporan2') {include "transaksi/laporan2.php";}
	else if($_GET[page]=='laporan3') {include "transaksi/laporan3.php";}

	else { include"utama.php";} ?>
                    <div class="row-fluid">
                        <!-- block -->
                        <!-- /block -->
</div>
                </div>
            </div>
           
        </div>
    </body>
	
		<!-- script menentukan kelas dari trayek yang dipilih-->
<script type="text/javascript">
$(document).ready(function() {
$("#wilayah").change(function() {
var no =$(this).val();
var dataString = 'no='+no;
$.ajax({
type: "POST",
url: "cari_kota.php",
data: dataString,
cache: false,
success: function(html) {
$("#kota").html(html);
}
});
});
});
</script>

 <!-- script menentukan Kode Barang dari Jenis yang dipilih-->
<script type="text/javascript">
$(document).ready(function()
{
    $('#jenis').change(function()
    {
        var jenis =$(this).val();
		$.ajax({
            url: 'kode_barang.php',
            type: 'POST',
            dataType: 'json',
            data: 'jenis='+jenis,
            success: function(data)
            {
                $('#kode').val(data.field);
            }
        })
    });
});
</script>
<!--/.fluid-container-->
        <link href="vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="vendors/chosen.min.css" rel="stylesheet" media="screen">

        <link href="vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">

        <script src="vendors/jquery-1.9.1.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/jquery.uniform.min.js"></script>
        <script src="vendors/chosen.jquery.min.js"></script>
        <script src="vendors/bootstrap-datepicker.js"></script>

        <script src="vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

	<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
	<script src="assets/form-validation.js"></script>
        
	<script src="assets/scripts.js"></script>
        <script>

	jQuery(document).ready(function() {   
	   FormValidation.init();
	});
	

        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
		
  <!--/.fluid-container-->

        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="assets/scripts.js"></script>
        <script src="assets/DT_bootstrap.js"></script>
        <script>
        $(function() {
            
        });
        </script>

</html>
<?php } ?>
