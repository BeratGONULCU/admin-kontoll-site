<?php
//$Sayfa = "Hakkımızda";
include("../inc/head.php");
include("../inc/db.php");

$sorgu = $baglanti->prepare("SELECT * FROM hakkimizda");
$sorgu->execute();
$sonuc = $sorgu->fetch();
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/about-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h2><?php echo $sonuc["ustBaslik"] ?></h2>
                    <span class="subheading"> <?php echo $sonuc['altBaslik'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <?php echo $sonuc["aciklama"] ?>
            </div>
        </div>
    </div>
</main>
<?php
include("../inc/footer.php");
?>