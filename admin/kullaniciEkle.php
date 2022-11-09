<?php
include("../incAdmin/ahead.php");
include("../inc/db.php");

$sorgu = $baglanti->prepare("SELECT * FROM kullanici WHERE id=1");
$sorgu->execute(); // yukarıdaki gibi nasıl yapılır bulmaya çalış.
$sonuc = $sorgu->fetch();

?>
<script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>
<?php



if(isset($_POST['aktifMi']))
{
	$_POST['aktifMi'] = 'checked';		

	$hata = '';
	

		if($_SESSION["yetki"] == "1"){ 

		$ekleSorgu = $baglanti->prepare("INSERT INTO kullanici SET kullaniciAdi=:kullaniciAdi,parola=:parola,yetki=:yetki,aktifMi=:aktifMi" );
		$ekle = $ekleSorgu->execute([
		'kullaniciAdi' => $_POST['kullaniciAdi'],
		'parola' => $_POST['parola'],
		'yetki' => $_POST['yetki'],
		'aktifMi' => $_POST['aktifMi']
		
		]);
		
		if($ekle)
		{
						?> <script type = "text/javascript"> 
				swal.fire(
					{
						title:'çok güzel',
						text:'Yeni Kullanıcı Eklendi',
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
		if($ekle == false)
		{
						?> <script type = "text/javascript"> 
					swal.fire(
						{
							title:'hata',
							text:'Yeni Kullanıcı Eklenemedi.',
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
}

if(isset($_POST['aktifDegil']))
{
	$_POST['aktifMi'] = '';		

	$hata = '';
	

		if($_SESSION["yetki"] == "1"){ 

		$ekleSorgu = $baglanti->prepare("INSERT INTO kullanici SET kullaniciAdi=:kullaniciAdi,parola=:parola,yetki=:yetki,aktifMi=:aktifMi" );
		$ekle = $ekleSorgu->execute([
		'kullaniciAdi' => $_POST['kullaniciAdi'],
		'parola' => $_POST['parola'],
		'aktifMi' => $_POST['aktifMi'],
		'yetki' => $_POST['yetki']

		]);
		
		if($ekle)
		{
						?> <script type = "text/javascript"> 
				swal.fire(
					{
						title:'çok güzel',
						text:'Yeni Kullanıcı Eklendi',
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
		if($ekle == false)
		{
						?> <script type = "text/javascript"> 
					swal.fire(
						{
							title:'hata',
							text:'Yeni Kullanıcı Eklenemedi.',
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
}



?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Kullanıcı Ekle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
							<li class="breadcrumb-item active">Kullanıcı Ekle</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
								<form method="post" action="" enctype="multipart/form-data" > <!-- enctype="multipart/form-data"  kısmı dosya yükleyeceğimiz için yazdık. resim vb.-->

									<div class="form-group">
										<label>Kullanıcı Adı</label>
										<input class="form-control"  name="kullaniciAdi" type="text" value="<?=@$_POST["kullaniciAdi"]?>" required>
									</div>
									<div class="form-group">
										<label>Parola</label>
										<input class="form-control"  name="parola" type="password" required>
									</div>
									<div class="form-group">
										<label>Yetki</label> <br>
										<label> <input type="radio" name="yetki" value="1"> Admin</label>
										<label> <input type="radio" name="yetki" value="2" checked> Normal Kullanıcı</label>
									</div>
									<div class="form-group form-check">
										<label>
										<input  class="form-check-input" type="checkbox" name="aktifMi" > Aktif										</label>
									</div>
									<div class="form-group form-check">
										<label>
										<input  class="form-check-input" type="checkbox" name="aktifDegil" > Aktif Değil
										</label>
									</div>
									<div class="form-group">
										<input type="submit"  value="kullanıcı Ekle" name="submit" class="btn btn-primary" >
									</div>
									
								</form>
	   
                            </div>
                        </div>
                    </div>
                </main>
                <?php
				include("../incAdmin/afooter.php");
				?>

