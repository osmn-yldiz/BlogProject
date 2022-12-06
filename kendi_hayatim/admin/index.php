    <?php
    
    include 'config.php';
    include 'functions.php';
    loginControl();

    include 'header.php'; 

    $lineMainMenuCountList = count(mainmenuList());
    $lineAboutSingleList = aboutSingleList();
    $lineInterestedAboutCountList = count(interestedAboutList($lineAboutSingleList['ID']));
    $lineSkillList = count(skillList());
    $lineProjectsCountList = count(ProjectsList());

    $mainmenuList = mainmenuList();
    $skillList = skillList();
    
    ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ANASAYFA</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">menu</i>
                        </div>
                        <div class="content">
                            <div class="text">MENÜ SAYISI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $lineMainMenuCountList; ?>"
                                data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">favorite</i>
                        </div>
                        <div class="content">
                            <div class="text">İLGİ ALAN SAYISI</div>
                            <div class="number count-to" data-from="0"
                                data-to="<?php echo $lineInterestedAboutCountList; ?>" data-speed="1000"
                                data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">directions_run</i>
                        </div>
                        <div class="content">
                            <div class="text">YETENEK SAYISI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $lineSkillList; ?>"
                                data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">library_books</i>
                        </div>
                        <div class="content">
                            <div class="text">PROJE SAYISI</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $lineProjectsCountList; ?>"
                                data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>MENÜ BİLGİLERİ</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Menü Adı</th>
                                            <th>Menü Linki</th>
                                            <th>Menü Sırası</th>
                                            <th>Anasayfa'da Gösterilme Durumu</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $i=1;
                                            foreach ($mainmenuList as $row) { 
                                        ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td><?php echo $row['Link']; ?></td>
                                            <td><?php echo $row['OrderNumber']; ?></td>
                                            <td>
                                                <?php echo ($row['Status']==1?'<span class="label bg-green">Aktif</span>':'<span class="label bg-red">Pasif</span>') ?>
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
                <!-- #END# Task Info -->
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h2>YETENEK BİLGİLERİ</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Yetenek Adı</th>
                                            <th>Yetenek Değeri</th>
                                            <th>Anasayfa'da Gösterilme Durumu</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            $i=1;
                                            foreach ($skillList as $row) { 
                                        ?>

                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['Name']; ?></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar"
                                                        aria-valuenow="<?php echo $row['Value']; ?>" aria-valuemin="0"
                                                        aria-valuemax="100"
                                                        style="width: <?php echo $row['Value']; ?>%"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo ($row['Status']==1?'<span class="label bg-green">Aktif</span>':'<span class="label bg-red">Pasif</span>') ?>
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
                <!-- #END# Task Info -->
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>