<?php
include('C:\wamp64\www\site\admin\login.php');

if(isset($_SESSION["oturum"]))
{
    header("location:login.php");
}

if(isset($_SESSION["oturum"]))
{
session_destroy();
}

echo md5("12345");

//Admin kontrol sayfasında Çıkış tuşu için çıkmasını sağladığımız dosya bu idi. 
//bu php dosyası geçersiz.
?>