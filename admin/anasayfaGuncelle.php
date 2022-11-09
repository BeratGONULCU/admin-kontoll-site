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
						 window.location.href='index.php';
					 }})
					 // .then kısmından sonraki kodlar sweetalert dan sonra hangi php dosyasına gitmemiz gerektiğini söyler.

				 </script> 
				 
			<?php
}
?>
<script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>
<?php


$sorgu = $baglanti->prepare("select * from anasayfa where id=:id");//sayfanın link kısmında id değerini belirtmek gerekiyor.
$sorgu->execute(['id'=>(int)$_GET["id"]]); // varolan id değeri ile girilen değer birbirine eşit mi bakılır.
$sonuc = $sorgu->fetch();
/*
$sorgu = $baglanti->prepare("select * from anasayfa where id=1");
$sorgu->execute(); // yukarıdaki gibi nasıl yapılır bulmaya çalış.
$sonuc = $sorgu->fetch();
*/

if($_POST)
{
	$guncelleSorgu = $baglanti->prepare("update anasayfa set ustBaslik=:ustBaslik,altBaslik=:altBaslik,tarih=:tarih,aktifMi=:aktifMi,anahtar=:anahtar where id=:id");
	$guncelle = $guncelleSorgu->execute([
		'ustBaslik'=>$_POST["ustBaslik"],
		'altBaslik'=>$_POST["altBaslik"],
		'tarih'=>$_POST["tarih"],
		'aktifMi'=>$_POST["aktifMi"],
		'anahtar'=>$_POST["anahtar"],
		'id'=>(int)$_GET["id"]
		]);
		if($guncelle)
		{
			?> <script type = "text/javascript"> 
				swal.fire(
					{
						title:'çok güzel',
						text:'seçilen veriler güncellendi',
						icon:'succes',
						confirmButtonText:'tamam'
					}
				 ).then((value)=>{
					 if(value.isConfirmed)
					 {
						 window.location.href='index.php';
					 }})
					 // .then kısmından sonraki kodlar sweetalert dan sonra hangi php dosyasına gitmemiz gerektiğini söyler.

				 </script> 
			<?php
		}
		else
		{
			?>
			<script type = "text/javascript"> 
				swal.fire(
                    {
                        title:'Hata',
                        text:'veriler güncellenemedi.',
                        icon:'error',
                        confirmButtonText:'tamam'
                    }
                        ).then((value)=>{
					 if(value.isConfirmed)
					 {
						 window.location.href='index.php';
					 }})
					 // .then kısmından sonraki kodlar sweetalert dan sonra hangi php dosyasına gitmemiz gerektiğini söyler.
                        </script>
			<?php				
		}

	

}

?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Ana Sayfa Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
							<li class="breadcrumb-item active">Ana Sayfa Güncelle</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
								<form method="post" action="" >
									<div class="form-group">
										<label>Üst Başlık</label>
										<input class="form-control"  name="ustBaslik" type="text"  value="<?=$sonuc["ustBaslik"]?>" required>
									</div>
									<div class="form-group">
										<label>Alt Başlık</label>
										<input class="form-control"  name="altBaslik" type="text"  value="<?=$sonuc["altBaslik"]?>" required>
									</div>

									<div class="form-group">
										<label>Tarih</label>
										<input class="form-control"  name="tarih" type="text"  value="<?=$sonuc["tarih"]?>" required>
									</div>

									<div class="form-group">
										<label>Aktif mi</label>
										<input class="form-control"  name="aktifMi" type="text"  value="<?=$sonuc["aktifMi"]?>" required>
									</div>
									<div class="form-group">
										<label>Anahtar</label>
										<input class="form-control"  name="anahtar" type="text"  value="<?=$sonuc["anahtar"]?>" required>
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
				include("../incAdmin/afooter.php");
				?>