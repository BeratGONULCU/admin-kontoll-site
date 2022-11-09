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

if($_GET)
{
	$tablo = $_GET["tablo"];
	$id = (int)$_GET["id"];
	
	$sorgu = $baglanti->prepare("DELETE FROM $tablo WHERE id=:id");
	$sorgu -> execute(["id"=>$id]);
	$sonuc = $sorgu;
	if($sonuc)
	{
		echo '<script type = "text/javascript"  src = "../js/sweetalert2.all.min.js"></script>'; 
		echo 	"<script>
				swal.fire(
					{
						title:'başarılı',
						text:'silme işlemi tamamlandı',
						icon:'success',
						confirmButtonText:'tamam'
					}
				 ).then((value)=>{
					 if(value.isConfirmed)
					 {
						 window.location.href='$tablo.php';
					 }})
		</script>";
	}
}

include("../incAdmin/afooter.php");


?>

