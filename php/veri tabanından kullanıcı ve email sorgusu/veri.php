<html>
<head>
<title>form ile alınan veriyi post ile getirip veritabanından olup olmadığını kontrol eden program</title>
</head>
<body>
<?php 
include("../inc/db.php");

$sorgu = $baglanti->prepare("SELECT * FROM kullanici ");
$sorgu->execute();
//$sonuc = $sorgu->fetch();


while($sonuc = $sorgu->fetch())
{
	if(isset($_POST['adsoyad']))
	{
		//$_POST['adsoyad'];  //illa ki bu kısmı yazmamıza gerek yok.
			
		if(isset($_POST['email']))
		{
		//$_POST['email'];
		if($sonuc['kullaniciAdi'] == $_POST['adsoyad'])
		{						
		if($sonuc['email'] == $_POST['email'])
		{
			echo "(" . $sonuc['kullaniciAdi']. ")" . " adında kullanıcı bulundu. <br/>" . $sonuc['email'] . "email'i budur.";
		}
		else
		{
			echo "(" . $sonuc['kullaniciAdi']. ")" . " adında kullanıcı bulundu. <br/>" . $_POST['email'] . "email'i bulunamadı.";
		}
		
	}

	}
	elseif(!isset($_POST['email']) && isset($_POST['adsoyad']))
	{
		if($sonuc['kullaniciAdi'] == $_POST['adsoyad'])
		{
			echo "(" . $sonuc['kullaniciAdi']. ")" . " adında kullanıcı bulundu. <br/>";
		}
	}
}
	elseif(isset($_POST['email']) && !isset($_POST['adsoyad']))
	{
		if($sonuc['email'] == $_POST['email'])
		{
			echo "(" . $sonuc['email']. ")" . " mail'i bulundu.  " . "kullanıcı bulunamadı.";
		}
	}
	elseif(isset($_POST['email']) && isset($_POST['adsoyad']))
	{
		if($sonuc['email'] == $_POST['email'] && $sonuc['adsoyad'] == $_POST['kullaniciAdi'])
		{
			echo "(" . $sonuc[kullaniciAdi] . ")" . " kullanıcısının mail adresi" . "$sonuc[email] "; 
			// Parse error: syntax error, unexpected '' (T_ENCAPSED_AND_WHITESPACE), expecting '-' or identifier (T_STRING) or variable (T_VARIABLE) or number (T_NUM_STRING) in
			// yukarıda ki hata gelince $sonuc değişkeni içinde ki tek tırnakları silip tırnaksız yazmak gerekir.
		}
	}
}

 ?>
</body>
</html>