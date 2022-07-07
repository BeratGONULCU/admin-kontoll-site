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
                                        $kullaniciAdi = ""; 
                                        /*aşağıda (kullanıcı adı) kısmına ekledik çünkü şifre yanlış girilirse adı silinmemesi için 
                                        ve burada boş tanımlamamın sebebi site ilk yüklediğinde hata vermemesi içindir.*/

                                        // echo md5("121234521"); //12 12345 21 sayısının şifreleme yöntemi (önemli)

                                        session_start();    //oturum oluşturalacağı için bu komut yazıldı. baştan yazmak gerekli sonra unutlursa çalışmaz.
                                        include("../inc/db.php");

                                        if(isset($_SESSION["oturum"]) && $_SESSION["oturum"] == "3456")
                                        {
                                            header("location:index.php");
                                        }
                                        else
                                        {
                                            header("location:login.php");
                                        }

                                        if($_POST)
                                        {
                                            $kullaniciAdi = $_POST["txtKullaniciAdi"];
                                            $parola = $_POST["txtParola"];

                                        }

                                        ?>

                                        <form method = "post" action = "login.php" >
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Kullanıcı Adı</label>
                                                <input class="form-control py-4" id="inputEmailAddress" name = "txtKullaniciAdi" value="<?php echo @$kullaniciAdi ?>" type="text" placeholder="kullanıcı adı" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Parola</label>
                                                <input class="form-control py-4" id="inputPassword" name = "txtParola" type="password" placeholder="parola" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" name = "cbHatirla"/>
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Beni Hatırla</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <input type="submit" class="btn btn-primary" value="giriş"/>
                                                <!--<a class="btn btn-primary" href="index.html">Login</a>--> <!-- üstündeki inputu yazdıktan sonra sildik. -->
                                            </div>
                                        </form>

                                        <script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>

                                        <?php

                                        if($_POST)
                                       {
                                        $sorgu = $baglanti->prepare("SELECT parola,yetki FROM kullanici WHERE kullaniciAdi=:kullaniciAdi and aktif=1 ");
                                        $sorgu -> execute(['kullaniciAdi'=>htmlspecialchars($kullaniciAdi)]);
                                        $sonuc = $sorgu->fetch();
                                        if(md5("12" . $parola . "21") == $sonuc["parola"])
                                        {
                                            $_SESSION["oturum"] = "3456";
                                            $_SESSION['kullaniciAdi'] = $kullaniciAdi;
                                            $_SESSION['yetki'] = $sonuc["yetki"];

                                            if(isset($_POST["cbHatirla"]))
                                            {
                                                setcookie("cerez" , md5("aa" . $kullaniciAdi . "bb" ) , time() + (60*60*24));
                                                // giriş yapan kişinin kullanıcı adını başına ve sonuna aa ve bb harflerini koyarak 24 saat şifreleyip saklıyoruz.
                                                //cerez adında bir cookie oluşturduk , cookie'ler güvenli değildir tarayıcıda saklanır ama session ise server'larda saklanır.
                                            }
  

                                            header('location:index.php');
                                        }
                                        else
                                        {
                                            ?> <script type = "text/javascript"> 
                                            swal.fire(
                                                {
                                                title:'Hata',
                                                text:'Kullanıcı Adı veya Şifre Yanlış',
                                                icon:'error',
                                                confirmButtonText:'tamam'
                                                }
                                            )
                                            </script> <?php ;
                                        }

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
