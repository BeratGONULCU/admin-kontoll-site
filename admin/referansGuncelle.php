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
						 window.location.href='referanslar.php';
					 }})
					 // .then kısmından sonraki kodlar sweetalert dan sonra hangi php dosyasına gitmemiz gerektiğini söyler.

				 </script> 
				 
			<?php
}
?>
<script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>
<?php


/*
$sorgu = $baglanti->prepare("select * from anasayfa where id=1");
$sorgu->execute(); // yukarıdaki gibi nasıl yapılır bulmaya çalış.
$sonuc = $sorgu->fetch();
*/

$id = $_GET['id']; //tıklandığında hangi referans kısmı olduğunu anlamak için -- aşağıda update kısmında $id şeklinde kullanacağız.
$sorgu = $baglanti->prepare("SELECT * FROM referanslar WHERE id=:id");
$sorgu->execute(['id' => $id]);
$sonuc = $sorgu->fetch(); 


if($_POST)
{
	$guncelleSorgu = $baglanti->prepare("UPDATE referanslar SET link=:link,linkMetin=:linkMetin,altLinkMetin=:altLinkMetin,aktifMi=:aktifMi,sira=:sira,anahtar=:anahtar WHERE id=:id");
	$guncelle = $guncelleSorgu->execute([
		'link'=>$_POST["link"],
		'linkMetin'=>$_POST["linkMetin"],
		'altLinkMetin'=>$_POST["altLinkMetin"],
		'aktifMi'=>$_POST["aktifMi"],
		'sira'=>$_POST["sira"],
		'anahtar'=>$_POST["anahtar"],
		'id'=>(int)$_GET["id"] // veya yukarıda tanımlandığı için ( 'id' => $id ) şeklinde de yazabiliriz.
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
						 window.location.href='referanslar.php';
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
						 window.location.href='referanslar.php';
					 }})
					 // .then kısmından sonraki kodlar sweetalert dan sonra hangi php dosyasına gitmemiz gerektiğini söyler.
                        </script>
			<?php				
		}

	

}

?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Referans Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
							<li class="breadcrumb-item active">Referans Güncelle</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
								<form method="post" action="" enctype="multipart/form-data" > <!-- enctype="multipart/form-data"  kısmı veri yükleyeceğimiz için yazdık.-->
									<div class="form-group">
										<label>Link</label>
										<input class="form-control"  name="link" type="text" value="<?=$sonuc["link"]?>" required>
									</div>
									<div class="form-group">
										<label>Link Metin</label>
										<input class="form-control"  name="linkMetin" type="text"  value="<?=$sonuc["linkMetin"]?>" required>
									</div>
									<div class="form-group">
										<label>Alt Link Metin</label>
										<input class="form-control"  name="altLinkMetin" type="text" value="<?=$sonuc["altLinkMetin"]?>" >
									</div>
									<div class="form-group form-check">
										<label>
										<input  class="form-check-input"  name="aktifMi" type="checkbox" 
										<?= $sonuc['aktifMi'] == 1 ? 'checked' : '' /*eğer aktif 1 ise tik olucak 0 ise tik olmayacak*/?> 
										> Aktif Mi?
										</label>
									</div>
									<div class="form-group">
										<label>sıra</label>
										<input class="form-control"  name="sira" type="type" value="<?=$sonuc["sira"]?>" required>
									</div>
									<div class="form-group">
										<label>Anahtar</label>
										<input class="form-control"  name="anahtar" type="type" value="<?=$sonuc["anahtar"]?>" >
									</div>
									<div class="form-group">
										<label>tarih</label>
										<input class="form-control"  name="tarih" type="type" value="<?=$sonuc["tarih"]?>" >
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