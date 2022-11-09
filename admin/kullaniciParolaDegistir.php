<?php
//yetkisi olmayan kullanıcılar için parola değiştirme sayfası

include("../incAdmin/ahead.php");
include("../inc/db.php");

$id = $_GET['id']; //tıklandığında hangi referans kısmı olduğunu anlamak için -- aşağıda update kısmında $id şeklinde kullanacağız.
$sorgu = $baglanti->prepare("SELECT * FROM kullanici WHERE id=:id");
$sorgu->execute(['id' => $id]);
$sonuc = $sorgu->fetch(); ;

?>
<script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>
<?php



if($_POST)
{
    if($sonuc["kullaniciAdi"])
	    $hata = '';

        if($sonuc["parola"] !== $_POST["parola"])
        { 
        $sonuc["parola"] = "";

		$guncelleParolaSorgu = $baglanti->prepare("UPDATE kullanici SET kullaniciAdi=:kullaniciAdi,parola=:parola WHERE id=:id" );
		$guncelleParola = $guncelleParolaSorgu->execute([
		'kullaniciAdi' => $_POST['kullaniciAdi'],
		'parola' => $_POST['parola']
		
		]);
		
		    if($guncelleParola)
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
		    if($guncelleParola == false)
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
                        <h1 class="mt-4"><?= $_SESSION["kullaniciAdi"] ?> Parolasını Değiştir</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
							<li class="breadcrumb-item active">Parola Değiştir</li>

                        </ol>

          <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                
                            </div>
                            <div class="card-body">
								<form method="post" action="" enctype="multipart/form-data" > <!-- enctype="multipart/form-data"  kısmı dosya yükleyeceğimiz için yazdık. resim vb.-->

									<div class="form-group">
										<label>Kullanıcı Adı </label>
										<input class="form-control"  name="kullaniciAdi" type="text" value="<?=$_SESSION["kullaniciAdi"]?>" required>
									</div>
                                    <div class="form-group">
										<label>Güncel Parola</label>
										<input class="form-control"  name="Gparola" type="text" value="<?= $sonuc["parola"] ?>" >
									</div>
									<div class="form-group">
										<label>Yeni Parola</label>
										<input class="form-control"  name="parola" type="password"  required>
									</div>
									<div class="form-group">
										<input type="submit"  value="Parola Güncelle" name="submit" class="btn btn-primary" >
									</div>
									
								</form>
	   
                            </div>
                        </div>
                    </div>
                </main>
                <?php
				include("../incAdmin/afooter.php");
				?>

