<?php  

$HomeInfo = HomeList();
$mainMenuList = mainMenuList();
$lineSocialMediaList = SocialMediaList();

?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Osman Yıldız</title>
    <meta name="title" content="Osman Yıldız">
    <meta name="description" content="Osman Yıldız Kişisel Web Sitesi">
    <meta name="keywords" content="osman, yıldız, web, site, yazılım, developer, design, fornt-end, back-end">
    <meta name="robots" content="index, follow">
    <meta name="author" content="Osman Yıldız">

    <base href="<?php echo $URL; ?>">

    <!-- Favicons -->
    <link href="uploads/icon/favicon.png" rel="icon">
    <link href="uploads/icon/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Personal - v4.3.0
  * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container">

            <h1><a href="<?php echo $HomeInfo['Header_Link']; ?>"><?php echo $HomeInfo['Header']; ?></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
            <h2><?php echo $HomeInfo['Content']; ?> <span><?php echo $HomeInfo['Content_underline']; ?></span></h2>

            <nav id="navbar" class="navbar">
                <ul>
                    <?php foreach ($mainMenuList as $menuList) { ?>
                    <li><a class="nav-link <?php echo ($menuList['Link']=='#header')?'active':'';?>"
                            href="<?php echo $menuList['Link']; ?>"><?php echo $menuList['Name']; ?></a></li>
                    <?php } ?>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <div class="social-links">
                <?php foreach ($lineSocialMediaList as $row) { ?>
                <a href="<?php echo $row['Link']; ?>" target="<?php echo $row['Target']; ?>"
                    class="<?php echo $row['Name']; ?>"><i class="<?php echo $row['Icon']; ?>"></i></a>
                <?php } ?>
            </div>

        </div>
    </header><!-- End Header -->