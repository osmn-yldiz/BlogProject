<?php 

include 'config.php';
include 'functions.php';
loginControl();

include 'header.php'; 

if(isset($_GET['ID'])){
    $ID = intval($_GET['ID']);
    $homeInfo = homeFind($ID);
}

$homeList = homeList();

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>ANASAYFA BİLGİLERİ</h2>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ANASAYFA BİLGİLERİ FORMU
                        </h2>
                    </div>
                    <div class="body">
                        <form action="<?php if($ID > 0) echo 'home_duzenle.php?ID='.$ID; else echo 'home_ekle.php' ?>"
                            method="post" role="form">
                            <label for="">Başlık</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Header" placeholder="Başlık Giriniz"
                                        value="<?php echo $homeInfo['Header']; ?>">
                                </div>
                            </div>
                            <label for="">Başlık'ın Linki</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Header_Link"
                                        placeholder="Başlık'ın Linkini Giriniz"
                                        value="<?php echo $homeInfo['Header_Link']; ?>">
                                </div>
                            </div>
                            <label for="">İçerik</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Content"
                                        placeholder="İçerik'i Giriniz" value="<?php echo $homeInfo['Content']; ?>">
                                </div>
                            </div>
                            <label for="">Altı Çizgili İçerik</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Content_underline"
                                        placeholder="Altı Çizgili İçerik'i Giriniz"
                                        value="<?php echo $homeInfo['Content_underline']; ?>">
                                </div>
                            </div>
                            <label for="">Anasayfa'da Gösterilme Durumu</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Status" style="max-width: 100%" class="form-control show-tick">
                                            <option value="1" <?php echo ($homeInfo['Status'] == 1 ? "selected":"") ?>>
                                                Aktif</option>
                                            <option value="0" <?php echo ($homeInfo['Status'] == 0 ? "selected":"") ?>>
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
        <!-- #END# Vertical Layout -->
        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            ANASAYFA BİLGİLERİ TABLOSU
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>BAŞLIK</th>
                                    <th>BAŞLIK'IN LİNKİ</th>
                                    <th>İÇERİK</th>
                                    <th>ALTI ÇİZGİLİ İÇERİK</th>
                                    <th>ANASAYFA'DA GÖSTERİLME DURUMU</th>
                                    <th>İŞLEMLER</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach ($homeList as $row) { 
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row['Header']; ?></td>
                                    <td><?php echo $row['Header_Link']; ?></td>
                                    <td><?php echo $row['Content']; ?></td>
                                    <td><?php echo $row['Content_underline']; ?></td>
                                    <td class="center">
                                        <?php echo ($row['Status']==1?'<span class="label bg-green">Aktif</span>':'<span class="label bg-red">Pasif</span>') ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success" href="home.php?ID=<?php echo $row['ID']; ?>">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            Düzenle
                                        </a>
                                        <a class="btn btn-danger" href="home_sil.php?ID=<?php echo $row['ID']; ?>">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Sil
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    $i++;
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Hover Rows -->
    </div>
</section>

<?php include 'footer.php'; ?>