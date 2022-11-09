<?php

include("../inc/db.php");

/*
class student{
    public $ad;
    public $soyad;
    public $ogrenci_no;
    public $tc_no;
    public $ogrenci_sayisi = 0;


    public function isim

    public function ogrenciSayisi()
    {
        return $ogrenci_sayisi;
    }

}


class Futbolcu
{
    public $ad;
    public $soyad;
    public $gol_sayisi;
    public $asist_sayisi;
    public $forma_No;
    public $yas;
    public $takim;

    public function golAt()
    {
        $this->gol_sayisi++;
        //return $gol_sayisi;
    }

    public function asistYap()
    {
        $this->asist_sayisi++;
        //return $asist_sayisi;
    }

    public function transferOl($yeniTakim)
    {
        $this->takim = $yeniTakim;
    }
}

$lewandowski = new Futbolcu();

$lewandowski->ad = "Robert";
$lewandowski->soyad = "Lewandowski";
$lewandowski->gol_sayisi = 35;
$lewandowski->asist_sayisi = 12;
$lewandowski->forma_No = 12;
$lewandowski->yas = 35;
$lewandowski->takim = "Bayern Münih";

echo $lewandowski->ad . "<br/>";
echo $lewandowski->takim . "<br/>"; 

$lewandowski->transferOl("real madrid");

echo $lewandowski->takim . "<br/>";

echo $lewandowski->gol_sayisi . "<br/>";
$lewandowski->golAt();
echo $lewandowski->gol_sayisi . "<br/>";

echo $lewandowski->asist_sayisi . "<br/>";
$lewandowski->asistYap();
echo $lewandowski->asist_sayisi . "<br/>";
*/


?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <form method="post" action="veri.php">
        <div class="form-section">
            <br/>
            <label for="sorgula">ad - soyad</label> <br/>
            <input type="input" name="adsoyad" value=""/>
			<input type="input" name="email" value=""/>
            <input type="submit" value="gonder">
    </form>
        </div>

</body>
</html>

<?php
/*
class formSorgu
{
    public $sorgu;
    public $veriYaz;
    public $baglanti;

    public function adSorgu($ad)
    {
        if($_POST)
        {
            $sorgu = $baglanti->prepare("SELECT kullaniciAdi FROM kullanici WHERE kullaniciAdi=:$ad");
            $veriYaz = $sorgu->execute();
            echo $veriYaz ;
        }
    }
    public function mailSorgu($mail)
    {
        if($_POST)
        {
            $sorgu = $baglanti->prepare("SELECT email FROM kullanici WHERE email=:$mail");
            $veriYaz = $sorgu->execute();
            echo $veriYaz ;
        }
    }
}
*/

/*
function adSorgu($ad)
{
    if(isset($_POST["adsoyad"]))
    {
        $sorgu = $baglanti->prepare("SELECT kullaniciAdi FROM kullanici WHERE kullaniciAdi=:$ad");
        $sorgu->execute();
        $sonuc = $sorgu->fetch();

        echo $sonuc["kullaniciAdi"];
    }
}
*/

?>