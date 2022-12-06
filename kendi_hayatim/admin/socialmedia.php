<?php 

include 'config.php';
include 'functions.php';
loginControl();

include 'header.php'; 

if(isset($_GET['ID'])){
    $ID = intval($_GET['ID']);
    $socialmediaInfo = socialmediaFind($ID);
}

$socialmediaList = socialmediaList();

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>SOSYAL MEDYA BİLGİLERİ</h2>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            SOSYAL MEDYA BİLGİLERİ FORMU
                        </h2>
                    </div>
                    <div class="body">
                        <form action="socialmedia_duzenle.php?ID=<?php echo $socialmediaInfo['ID']; ?>" method="post"
                            role="form">
                            <label for="">Sosyal Medya İsmi</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Name"
                                        placeholder="Sosyal Medya İsmi Giriniz"
                                        value="<?php echo $socialmediaInfo['Name']; ?>">
                                </div>
                            </div>
                            <label for="">Sosyal Medya Linki</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Link"
                                        placeholder="Sosyal Medya Linkini Giriniz"
                                        value="<?php echo $socialmediaInfo['Link']; ?>">
                                </div>
                            </div>
                            <label for="">Sosyal Medya İcon'u</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Icon" style="max-width: 100%" class="form-control show-tick">
                                            <option value="bi bi-twitter"
                                                <?php echo ($socialmediaInfo['Icon'] == 'bi bi-twitter' ? "selected":"") ?>>
                                                Twitter</option>
                                            <option value="bi bi-facebook"
                                                <?php echo ($socialmediaInfo['Icon'] == 'bi bi-facebook' ? "selected":"") ?>>
                                                Facebook</option>
                                            <option value="bi bi-linkedin"
                                                <?php echo ($socialmediaInfo['Icon'] == 'bi bi-linkedin' ? "selected":"") ?>>
                                                Linkedin</option>
                                            <option value="bi bi-instagram"
                                                <?php echo ($socialmediaInfo['Icon'] == 'bi bi-instagram' ? "selected":"") ?>>
                                                Instagram</option>
                                            <option value="bi bi-github"
                                                <?php echo ($socialmediaInfo['Icon'] == 'bi bi-github' ? "selected":"") ?>>
                                                Github</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label for="">Sosyal Medya Yönlendirilmesi</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Target" style="max-width: 100%" class="form-control show-tick">
                                            <option value="_self"
                                                <?php echo ($socialmediaInfo['Target'] == '_self' ? "selected":"") ?>>İç
                                                Link</option>
                                            <option value="_blank"
                                                <?php echo ($socialmediaInfo['Target'] == '_blank' ? "selected":"") ?>>
                                                Dış Link</option>
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
                                                <?php echo ($socialmediaInfo['Status'] == 1 ? "selected":"") ?>>Aktif
                                            </option>
                                            <option value="0"
                                                <?php echo ($socialmediaInfo['Status'] == 0 ? "selected":"") ?>>Pasif
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <button type="submit" class="btn bg-red btn-lg waves-effect"
                                name="<?php echo "guncelle"; ?>"><?php echo "GÜNCELLE"; ?></button>
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
                            SOSYAL MEDYA BİLGİLERİ TABLOSU
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SOSYAL MEDYA İSMİ</th>
                                    <th>SOSYAL MEDYA LİNKİ</th>
                                    <th>SOSYAL MEDYA İCON'U</th>
                                    <th>SOSYAL MEDYA YÖNLENDİRİLMESİ</th>
                                    <th>ANASAYFA'DA GÖSTERİLME DURUMU</th>
                                    <th>İŞLEMLER</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach ($socialmediaList as $row) { 
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Link']; ?></td>
                                    <td class="center">
                                        <?php if($row['Icon'] == 'bi bi-twitter') { ?>
                                        <span class="label bg-light-blue">Twitter</span>
                                        <?php } else if($row['Icon'] == 'bi bi-facebook') { ?>
                                        <span class="label bg-blue">Facebook</span>
                                        <?php } else if($row['Icon'] == 'bi bi-linkedin') { ?>
                                        <span class="label bg-indigo">Linkedin</span>
                                        <?php } else if($row['Icon'] == 'bi bi-instagram') { ?>
                                        <span class="label bg-pink">Instagram</span>
                                        <?php } else if($row['Icon'] == 'bi bi-github') { ?>
                                        <span class="label bg-black">Github</span>
                                        <?php } ?>
                                    </td>
                                    <td class="center">
                                        <?php echo ($row['Target']=='_blank'?'<span class="label bg-green">Dış Link</span>':'<span class="label bg-red">İç Link</span>') ?>
                                    </td>
                                    <td class="center">
                                        <?php echo ($row['Status']==1?'<span class="label bg-green">Aktif</span>':'<span class="label bg-red">Pasif</span>') ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success" href="socialmedia.php?ID=<?php echo $row['ID']; ?>">
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