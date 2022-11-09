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
						 window.location.href='kullanici.php';
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
$id;
$id = $_GET['id']; //tıklandığında hangi referans kısmı olduğunu anlamak için -- aşağıda update kısmında $id şeklinde kullanacağız.
$sorgu = $baglanti->prepare("SELECT * FROM kullanici WHERE id=:id");
$sorgu->execute(['id' => $id]);
$sonuc = $sorgu->fetch(); 



if($_POST)
{
	$guncelleSorgu = $baglanti->prepare("UPDATE kullanici SET kullaniciAdi=:kullaniciAdi,parola=:parola,yetki=:yetki,aktifMi=:aktifMi WHERE id=:id");
	$guncelle = $guncelleSorgu->execute([
		'kullaniciAdi'=>$_POST['kullaniciAdi'],
		'parola'=>$_POST['parola'], // md5($_POST["parola"]); -> diye yazdırsaydık şifrelemiş olurduk.
		'yetki'=>$_POST['yetki'],
		'aktifMi'=>$_POST['aktifMi'],
		'id'=>$_GET['id'] // veya yukarıda tanımlandığı için ( 'id' => $id ) şeklinde de yazabiliriz.
		]);
		if($guncelle)
		{
			?> <script type = "text/javascript"> 
				swal.fire(
					{
						title:'çok güzel',
						text:'kullanıcı bilgileri güncellendi',
						icon:'succes',
						confirmButtonText:'tamam'
					}
				 ).then((value)=>{
					 if(value.isConfirmed)
					 {
						 window.location.href='kullanici.php';
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
                        text:'kullanıcı bilgileri güncellenemedi.',
                        icon:'error',
                        confirmButtonText:'tamam'
                    }
                        ).then((value)=>{
					 if(value.isConfirmed)
					 {
						 window.location.href='kullanici.php';
					 }})
					 // .then kısmından sonraki kodlar sweetalert dan sonra hangi php dosyasına gitmemiz gerektiğini söyler.
                        </script>
			<?php				
		}

	

}

?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Kullanıcı Güncelle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
							<li class="breadcrumb-item active">Kullanıcı Güncelle</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
								<form method="post" action="" enctype="multipart/form-data" > <!-- enctype="multipart/form-data"  kısmı veri yükleyeceğimiz için yazdık.-->
									<div class="form-group">
										<label>Kullanıcı Adı</label>
										<input class="form-control"  name="kullaniciAdi" type="text" value="<?=$sonuc["kullaniciAdi"]?>" required>
									</div>
									<div class="form-group">
										<label>Parola</label>
										<input class="form-control"  name="parola" type="text"  value="<?=$sonuc["parola"]?>" required>
									</div>
									<div class="form-group">
										<label>Yetki</label>
										<input class="form-control"  name="yetki" type="text" value="<?=$sonuc["yetki"]?>" required>
									</div>
									<div class="form-group form-check">
										<label>
										<input  class="form-check-input"  name="aktifMi" type="checkbox" 
										<?= $sonuc['aktifMi'] == 1 ? 'checked' : '' /*eğer aktif 1 ise tik olucak 0 ise tik olmayacak*/?> 
										> Aktif Mi?
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
				include("../incAdmin/afooter.php");
				?>