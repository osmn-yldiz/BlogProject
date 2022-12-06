<?php 


$js_array = array("plugins/light-gallery/js/lightgallery-all.js");

include 'config.php';
include 'functions.php';
loginControl();

include 'header.php';

$ID = intval($_GET['ID']);

$lineaboutimagesList = aboutimagesList($_GET['AboutID']);
$lineaboutimagesFind = aboutimagesFind($_GET['ID']);

?>

<section class="content">
    <div class="container-fluid">
        <!-- Image Gallery -->
        <div class="block-header">
            <h2>
                RESİM GALERİSİ
            </h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            GALERİ
                        </h2>
                    </div>
                    <div class="body">
                        <div id="" class="list-unstyled row clearfix">

                            <?php foreach ($lineaboutimagesList as $row) { ?>

                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <a href="../uploads/about/<?php echo $row['Images']; ?>"
                                    data-sub-html="<?php echo $row['Name']; ?>"><img class="img-responsive thumbnail"
                                        src="../uploads/about/<?php echo $row['Images']; ?>">
                                </a>
                                <a class="btn btn-success btn-block btn-sm waves-effect"
                                    href="about_images.php?ID=<?php echo $row['ID']; ?>&AboutID=<?php echo $_GET['AboutID']; ?>">
                                    <i class="material-icons">mode_edit</i>
                                    <span>DÜZENLE</span>
                                </a>
                                <a href="about_images_sil.php?ID=<?php echo $row['ID']; ?>"
                                    class="btn btn-danger btn-block btn-sm waves-effect">
                                    <i class="material-icons">delete</i>
                                    <span>SİL</span>
                                </a>
                            </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            RESİM GALERİSİ FORMU
                        </h2>
                    </div>
                    <div class="body">
                        <form enctype="multipart/form-data"
                            action="<?php if($ID > 0) echo 'about_images_duzenle.php?ID='.$ID.'&AboutID='.$_GET['AboutID']; else echo 'about_images_ekle.php?AboutID='.$_GET['AboutID']; ?>"
                            method="post" role="form">
                            <label for="">Resmi</label>
                            <div class="form-group form-group-lg">
                                <img height="150" src="../uploads/about/<?php echo $lineaboutimagesFind['Images']; ?>">
                                <input type="file" class="form-control" name="Images">
                            </div>
                            <label for="">İsmi</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Name"
                                        placeholder="Hakkımda Resim İsmi Giriniz"
                                        value="<?php echo $lineaboutimagesFind['Name']; ?>">
                                </div>
                            </div>
                            <label for="">Anasayfa'da Gösterilme Durumu</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Status" style="max-width: 100%" class="form-control show-tick">
                                            <option value="1"
                                                <?php echo ($lineaboutimagesFind['Status'] == 1 ? "selected":"") ?>>
                                                Aktif</option>
                                            <option value="0"
                                                <?php echo ($lineaboutimagesFind['Status'] == 0 ? "selected":"") ?>>
                                                Pasif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn bg-red btn-lg waves-effect"
                                name="<?php echo ($ID > 0 ? "guncelle":"ekle") ?>"><?php echo ($ID > 0 ? "GÜNCELLE":"EKLE") ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>