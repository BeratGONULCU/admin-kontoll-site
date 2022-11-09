<?php
include("../incAdmin/ahead.php");
include("../inc/db.php");


if($_SESSION["yetki"]!== "1")
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
				exit; 
	}
?>
<script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>
<?php




/*
$sorgu = $baglanti->prepare("select * from anasayfa where id=1");
$sorgu->execute(); // yukarıdaki gibi nasıl yapılır bulmaya çalış.
$sonuc = $sorgu->fetch();
*/

if($_POST)
{
	

	$aktif=0;
	if($_POST['aktifMi'] == 1)
	{
		$aktif = 1;
	}
	
	if($_POST['aktifDegilMi'] == 0)
	{
		$aktif = 0;
	}

	
	$hata = '';
	
	if($_POST)
	{

		$ekleSorgu = $baglanti->prepare("INSERT INTO referanslar SET link=:link,linkMetin=:linkMetin,altLinkMetin=:altLinkMetin,aktifMi=:aktifMi,sira=:sira,anahtar=:anahtar" );
		$ekle = $ekleSorgu->execute([
		'link' => $_POST['link'],
		'linkMetin' => $_POST['linkMetin'],
		'altLinkMetin' => $_POST['altLinkMetin'],
		'aktifMi' => $aktif,
		'sira' => $_POST['sira'],
		'anahtar' => $_POST['anahtar']
		
		]);
		
		if($ekle)
		{
						?> <script type = "text/javascript"> 
				swal.fire(
					{
						title:'çok güzel',
						text:'yazılan değerler eklendi',
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
						?> <script type = "text/javascript"> 
					swal.fire(
						{
							title:'hata',
							text:'yazılan değerler girilemedi.',
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




else if($_POST["link"]!= '' && $_POST["linkMetin"] != '' && $_POST["anahtar"] != '' )
{
	$ekleSorgu = $baglanti->prepare("INSERT INTO referanslar SET link=:link,linkMetin=:linkMetin,altLinkMetin=:altLinkMetin,aktifMi=:aktifMi,sira=:sira,anahtar=:anahtar" );
	$ekle = $ekleSorgu->execute([
	'link' => $_POST['link'],
	'linkMetin' => $_POST['linkMetin'],
	'altLinkMetin' => $_POST['altLinkMetin'],
	'sira' => $_POST['sira'],
	'aktifMi' => $_POST['aktifMi'],
	'anahtar' => $_POST['anahtar']
	
	]);
	
	if($ekle)
	{
					?> <script type = "text/javascript"> 
			swal.fire(
				{
					title:'çok güzel',
					text:'yazılan değerler eklendi',
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
					?> <script type = "text/javascript"> 
				swal.fire(
					{
						title:'hata',
						text:'yazılan değerler girilemedi.',
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

}



/*

if($_POST)
{
	$guncelleSorgu = $baglanti->prepare("update referanslar set link=:link,linkMetin=:linkMetin,altLinkMetin=:altLinkMetin,aktifMi=:aktifMi,anahtar=:anahtar where id=:id");
	$guncelle = $guncelleSorgu->execute([
		'link'=>$_POST["link"],
		'linkMetin'=>$_POST["linkMetin"],
		'altLinkMetin'=>$_POST["altLinkMetin"],
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
*/

?>
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Referans Ekle</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
							<li class="breadcrumb-item active">Referans Ekle</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
								<form method="post" action="" enctype="multipart/form-data" > <!-- enctype="multipart/form-data"  kısmı dosya yükleyeceğimiz için yazdık. resim vb.-->

									<div class="form-group">
										<label>Link</label>
										<input class="form-control"  name="link" type="text" value="<?=@$_POST["link"]?>" required>
									</div>
									<div class="form-group">
										<label>Link Metin</label>
										<input class="form-control"  name="linkMetin" type="text"  value="<?=@$_POST["linkMetin"]?>" >
									</div>
									<div class="form-group">
										<label>Alt Link Metin</label>
										<input class="form-control"  name="altLinkMetin" type="text" value="<?=@$_POST["altLinkMetin"]?>" >
									</div>
									<div class="form-group form-check">
										<label>
										<input  class="form-check-input" type="checkbox" name="aktifMi"  value="1"> Aktif Mi?
										</label>
									</div>
									<div class="form-group form-check">
										<label>
										<input  class="form-check-input" type="checkbox" name="aktifDegilMi"  value="0"> Aktif Değil Mi?
										</label>
									</div>

									<div class="form-group">
										<label>Sıra</label>
										<input class="form-control"  name="sira" type="type" value="<?=@$_POST["sira"]?>" required>
									</div>
									<div class="form-group">
										<label>Anahtar</label>
										<input class="form-control"  name="anahtar" type="type" value="<?=@$_POST["anahtar"]?>" >
									</div>

									<div class="form-group">
										<input type="submit"  value="ekle" class="btn btn-primary" >
									</div>
									
								</form>
	   
                            </div>
                        </div>
                    </div>
                </main>
                <?php
				include("../incAdmin/afooter.php");
				?>

