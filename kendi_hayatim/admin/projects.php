<?php 

include 'config.php';
include 'functions.php';
loginControl();

include 'header.php'; 

if(isset($_GET['ID'])){
    $ID = intval($_GET['ID']);
    $ProjectsInfo = ProjectsFind($ID);
}

$lineProjectsList = ProjectsList();


?>

<section class="content">
    <div class="container-fluid">
        <?php if(isset($_GET['error']) && count($_GET['error']) > 0) { ?>

        <div class="alert alert-danger">
            <?php  foreach($_GET['error'] as $row){ print $row."<br>"; } ?>
        </div>

        <?php
            }
        ?>
        <div class="block-header">
            <h2>PROJE BİLGİLERİ</h2>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            PROJE BİLGİLERİ FORMU
                        </h2>
                    </div>
                    <div class="body">
                        <form enctype="multipart/form-data"
                            action="<?php if($ID > 0) echo 'projects_duzenle.php?ID='.$ID; else echo 'projects_ekle.php' ?>"
                            method="post" role="form">
                            <label for="">Resmi</label>
                            <div class="form-group form-group-lg">
                                <img height="150" src="../uploads/projects/<?php echo $ProjectsInfo['Images']; ?>">
                                <input type="file" class="form-control" name="Images">
                            </div>
                            <label for="">İsmi</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Name" placeholder="Proje İsmi Giriniz"
                                        value="<?php echo $ProjectsInfo['Name']; ?>">
                                </div>
                            </div>
                            <label for="">Linki</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Link" placeholder="Linki Giriniz"
                                        value="<?php echo $ProjectsInfo['Link']; ?>">
                                </div>
                            </div>
                            <label for="">Sayfa Yönlendirilme</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Target" style="max-width: 100%" class="form-control show-tick">
                                            <option value="_blank"
                                                <?php echo ($ProjectsInfo['Target'] == "_blank" ? "selected":"") ?>>Dış
                                                Link</option>
                                            <option value="_self"
                                                <?php echo ($ProjectsInfo['Target'] == "_self" ? "selected":"") ?>>İç
                                                Link
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label for="">Anasayfa'da Gösterilme Durumu</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Status" style="max-width: 100%" class="form-control show-tick">
                                            <option value="1"
                                                <?php echo ($ProjectsInfo['Status'] == 1 ? "selected":"") ?>>
                                                Aktif</option>
                                            <option value="0"
                                                <?php echo ($ProjectsInfo['Status'] == 0 ? "selected":"") ?>>
                                                Pasif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn bg-red btn-lg waves-effect"
                                name="<?php echo ($ID > 0 ? "guncelle":"ekle") ?>"><?php echo ($ID > 0 ? "GÜNCELLE":"EKLE") ?></button>
                        </form>
                        <?php 
                            foreach($error['errEmpty'] as $val){
                                print "<div class='alert alert-danger'>".$val."</div>";
                            }
                            ?>
                        <?php 
                            foreach($error['errOther'] as $val){
                                print "<div class='alert alert-warning'>".$val."</div>";
                            }
                            ?>
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
                            PROJE BİLGİLERİ TABLOSU
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>RESMİ</th>
                                    <th>İSMİ</th>
                                    <th>LİNK</th>
                                    <th>SAYFA YÖNLENDİRİLME</th>
                                    <th>ANASAYFA'DA GÖSTERİLME DURUMU</th>
                                    <th>İŞLEMLER</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach ($lineProjectsList as $row) { 
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td>
                                        <?php if ($row['Images'] != '') { ?>
                                        <img height="150" src="../uploads/projects/<?php echo $row['Images']; ?>">
                                        <?php } else {
                                                echo 'Resim Yok';
                                            } ?>
                                    </td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Link']; ?></td>
                                    <td class="center">
                                        <?php echo ($row['Target']=='_blank'?'<span class="label bg-green">Dış Link</span>':'<span class="label bg-red">İç Link</span>') ?>
                                    </td>
                                    <td class="center">
                                        <?php echo ($row['Status']==1?'<span class="label bg-green">Aktif</span>':'<span class="label bg-red">Pasif</span>') ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success" href="projects.php?ID=<?php echo $row['ID']; ?>">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            Düzenle
                                        </a>
                                        <a class="btn btn-danger" href="projects_sil.php?ID=<?php echo $row['ID']; ?>">
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