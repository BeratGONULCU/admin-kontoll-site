<?php
include("../incAdmin/ahead.php");
include("../inc/db.php");

$sorgu = $baglanti->prepare("SELECT * FROM referanslar");
$sorgu->execute();

?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Referanslar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
							<li class="breadcrumb-item active">Referanslar</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <a href="referansEkle.php" class="btn btn-primary">Referans Ekle</a>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Link</th>
                                                <th>Link Metin</th>
                                                <th>Alt Link Metin</th>
                                                <th>Aktif</th>
                                                <th>Anahtar</th>
												<th>sıra</th>
												<th>tarih</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
           
                                        <tbody>
										<?php
											while($sonuc = $sorgu->fetch())
											{
												?>
                                            <tr>
											
                                                <td><?= $sonuc["id"] ?></td>
                                                <td><?= $sonuc["link"] ?></td>
                                                <td><?= $sonuc["linkMetin"] ?></td>
                                                <td><?= $sonuc["altLinkMetin"] ?></td>
                                                <td class="text-center"><span class = "fa fa-2x fa-<?= $sonuc["aktifMi"] == "1" ? "check text-success" : "times text-danger"?>"></span></td> 
												<!--referanslar kısmında eğer aktif = 1 ise (check text-success) yeşil tik işareti değilse (times text-danger) kırmızı çarpı işareti yazdırılacak.-->
                                                <td><?= $sonuc["anahtar"] ?></td>
												<td><?= $sonuc["sira"] ?></td>
												<td><?= $sonuc["tarih"] ?></td>
												
												<?php
												if($_SESSION['yetki'] == 1){?>
												<td class = "text-center">
												 <a href="referansGuncelle.php?id=<?= $sonuc["id"]?> ">
												<span class="fa fa-edit fa-2x" ></span>
												<a/>
												<?php
												}
												?></td>
												<?php
												if($_SESSION['yetki'] == 1){
													?>
												<td class="text-center">
												
																									
														<a name="logout" href="#" data-toggle="modal" data-target="#silModal<?= $sonuc["id"]?>">
														<span class="fa fa-trash fa-2x" ></span>
														</a>
														
														<!-- Modal -->
														<div class="modal fade" id="silModal<?= $sonuc["id"]?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
															<a href="sil.php?id=<?=$sonuc["id"] ?>&tablo=referanslar" class="btn btn-danger">Sil</a>
														</div>
													</div>
												</div>
											</div>
											<?php
												}
												?>
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