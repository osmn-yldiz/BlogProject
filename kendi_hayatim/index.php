<?php 

include 'config.php';
include 'functions.php';
include 'header.php';

if($_GET['SeoName']== ""){
  header("location:cv/osman-yildiz");
  exit;
}

$lineSocialMediaList = SocialMediaList();
$lineAboutList = aboutList($_GET['SeoName']); 
$lineAboutImages = aboutImages($lineAboutList['ID']);
$lineSkillList = SkillList();
$lineProjectsList = projectsList();
$lineInterestsList = interestsList();
$lineinterestedAboutList = interestedAboutList($lineAboutList['ID']);
$lineinterestsArrayList = interestsArrayList();
$Name = $lineinterestsArrayList[0];
$Icon = $lineinterestsArrayList[1];
$Color = $lineinterestsArrayList[2];

if (isset($_POST['gonder'])) {

    if($_SESSION['csrf_token'] == $_POST['csrf_token']){
        $errOther = array();
        $errEmpty = array();

        if ($_POST['name'] == '') {
            $errEmpty[]  = "Adınız Soyadınız";
        }
        if ($_POST['email'] == '') {
            $errEmpty[]  = "Mail Adresiniz";
        }
        if ($_POST['subject'] == '') {
            $errEmpty[]  = "Konu";
        }
        if ($_POST['message'] == '') {
            $errEmpty[]  = "Mesajınız";
        }

        if(strlen($_POST['name']) < 3){
            $errOther[] = "Adınız Soyadınız alanı en en 3 karakter olmalı";
        }

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
          $errOther[] = "Düzgün bir mail adresi giriniz";
      }
      if(count($errOther) == 0 && count($errEmpty) == 0) {
        $gidecek_mail = "osmann_yldz7878@hotmail.com";
        $subject = "Web sitesinin iletişim bölümünden mesaj geldi";
        $message = "<table>
        <tr>
            <td>Adınız Soyadınız:</td>
            <td>".$_POST['name']."</td>
        </tr>
        <tr>
            <td>Email Adresi:</td>
            <td>".$_POST['email']."</td>
        </tr>
        <tr>
            <td>Konu:</td>
            <td>".$_POST['subject']."</td>
        </tr>
        <tr>
            <td>Mesajınız:</td>
            <td>".$_POST['message']."</td>
        </tr>
    </table>";
        $send_mail = mailSend($gidecek_mail, $subject, $message);
        if($send_mail){
         $return =  ContactAdd($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message']);
         if($return){
           $success_message = "Mesajınız başarılı bir şekilde gönderilmiştir.";
       }else{
           $error_message = "Mesajınız başarılı bir şekilde gönderilmiştir. Veritabanına kaydedilemedi.";
       }
       
   }
   else
   {
    $error_message = "Lütfen bir hata oluştu daha sonra tekrar deneyiniz.";
}
}

}else{
    //print "csrf_token error.!!!";
}

}

$_SESSION['csrf_token'] = md5(generateRandomString());

?>

<!-- ======= About Section ======= -->
<section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

        <div class="section-title">
            <h2>Hakkımda</h2>
            <p>Hakkımda daha fazla bilgi edin</p>
        </div>

        <div class="row">
            <div class="col-lg-4" data-aos="fade-right">

                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner border border-success">

                        <?php foreach ($lineAboutImages as $row) { ?>

                        <div class="carousel-item <?php echo $row['ID'] == 1 ? "active" : ""; ?>">
                            <img src="thumbnail.php?Dir=about&Thumbwidth=402&thumb=<?php echo $row['Images']; ?>"
                                class="d-block w-100 rounded-0" alt="<?php echo $row['Name']; ?>">
                        </div>

                        <?php } ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>

                </div>

                <!--<img src="assets/img/me1.jpg" class="img-fluid" alt="">-->
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                <h3>Web Geliştirici</h3>
                <p class="fst-italic">
                    <?php echo $lineAboutList['Content1']; ?>
                </p>
                <div class="row">
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Doğum Günü:</strong>
                                <span><?php echo $lineAboutList['Birthday']; ?></span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><a
                                        href="http://<?php echo $lineAboutList['Web']; ?>"
                                        target="<?php echo $lineAboutList['Target']; ?>"><?php echo $lineAboutList['Web']; ?></a></span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Telefon:</strong> <span><a
                                        href="tel:<?php echo $lineAboutList['Phone']; ?>"><?php echo $lineAboutList['Phone']; ?></a></span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Şehir:</strong>
                                <span><?php echo $lineAboutList['City']; ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Yaş:</strong>
                                <span><?php echo $lineAboutList['Age']; ?></span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Derece:</strong>
                                <span><?php echo $lineAboutList['Degree']; ?></span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>E-posta:</strong> <span><a
                                        href="mailto:<?php echo $lineAboutList['Mail']; ?>"><?php echo $lineAboutList['Mail']; ?></a></span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                <span><?php echo $lineAboutList['Freelance'] == 1 ? "Evet" : "Hayır"; ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <p>
                    <?php echo $lineAboutList['Content2']; ?>
                </p>
            </div>
        </div>

    </div><!-- End About Me -->

    <!-- ======= Skills  ======= -->
    <div class="skills container">

        <div class="section-title">
            <h2>Yeteneklerim</h2>
        </div>

        <div class="row skills-content">

            <div class="row">

                <?php foreach ($lineSkillList as $row) { ?>

                <div class="progress col-lg-4">
                    <span class="skill"><?php echo $row['Name']; ?> <i
                            class="val"><?php echo $row['Value']; ?>%</i></span>
                    <div class="progress-bar-wrap">
                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $row['Value']; ?>"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <?php } ?>

            </div>
            <!--
      <div class="col-lg-6">

        <div class="progress">
          <span class="skill">CSS <i class="val">100%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">PHP <i class="val">80%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">MySQL <i class="val">75%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

        <div class="progress">
          <span class="skill">Microsoft Office <i class="val">90%</i></span>
          <div class="progress-bar-wrap">
            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
        </div>

      </div>
    -->
        </div>

    </div><!-- End Skills -->

    <!-- ======= Interests ======= -->
    <div class="interests container">

        <div class="section-title">
            <h2>İlgi Alanlarım</h2>
        </div>

        <div class="row">

            <?php foreach($lineinterestedAboutList as $row) { ?>

            <div class="col-lg-3 col-md-4">
                <div class="icon-box">
                    <i class="<?php echo $Icon[$row['InsterestedID']]; ?>"
                        style="color: <?php echo $Color[$row['InsterestedID']]; ?>;"></i>
                    <h3><?php echo $Name[$row['InsterestedID']]; ?></h3>
                </div>
            </div>

            <?php } ?>

        </div>

    </div><!-- End Interests -->

</section><!-- End About Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Portfolyo</h2>
            <p>Yaptığım Projeler</p>
        </div>

        <div class="row portfolio-container">

            <?php foreach($lineProjectsList as $row) { ?>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="thumbnail.php?Dir=projects&Thumbwidth=404&thumb=<?php echo $row['Images']; ?>"
                        class="img-fluid" alt="<?php echo $row['Name']; ?>">
                    <div class="portfolio-info">
                        <a href="<?php echo $row['Link']; ?>" target="<?php echo $row['Target']; ?>">
                            <h4><?php echo $row['Name']; ?></h4>
                        </a>
                        <div class="portfolio-links">
                            <a href="thumbnail1.php?Thumbwidth=800&thumb=<?php echo $row['Images']; ?>"
                                data-gallery="portfolioGallery" class="portfolio-lightbox"
                                title="<?php echo $row['Name']; ?>"><i class="bx bx-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>

    </div>
</section><!-- End Portfolio Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>İletişim</h2>
            <p>Bana Ulaşın</p>
        </div>

        <div class="row mt-2">

            <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-share-alt"></i>
                    <h3>Sosyal Medya</h3>
                    <div class="social-links">
                        <?php foreach ($lineSocialMediaList as $row) { ?>
                        <a href="<?php echo $row['Link']; ?>" target="<?php echo $row['Target']; ?>"
                            class="<?php echo $row['Name']; ?>"><i class="<?php echo $row['Icon']; ?>"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Adres</h3>
                    <a href="<?php echo $lineAboutList['Adress_Link']; ?>"
                        target="<?php echo $lineAboutList['Target']; ?>">
                        <p><?php echo $lineAboutList['Adress']; ?></p>
                    </a>
                </div>
            </div>

            <div class="col-md-6 mt-4 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-envelope"></i>
                    <h3>E-posta</h3>
                    <a href="mailto:<?php echo $lineAboutList['Mail']; ?>">
                        <p><?php echo $lineAboutList['Mail']; ?></p>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mt-4 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-phone-call"></i>
                    <h3>Telefon</h3>
                    <a href="tel:<?php echo $lineAboutList['Phone']; ?>">
                        <p><?php echo $lineAboutList['Phone']; ?></p>
                    </a>
                </div>
            </div>
        </div>

        <form id="php-email-form" action="cv/<?php echo $_GET['SeoName']; ?>" method="post" role="form" ">
            <div class=" row">
            <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Ad Soyad" autocomplete="off"
                    required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="E-posta Adresiniz"
                    autocomplete="off" required>
            </div>
    </div>
    <div class="form-group mt-3">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Konu" autocomplete="off"
            required>
    </div>
    <div class="form-group mt-3">
        <textarea class="form-control" name="message" rows="5" placeholder="Mesaj" autocomplete="off"
            required></textarea>
    </div>
    <div class="my-3">
        <!-- <div class="loading">Yükleniyor</div> -->
        <?php 
                        if(count($errEmpty) > 0){
                            ?>
        <div class="alert alert-danger">Lütfen alanları doldurunuz:<?php print implode(", ", $errEmpty); ?>
        </div>
        <?php
                        }
                        ?>
        <?php 
                        if(count($errOther) > 0){
                            print "<ul class='alert alert-danger pl-3'>";
                            foreach ($errOther as $value) {
                                ?>
        <li style="list-style-type: circle;"><?php print $value; ?></li>
        <?php
                            }
                            print "</ul>";
                        }
                        ?>
        <?php if(isset($success_message)) { ?>
        <div class="alert alert-success"><?php echo $success_message ?></div>
        <?php } ?>
        <?php if(isset($error_message)) { ?>
        <div class="alert alert-danger"><?php echo $error_message ?></div>
        <?php } ?>
    </div>
    <input type="hidden" name="csrf_token" value="<?php print $_SESSION['csrf_token'] ?>">
    <div class="text-center"><input type="submit" name="gonder" value="Gönder"></div>
    </form>

    </div>
</section><!-- End Contact Section -->

<?php include 'footer.php'; ?>