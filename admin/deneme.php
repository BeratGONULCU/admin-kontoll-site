<?php
include("../incAdmin/ahead.php");
include("../inc/db.php");

?>
<script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>

                <main>
                    <div class="container-fluid">


          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
								<form method="post" action="kontrol.php" enctype="multipart/form-data" > <!-- enctype="multipart/form-data"  kısmı dosya yükleyeceğimiz için yazdık. resim vb.-->


									<div class="form-group form-check">
										<label>
										<input  class="form-check-input" type="checkbox" name="aktifMi" > Aktif 
										</label>
									</div>
									<div class="form-group">
										<input type="submit"  value="güncelle" class="btn btn-primary" >
									</div>
									
								</form>
	   
                            </div>
                        </div>
                    </div>
                </main>
                <?php

				?>

