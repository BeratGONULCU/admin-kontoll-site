<?php
/*
$Sayfa = "Anasayfa";
*/
include("../inc/db.php");
include("../inc/head.php");

$sorgu = $baglanti->prepare("SELECT * FROM anasayfa");
$sorgu->execute();
$sonuc = $sorgu->fetch();
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1><?php echo $sonuc["ustBaslik"] ?></h1>
                    <!--h1 arasına -->
                    <span class="subheading"><?php echo $sonuc["altBaslik"] ?></span>
                    <!--h1 arasına-->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php
                    $sorgu2 = $baglanti->prepare("SELECT * FROM referanslar WHERE aktifMi = 1 and linkName is null ORDER BY sira ");
                     // anasayfa kısmındaki linkleri tek tek yazmamak için veri tabanı tasarımı yaptık ve while döngüsü ile işlettik.
                    $sorgu2->execute();
                    //$sonuc2 = $sorgu2->fetch(); --> her satırda birer birer veri aldığı için bunun yerine while da yazıcaz.
                    while($sonuc2 = $sorgu2->fetch()){
                        ?>
            <div class="post-preview">
                <a href="post.php">
                    <h2 class="post-title"> <?php echo $sonuc2["ustBaslik"] ?> </h2>
                    <h3 class="post-subtitle"> <?php echo $sonuc2["altBaslik"] ?> </h3>
                </a>

                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    <?php echo $sonuc2["linkName"]  ?>
                </p>
            </div>
                    <?php
                        } //while kapanışı
                    ?>

        </div>
    </div>
</div>
<!-- Divider-->
<hr class="my-4" />
<!-- Pager-->
<div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →
    </a>
</div>
<?php
include("../inc/footer.php");
?>