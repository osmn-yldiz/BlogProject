<?php 

include 'config.php';
include 'functions.php';
loginControl();

include 'header.php';

if(isset($_GET['ID'])){
    $ID = intval($_GET['ID']);
    $mainmenuInfo = mainmenuFind($ID);
}

$mainmenuList = mainmenuList();

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>MENÜ BİLGİLERİ</h2>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            MENÜ BİLGİLERİ FORMU
                        </h2>
                    </div>
                    <div class="body">
                        <form action="<?php if($ID > 0) echo 'menu_duzenle.php?ID='.$ID; else echo 'menu_ekle.php' ?>"
                            method="post" role="form">
                            <label for="">Menü Adı</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Name" placeholder="Menü Adı Giriniz"
                                        value="<?php echo $mainmenuInfo['Name']; ?>">
                                </div>
                            </div>
                            <label for="">Menü Linki</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Link"
                                        placeholder="Menü Linkini Giriniz" value="<?php echo $mainmenuInfo['Link']; ?>">
                                </div>
                            </div>
                            <label for="">Menü Sırası</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="number" min="1" max="10" class="form-control" name="OrderNumber"
                                        placeholder="Menü Sırasını Giriniz"
                                        value="<?php echo $mainmenuInfo['OrderNumber']; ?>">
                                </div>
                            </div>
                            <label for="">Anasayfa'da Gösterilme Durumu</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Status" style="max-width: 100%" class="form-control show-tick">
                                            <option value="1"
                                                <?php echo ($mainmenuInfo['Status'] == 1 ? "selected":"") ?>>Aktif
                                            </option>
                                            <option value="0"
                                                <?php echo ($mainmenuInfo['Status'] == 0 ? "selected":"") ?>>Pasif
                                            </option>
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
                            MENÜ BİLGİLERİ TABLOSU
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>MENÜ ADI</th>
                                    <th>MENÜ LİNKİ</th>
                                    <th>MENÜ SIRASI</th>
                                    <th>ANASAYFA'DA GÖSTERİLME DURUMU</th>
                                    <th>İŞLEMLER</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach ($mainmenuList as $row) { 
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Link']; ?></td>
                                    <td><?php echo $row['OrderNumber']; ?></td>
                                    <td class="center">
                                        <?php echo ($row['Status']==1?'<span class="label bg-green">Aktif</span>':'<span class="label bg-red">Pasif</span>') ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success" href="menu.php?ID=<?php echo $row['ID']; ?>">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            Düzenle
                                        </a>
                                        <a class="btn btn-danger" href="menu_sil.php?ID=<?php echo $row['ID']; ?>">
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