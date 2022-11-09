<?php
include("../incAdmin/ahead.php");
include("../inc/db.php");


if($_SESSION["yetki"]!="1")
{

			?> <script type = "text/javascript"> 
				swal.fire(
					{
						title:'hata',
						text:'yetkisiz kullanıcı',
						icon:'error',
						confirmButtonText:'tamam'
					}
				 ).then((value)=>{
					 if(value.isConfirmed)
					 {
						 window.location.href='anasayfa.php';
					 }})
					 // .then kısmından sonraki kodlar sweetalert dan sonra hangi php dosyasına gitmemiz gerektiğini söyler.

				 </script> 
				 
			<?php
}
?>
<script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>

<?php

$sorgu = $baglanti->prepare("SELECT * FROM kullanici");
$sorgu->execute();

?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Kullanıcılar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
							<li class="breadcrumb-item active">Kullanıcılar</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <a href="kullaniciEkle.php" class="btn btn-primary">Kullanıcı Ekle</a>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Kullanıcı Adı</th>
                                                <th>yetki</th>
                                                <th>Aktif</th>
												<th>tarih</th>
                                            </tr>
                                        </thead>
           
                                        <tbody>
										<?php
											while($sonuc = $sorgu->fetch())
											{
												?>
                                            <tr>
											
                                                <td><?= $sonuc["id"] ?></td>
                                                <td><?= $sonuc["kullaniciAdi"] ?></td>
                                                <td><?= $sonuc["yetki"] ?></td>
                                                <td class="text-center"><span class = "fa fa-2x fa-<?= $sonuc["aktifMi"] == "1" ? "check text-success" : "times text-danger"?>"></span></td> 
												<!--referanslar kısmında eğer aktif = 1 ise (check text-success) yeşil tik işareti değilse (times text-danger) kırmızı çarpı işareti yazdırılacak.-->
												<td><?= $sonuc["tarih"] ?></td>
												<td class = "text-center"><?php
												if($_SESSION['yetki'] == 1){?>
												 <a href="kullaniciGuncelle.php?id=<?= $sonuc["id"]?> ">
												<span class="fa fa-edit fa-2x" ></span>
												<a/>
												<?php
												}
												?></td>
												<td class="text-center">
						
																									
														<a name="logout" href="#" style="color:red" data-toggle="modal" data-target="#silModal<?= $sonuc["id"]?>">
														<span class="fa fa-trash fa-2x red" ></span>
														</a>
														
														<!-- silModal -->
														<div class="modal fade" id="silModal<?= $sonuc["id"]?>" tab="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel">Sil</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
														<div class="modal-body">
															Silmek İstediğinizden Emin Misiniz?
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
															<a href="sil.php?id=<?=$sonuc["id"] ?>&tablo=kullanici" class="btn btn-danger">Sil</a>
														</div>
													</div>
												</div>
											</div>

												</td>
										
                                            </tr>
                                            	<?php
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <?php
				include("../incAdmin/afooter.php");
				?>