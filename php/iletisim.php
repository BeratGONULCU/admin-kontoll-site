<?php
//$Sayfa = "iletişim";

include("../inc/head.php");
include("../inc/db.php");
//header("Refresh: 2;"); --> yazılırsa her 10 saniye içinde sayfayı yeniler.


$sorgu = $baglanti->prepare("SELECT * FROM iletisimformu");
$sorgu->execute();
$sonuc = $sorgu->fetch();
?>
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1> İletişim </h1>
                    <span class="subheading"> bizimle iletişime geçin.. </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="my-5">
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN" name="sentMessage" method="post" action="iletisim.php">
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text" name="ad" placeholder="Enter your name..."
                                data-sb-validations="required" />
                            <label for="name">ad</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text" name="soyad" placeholder="Soyadınızı giriniz..."
                                data-sb-validations="required" />
                            <label for="name">soyad</label>
                            <div class="invalid-feedback" data-sb-feedback="surname:required">A name is required.</div>
                        </div>

                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" name="email" placeholder="Enter your email..."
                                data-sb-validations="required,email" />
                            <label for="email">E-mail adresi</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" type="tel" name="telNO" placeholder="Enter your phone number..."
                                data-sb-validations="required" />
                            <label for="phone">telefon numara</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.
                            </div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" name="mesaj" placeholder="Enter your message here..."
                                style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="message">Mesaj</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.
                            </div>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-dark" id="submitButton" 
                            type="submit">Gönder</button>
                    </form>

                    <script type = "text/javascript" src="../js/sweetalert2.all.min.js" ></script>

                    <?php
                    if($_POST)
                    {
                        $sorgu2 = $baglanti->prepare("INSERT INTO iletisimformu SET ad=:ad,soyad=:soyad,email=:email, telNO=:telNO,mesaj=:mesaj ");
                        $ekle = $sorgu2->execute(
                            [
                                'ad' => htmlspecialchars($_POST['ad']),
                                'soyad'=> htmlspecialchars($_POST['soyad']),
                                'email' => htmlspecialchars($_POST['email']),
                                'telNO' => htmlspecialchars($_POST['telNO']),
                                'mesaj' => htmlspecialchars($_POST['mesaj'])                            ]
                        );

                        
                        if($ekle == true) // sweetalert sitesiyle başarı ve hata mesajlarını güzelleştirdik..
                        {
                            ?> <script type = "text/javascript"> 
                            swal.fire(
                                {
                                title:'çok güzel',
                                text:'mesajınız iletildi',
                                icon:'succes',
                                confirmButtonText:'tamam'
                                }
                            )
                            </script> <?php ;
                        }
                        else
                        {
                            ?> <script type = "text/javascript"> 
                            swal.fire(
                                {
                                title:'Hata',
                                text:'tüm alanları doğru doldurun',
                                icon:'error',
                                confirmButtonText:'tamam'
                                }
                            )
                            </script> <?php ;
                        }
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</main>