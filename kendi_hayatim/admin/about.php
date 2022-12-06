<?php 
$js_array = array();
 
include 'config.php';
include 'functions.php';
loginControl();

include 'header.php';

if(isset($_GET['ID'])){
    $ID = intval($_GET['ID']);
    $aboutInfo = aboutFind($ID);
}

$aboutList = aboutList();
$interestsList = interestsList();
$lineinterestedAboutList = interestedAboutList($ID);
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>HAKKIMDA BİLGİLERİ</h2>
        </div>
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            HAKKIMDA BİLGİLERİ FORMU
                        </h2>
                    </div>
                    <div class="body">
                        <form enctype="multipart/form-data"
                            action="<?php if($ID > 0) echo 'about_duzenle.php?ID='.$ID; else echo 'about_ekle.php' ?>"
                            method="post" role="form">
                            <label for="">Resmi</label>
                            <div class="form-group form-group-lg">
                                <img height="150" src="../uploads/about/<?php echo $aboutInfo['Images']; ?>">
                                <input type="file" class="form-control" name="Images">
                            </div>
                            <label for="">İsmi</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Name"
                                        placeholder="Hakkımda İsmi Giriniz" value="<?php echo $aboutInfo['Name']; ?>">
                                </div>
                            </div>
                            <label for="">İçerik (1. İçerik)</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Content1"
                                        placeholder="İçerik'i Giriniz" value="<?php echo $aboutInfo['Content1']; ?>">
                                </div>
                            </div>
                            <label for="">İçerik (2. İçerik)</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="Content2"
                                        placeholder="İçerik'i Giriniz"><?php echo $aboutInfo['Content2']; ?></textarea>
                                </div>
                            </div>
                            <label for="">Doğum Tarihi</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input id="example" type="text" class="form-control" name="Birthday"
                                        placeholder="Doğum Tarihi Giriniz" value="<?php echo $aboutInfo['Birthday']; ?>"
                                        autocomplete="off">
                                </div>
                            </div>
                            <label for="">Web</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Web" placeholder="Web Adresi Giriniz"
                                        value="<?php echo $aboutInfo['Web']; ?>">
                                </div>
                            </div>
                            <label for="">Adres</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Adress" placeholder="Adres Giriniz"
                                        value="<?php echo $aboutInfo['Adress']; ?>">
                                </div>
                            </div>
                            <label for="">Adres Linki</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Adress_Link"
                                        placeholder="Adres Linkini Giriniz"
                                        value="<?php echo $aboutInfo['Adress_Link']; ?>">
                                </div>
                            </div>
                            <label for="">Sayfa Yönlendirilme</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Target" style="max-width: 100%" class="form-control show-tick">
                                            <option value="_blank"
                                                <?php echo ($aboutInfo['Target'] == "_blank" ? "selected":"") ?>>Dış
                                                Link</option>
                                            <option value="_self"
                                                <?php echo ($aboutInfo['Target'] == "_self" ? "selected":"") ?>>İç Link
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <label for="">Telefon</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input class="form-control masked prefixed" type="tel"
                                        data-pattern="+**(***)-***-****" data-prefix="+90" name="Phone"
                                        placeholder="Telefon Numaranızı Giriniz"
                                        value="<?php echo $aboutInfo['Phone']; ?>">
                                </div>
                            </div>
                            <label for="">Şehir</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="City" placeholder="Şehir Giriniz"
                                        value="<?php echo $aboutInfo['City']; ?>">
                                </div>
                            </div>
                            <label for="">Yaş</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="number" class="form-control" name="Age" min="0" max="100"
                                        placeholder="Yaş Giriniz" value="<?php echo $aboutInfo['Age']; ?>">
                                </div>
                            </div>
                            <label for="">Derece</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="Degree" placeholder="Derece Giriniz"
                                        value="<?php echo $aboutInfo['Degree']; ?>">
                                </div>
                            </div>
                            <label for="">Mail</label>
                            <div class="form-group form-group-lg">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="Mail" autocomplete="off"
                                        placeholder="Mail Giriniz" value="<?php echo $aboutInfo['Mail']; ?>">
                                </div>
                            </div>
                            <label for="">Freelance Çalışma Durumu</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="Freelance" style="max-width: 100%" class="form-control show-tick">
                                            <option value="1"
                                                <?php echo ($aboutInfo['Freelance'] == 1 ? "selected":"") ?>>Evet
                                            </option>
                                            <option value="0"
                                                <?php echo ($aboutInfo['Freelance'] == 0 ? "selected":"") ?>>Hayır
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
                                            <option value="1" <?php echo ($aboutInfo['Status'] == 1 ? "selected":"") ?>>
                                                Aktif</option>
                                            <option value="0" <?php echo ($aboutInfo['Status'] == 0 ? "selected":"") ?>>
                                                Pasif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <label for="">İlgi Alanı</label>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <?php 

                                            foreach($interestsList as $val){
                                                if($ID > 0) 
                                                {
                                                    $ResA = $db->query("SELECT * FROM interestedabout WHERE AboutID=".$ID." AND InsterestedID = ".$val['ID']);
                                                    $count = $ResA->rowCount();
                                                }
                                                /*print "SELECT * FROM interestedabout WHERE AboutID=".$ID." AND InsterestedID = ".$val['ID']."<br>";*/
                                        ?>


                                        <div class="demo-switch-title"><?php echo $val['Name']; ?></div>
                                        <div class="switch">
                                            <label><input type="checkbox" name="ilgi[]"
                                                    <?php echo ($count > 0 ? "checked":""); ?>
                                                    value="<?php echo $val['ID']; ?>"><span
                                                    class="lever switch-col-red"></span></label>
                                        </div>
                                        <?php
                                            }
                                        ?>
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
                            HAKKIMDA BİLGİLERİ TABLOSU
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>RESMİ</th>
                                    <th>İSMİ</th>
                                    <th>WEB</th>
                                    <th>TELEFON</th>
                                    <th>ŞEHİR</th>
                                    <th>YAŞ</th>
                                    <th>DERECE / FREELANCE</th>
                                    <th>MAİL</th>
                                    <th>ANASAYFA'DA GÖSTERİLME DURUMU</th>
                                    <th>İŞLEMLER</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach ($aboutList as $row) { 
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td>
                                        <?php if ($row['Images'] != '') { ?>
                                        <img height="150" src="../uploads/about/<?php echo $row['Images']; ?>">
                                        <?php } else {
                                                echo 'Resim Yok';
                                            } ?>
                                    </td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Web']; ?></td>
                                    <td><?php echo $row['Phone']; ?></td>
                                    <td><?php echo $row['City']; ?></td>
                                    <td><?php echo $row['Age']; ?></td>
                                    <td><?php echo $row['Degree']; ?> -
                                        <?php echo ($row['Freelance']==1?'<span class="label bg-green">Evet</span>':'<span class="label bg-red">Hayır</span>') ?>
                                    </td>
                                    <td><?php echo $row['Mail']; ?></td>
                                    <td class="center">
                                        <?php echo ($row['Status']==1?'<span class="label bg-green">Aktif</span>':'<span class="label bg-red">Pasif</span>') ?>
                                    </td>
                                    <td class="center">
                                        <a class="btn btn-success" href="about.php?ID=<?php echo $row['ID']; ?>">
                                            <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                            Düzenle
                                        </a>
                                        <a class="btn btn-danger" href="about_sil.php?ID=<?php echo $row['ID']; ?>">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            Sil
                                        </a>
                                        <a class="btn btn-primary"
                                            href="about_images.php?AboutID=<?php echo $row['ID']; ?>">
                                            <i class="glyphicon glyphicon-picture icon-white"></i>
                                            Fotoğraflar
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

<script src="class/MCDatepicker/mc-calendar.min.js"></script>
<script src="class/input-phone-mask/input-mask.js"></script>

<script>
const myDatePicker = MCDatepicker.create({
    el: '#example',
    dateFormat: 'DD/MM/YYYY',
    bodyType: 'modal',
});
</script>

<?php include 'footer.php'; ?>