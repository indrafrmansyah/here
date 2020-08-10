<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">
                                  <b><h4>Cetak Laporan Pembelian Bahan Baku</h4></b>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form class="form-horizontal" method="post" action="Laporan/laporanbeli.php" target="_blank">
                                      <fieldset>
                                        <br>
                                
								<div class="control-group">
										<label class="control-label"><b>Tanggal Awal</b><br />
										</label>
										<div class="controls">
										<input name="a" type="date" required='true' class="span3 m-wrap"/>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label"><b>Tanggal Akhir</b><br />
									  </label>
										<div class="controls">
										<input name="b" type="date" required='true' class="span3 m-wrap"/>
										</div>
								</div>
										
                                      <div class="control-group">
                                        <label class="control-label"></label>
                                        </div>
                                        <div class="form-actions">
                                          <input name="simpan" type="submit" class="btn btn-success" id="simpan" value="Cetak" />
                                        </div>
                                      </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
</body>
</html>