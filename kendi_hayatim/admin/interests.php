<?php 

include 'config.php';
include 'functions.php';
loginControl();

include 'header.php'; 

if(isset($_GET['ID'])){
    $ID = intval($_GET['ID']);
    $interestsInfo = interestsFind($ID);
}
$lineInterestsList = interestsList();
$lineinterestedAboutList = interestedAboutList($lineAboutList['ID']);

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>İLGİ ALANLARIM BİLGİLERİ</h2>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            İLGİ ALANLARIM BİLGİLERİ FORMU
                        </h2>
                    </div>
                    <div class="body">
                        <form action="interests_duzenle.php?ID='.<?php echo $interestsInfo['ID']; ?> " method="post"
                            role="form">
                            <label for="">İlgi Alanlarım</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Name"
                                        placeholder="İlgi Alanınızı Giriniz"
                                        value="<?php echo $interestsInfo['Name']; ?>">
                                </div>
                            </div>
                            <label for="">Anasayfa'da Gösterilme Durumu</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Status" style="max-width: 100%" class="form-control show-tick">
                                            <option value="1"
                                                <?php echo ($interestsInfo['Status'] == 1 ? "selected":"") ?>>Aktif
                                            </option>
                                            <option value="0"
                                                <?php echo ($interestsInfo['Status'] == 0 ? "selected":"") ?>>Pasif
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn bg-red btn-lg waves-effect"
                                name="<?php echo "guncelle" ?>"><?php echo "GÜNCELLE" ?></button>
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
                            İLGİ ALANLARIM TABLOSU
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>İLGİ ALANLARIM</th>
                                    <th>ANASAYFA'DA GÖSTERİLME DURUMU</th>
                                    <th>İŞLEMLER</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach ($lineInterestsList as $row) { 
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td class="center">
                                        <?php echo ($row['Status']==1?'<span class="label bg-green">Aktif</span>':'<span class="label bg-red">Pasif</span>') ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success"
                                            href="interests.php?ID=<?php echo $row['ID']; ?>&AboutID=<?php echo $row['AboutID']; ?>">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            Düzenle
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