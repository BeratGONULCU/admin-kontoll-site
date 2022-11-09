<?php
session_start();
	if(!(isset($_SESSION["oturum"]) && $_SESSION["oturum"] == "6789"))
        {
            header("location:login.php");
        }
		include("../inc/db.php");

        $id = $_SESSION["id"]; // veritabanından giriş yapan kişinin id ' sini almamız gerek.
        $sorgu2 = $baglanti->prepare("SELECT * FROM kullanici WHERE id=$id");
        $sorgu2 ->execute();
        $sonuc2 = $sorgu2->fetch();

        ?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Yönetim Paneli</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="aramak için..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="kullaniciParolaDegistir.php?id=<?= $sonuc2["id"] ?>">
                        <?= $_SESSION["kullaniciAdi"]; ?>
                        parolasını değiştir</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" name="logout" href="#" data-toggle="modal" data-target="#LogoutModal">Çıkış</a>
                    </div>
                </li>
            </ul>
        </nav>
		
		<!-- Modal -->
<div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Çıkış <?= $sonuc2["id"] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
        Çıkış Yapmak İstediğinizden Emin Misiniz?
		</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">İptal</button>
					<a href="logout.php" class="btn btn-danger">Değişiklikleri Kaydet</a>
				</div>
			</div>
		</div>
	</div>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../admin/index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Yönetim Paneli
                            </a>
                            <div class="sb-sidenav-menu-heading">SAYFALAR</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Ana Sayfa
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../admin/anasayfa.php">Ana Sayfa</a>
                                    <a class="nav-link" href="referanslar.php">Referanslar</a>
                                </nav>
                            </div>

                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="iletisimFormu.php">İletişim</a>
                                </nav>
                                <?php
                                if($_SESSION['yetki'] == "1")
                                {
                                ?>
                                 <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="Kullanici.php">Kullanıcılar</a>
                                </nav>
                                <?php } ?>
                            

                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Giriş Yapan Kullanıcı:</div>
                        <?= $_SESSION["kullaniciAdi"] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">