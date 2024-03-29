<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> <?php//(sayfa adını yazdırmak için) echo $Sayfa ?> | HR-BİLİŞİM</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-yellow " id="mainNav">
        <!-- if($Sayfa == "Anasayfa") echo "bg-dark"(id'nin önüne)anasayfadayken menü kısmının siyah olmasını sağladık.-->
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">HR BİLİŞİM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a
                            class="nav-link px-lg-3 py-3 py-lg-4 <?php //if($Sayfa == "Anasayfa") echo "active" 
                        //hangi sayfada olduğumza bağlı olarak yazının üstüne geldiğinde renginin öyle kalmasını sağladık?>"
                            href="index.php">Anasayfa</a></li>
                    <li class="nav-item"><a
                            class="nav-link px-lg-3 py-3 py-lg-4 <?php //if($Sayfa == "Hakkımızda") echo "active" ?>"
                            href="Hakkimizda.php">Hakkımızda</a></li>
                    <li class="nav-item"><a
                            class="nav-link px-lg-3 py-3 py-lg-4 <?php //if($Sayfa == "Gönderi") echo "active" ?>"
                            href="post.php">Sample Post</a></li>
                    <li class="nav-item"><a
                            class="nav-link px-lg-3 py-3 py-lg-4 <?php //if($Sayfa == "İletişim") echo "active" ?>"
                            href="Hizmetlerimiz.php">Hizmetlerimiz</a></li>
                    <li class="nav-item"><a
                            class="nav-link px-lg-3 py-3 py-lg-4 <?php //if($Sayfa == "İletişim") echo "active" ?>"
                            href="iletisim.php">İletişim</a></li>
					<li class="nav-item"><a
                            class="nav-link px-lg-3 py-3 py-lg-4 <?php //if($Sayfa == "İletişim") echo "active" ?>"
                            href="../admin/login.php">üye girişi</a></li>

                </ul>
            </div>
        </div>
    </nav>