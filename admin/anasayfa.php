<?php
include("../incAdmin/ahead.php");
include("../inc/db.php");

$sorgu = $baglanti->prepare("SELECT * FROM anasayfa");
$sorgu->execute();


?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Ana Sayfa</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Yönetim Paneli</li>
							<li class="breadcrumb-item active">Ana Sayfa</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
									<!--dataTable id'si ile footer kısmına eklediğimiz js kodlarını ekleyip tablo şekillerini düzenledik-->
                                        <thead>
                                            <tr>
                                                <th>Üst Başlık</th>
                                                <th>Alt Başlık</th>
                                                <th>Tarih</th>
												<th>anahtar</th>
                                            </tr>
                                        </thead>
           
                                        <tbody>
										<?php
											while($sonuc = $sorgu->fetch())
											{
												?>
                                            <tr>
											
                                                <td><?= $sonuc["ustBaslik"] ?></td>
                                                <td><?= $sonuc["altBaslik"] ?></td>
                                                <td><?= $sonuc["tarih"] ?></td>
												<td><?= $sonuc["anahtar"] ?></td>
												<td class="text-center">
												<?php
												if($_SESSION['yetki'] == 1){?>
												 <a href="anasayfaGuncelle.php?id=<?= $sonuc["id"]?> ">
												<span class="fa fa-edit fa-2x" ></span>
												<a/>
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