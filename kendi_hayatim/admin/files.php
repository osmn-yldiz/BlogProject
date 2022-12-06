<?php 

include 'config.php';
include 'functions.php';
loginControl();

include 'header.php';

if(isset($_GET['ID'])){
    $ID = intval($_GET['ID']);
    $mainmenuInfo = mainmenuFind($ID);
}

$FilesList = FilesList();

?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DOSYA BİLGİLERİ</h2>
        </div>
        <!-- Hover Rows -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            DOSYA BİLGİLERİ TABLOSU
                        </h2>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-hover table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>DOSYA ADI</th>
                                    <th>DOSYA LİNKİ</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php 
                                $i=1;
                                foreach ($FilesList as $row) { 
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><a
                                            href="../uploads/files/<?php echo $row['FileName']; ?>"><?php echo $row['FileName']; ?></a>
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