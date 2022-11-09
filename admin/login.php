<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Kullanıcı Girişi</h3></div>
                                    <div class="card-body">
                                        <?php
                                        /*
                                        if(session_start() == true)
                                        {
                                            location("");
                                        }
                                        */
                                        session_start();

                                        include("../inc/db.php");

                                        if(isset($_SESSION["oturum"]) && $_SESSION["oturum"] == "6789")
                                        {
                                            header("location:index.php");
                                        }
                                        /*elseif(isset($_COOKIE["çerez"]))
                                        {
                                            $sorgu = $baglanti->prepare("SELECT kullaniciAdi,yetki FROM kullanici WHERE aktif = 1");
                                            $sorgu -> execute();
                                            while($sonuc = $sorgu->fetch())
                                            {
                                                if($_COOKIE["çerez"] == $sonuc[$kullaniciadi])
                                                {
                                                    $_SESSION["oturum"] = "6789";
                                                    $_SESSION["kullaniciAdi"] = $sonuc["kullaniciAdi"];
                                                    $_SESSION["yetki"] = $sonuc["yetki"];
                                                    header("location:index.php");

                                                }
                                            }
                                        }
                                        */
                                        
                                        

                                        if($_POST)
                                        {
                                            $kullaniciadi = $_POST['txtKullaniciAdi'];
                                            $parola = $_POST['txtParola'];
                                        }

                                        ?>

                                        <form method="post" action="login.php" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Kullanıcı Adı</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="txtKullaniciAdi" value="<?php echo @$kullaniciadi ?>" type="text" placeholder="Kullanıcı Adı" />
                                                <?php //value kısmında kullanıcıadı'nı kullanıcı adı girişi yaptıktan sonra yanlış şifre yapıp giriş yapmayı denerse tekrar yenilendiğinde kullanıcı adı tekrar yazmak zorunda kalmaması için 
                                                //site ilk açıldığında hata vermemesi için başına @ işareti koyduk   ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Parola</label>
                                                <input class="form-control py-4" id="inputPassword" name="txtParola" type="password" placeholder="Parola" />
                                            </div>
											<div class="form-group">
                                                <img src="../inc/captcha.php" alt="">
											<input class="form-control py-4" id="inputPassword" name="captcha" type="text" placeholder="güvenlik kodu giriniz.|" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" name="cbHatirla" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Parolamı Hatırla</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Şifremi Unuttum?</a>
                                                <input type="submit" class="btn btn-primary" value="Giriş Yap"> </input>
                                            </div>
                                        </form>
                                        <script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>


                                        <?php
                                        
                                        if($_POST)
                                        {
                                            $sorgu = $baglanti->prepare("SELECT parola,yetki FROM kullanici WHERE kullaniciAdi=:kullaniciAdi and aktifMi=1");
                                            $sorgu->execute(['kullaniciAdi'=> htmlspecialchars($kullaniciadi)]);
                                            $sonuc = $sorgu->fetch();

                                            if($parola == $sonuc["parola"])
                                            {
                                                $_SESSION['oturum'] = "6789";
                                                $_SESSION['kullaniciAdi'] = $kullaniciadi;
                                                $_SESSION['yetki'] = $sonuc["yetki"];

                                                if(isset($_POST["cbHatirla"]))
                                                {
                                                    setcookie("çerez" , $kullaniciadi , time() + (60*24*24));
                                                    //eğer beni hatırlaya basarsa çerez adında cookie oluşacak , kullanıcı adını yazıcak ve 24 saat kalınıp silinecek
                                                }


                                                header("location:anasayfa.php"); // login sayfasından giriş yapıldığında anasayfa.php'ye gidicek.
                                            }
                                                else
                                                {
                                                ?> <script type = "text/javascript"> 
                                                swal.fire(
                                                {
                                                    title:'Hata',
                                                    text:'Kullanıcı Adı veya Şifre Hatalı',
                                                    icon:'error',
                                                    confirmButtonText:'tamam'
                                                }
                                                )
                                                </script> 
                                                <?php ;
                                                }

                                            /*
                                            //yukarıda gösterilen şekilde yapılırsa güvenlik açıkları oluşur daha güvenli olması için md5 şifreleme kullanıcaz.
                                            
                                            echo md5(md5("23" . "12345" . "45")); -->2 kere md5 şifreleme karşılığını öğrenmek için yazdırdık.başına sayıları yazmamızın sebebi şifrelemeyi güçlendirip zorlaştırmak.
                                            şifre : 12345

                                            if($parola = $sonuc["parola"])
                                            {
                                                $_SESSION['oturum'] = "6789";
                                                $_SESSION['kullaniciAdi'] = $kullaniciadi;
                                                $_SESSION['yetki'] = $sonuc["yetki"];

                                                if(isset($_POST["cbHatirla"]))
                                                {
                                                    setcookie("çerez" , $kullaniciadi , time() + (60*24*24));
                                                    //eğer beni hatırlaya basarsa çerez adında cookie oluşacak , kullanıcı adını yazıcak ve 24 saat kalınıp silinecek
                                                }


                                                header("location:index.php");
                                            }

                                                     else
                                                {
                                                ?> <script type = "text/javascript"> 
                                                swal.fire(
                                                {
                                                    title:'Hata',
                                                    text:'Kullanıcı Adı veya Şifre Hatalı',
                                                    icon:'error',
                                                    confirmButtonText:'tamam'
                                                }
                                                )
                                                </script> <?php ;
                                                }
                                            
                                            */

                                        }

                                        ?>

                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
