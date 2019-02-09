<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNSRI | Kuesioner</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css')?>" rel="stylesheet">
    <style type="text/css">
        h1, h2, h3 {
            text-align: center;
            font-weight: bold;
        }

        table {
            text-align: center;
        }
    </style>
</head>

<body class="skin-3">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" width="48" height="48" src="<?php echo base_url('assets/img/avatar.png')?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('nama_siswa') ?></strong></a>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="#"><center><strong><span class="nav-label">Daftar Menu</span></strong></center></a>
                </li>
                <li>
                    <a href="<?php echo site_url('profil_siswa')?>"><i class="fa fa-user"></i> <span class="nav-label">Profil</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url('kuesioner')?>"><i class="fa fa-clipboard"></i> <span class="nav-label">Kuesioner</span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('promethee')?>"><i class="fa fa-pencil-square"></i> <span class="nav-label">Hasil Rekomendasi</span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('login/logout')?>"><i class="fa fa-sign-out"></i> <span class="nav-label">Log out</span></a>
                </li>
            </ul>

        </div>
    </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Selamat Datang, <?php echo $this->session->userdata('nama_siswa') ?></span>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout')?>">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            if($this->session->flashdata('hasil')) {
                              echo $this->session->flashdata('hasil');
                            }
                        ?>
                        <div
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Form Kuesioner</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('kuesioner/simpan')?>" method="post">
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <h2 class="text-center"><strong>Minat</strong></h2>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-1 text-center">No.</label>
                                            <label class="col-lg-6 text-center">Pertanyaan</label>
                                            <label class="col-sm-4 text-center">Bobot Nilai</label>
                                        </div>
                                        <?php $no = 1; if($minat != NULL) foreach($minat as $key => $m) { ?>
                                        <div class="form-group">
                                            <label class="col-lg-1 text-center"><?php echo $no; ?></label>
                                            <label class="col-lg-6">Apakah anda setuju jika bidang "<?php echo $m['nama_minat'] ?>" menjadi bahan pertimbangan Anda dalam memilih Program Studi?</label>
                                            <div class="col-lg-5">
                                                <div class="radio text-center">
                                                    <label class="col-sm-2">
                                                        <input name="minat[<?php echo $key ?>]" value="1" <?php if($m['nilai_minat'] == 1){ echo 'checked="checked"'; } ?> type="radio">1
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input name="minat[<?php echo $key ?>]" value="2" <?php if($m['nilai_minat'] == 2){ echo 'checked="checked"'; } ?> type="radio">2
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input name="minat[<?php echo $key ?>]" value="3" <?php if($m['nilai_minat'] == 3){ echo ' checked="checked"'; } ?> type="radio">3
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input name="minat[<?php echo $key ?>]" value="4" <?php if($m['nilai_minat'] == 4){ echo 'checked="checked"'; } ?> type="radio">4
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input name="minat[<?php echo $key ?>]" value="5" <?php if($m['nilai_minat'] == 5){ echo 'checked="checked"'; } ?> type="radio">5
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no++; } ?>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <h2 class="text-center"><strong>Cita-Cita</strong></h2>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-1 text-center">No.</label>
                                            <label class="col-lg-6 text-center">Pertanyaan</label>
                                            <label class="col-sm-4 text-center">Bobot Nilai</label>
                                        </div>
                                        <?php $no = 1; if($nilai_cita_cita != NULL) foreach($nilai_cita_cita as $key => $m) { ?>
                                        <div class="form-group">
                                            <label class="col-lg-1 text-center"><?php echo $no; ?></label>
                                            <label class="col-lg-6">Apakah anda setuju jika cita-cita "<?php echo $m['nama_cita_cita'] ?>" menjadi bahan pertimbangan Anda dalam memilih Program Studi?</label>
                                            <div class="col-lg-5">
                                                <div class="radio text-center">
                                                    <label class="col-sm-2">
                                                        <input name="cita_cita[<?php echo $key ?>]" value="1" <?php if($m['nilai_cita_cita'] == 1){ echo 'checked="checked"'; } ?> type="radio">1
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input name="cita_cita[<?php echo $key ?>]" value="2" <?php if($m['nilai_cita_cita'] == 2){ echo 'checked="checked"'; } ?> type="radio">2
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input name="cita_cita[<?php echo $key ?>]" value="3" <?php if($m['nilai_cita_cita'] == 3){ echo ' checked="checked"'; } ?> type="radio">3
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input name="cita_cita[<?php echo $key ?>]" value="4" <?php if($m['nilai_cita_cita'] == 4){ echo 'checked="checked"'; } ?> type="radio">4
                                                    </label>
                                                    <label class="col-sm-2">
                                                        <input name="cita_cita[<?php echo $key ?>]" value="5" <?php if($m['nilai_cita_cita'] == 5){ echo 'checked="checked"'; } ?> type="radio">5
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $no++; } ?>
                                        <br>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <h2 class="text-center"><strong>Mata Pelajaran</strong></h2>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-offset-4 col-lg-1 text-center">No. </label>
                                            <label class="col-lg-1 text-center">Mata Pelajaran</label>
                                            <label class="col-lg-2 text-center">Nilai Akademik</label>
                                        </div>
                                        <?php $no = 1; if($nilai_pelajaran != NULL) foreach($nilai_pelajaran as $mp) { ?>
                                        <div class="form-group">
                                            <label class="col-lg-offset-4 col-lg-1 text-center"><?php echo $no; ?></label>
                                            <label class="col-lg-1 text-center"><?php echo $mp['nama_pelajaran']; ?></label>
                                            <div class="col-lg-2">
                                                <input type="number" min="0" max="100" name="pelajaran[]" placeholder="Nilai <?php echo $mp['nama_pelajaran'] ?>" class="form-control" value="<?php echo $mp['nilai_pelajaran'] ?>">
                                            </div>
                                        </div>
                                        <?php $no++; } ?>
                                        <div class="form-group">
                                            <div class="col-lg-offset-8 col-lg-4">
                                                <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                                <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="pull-right">
                    <strong>{elapsed_time} detik</strong>
                </div>
                <div>
                    <strong>Copyright</strong> UNSRI &copy; 2017
                </div>
            </div>

        </div>
        </div>



     <!-- Mainly scripts -->
    <script src="<?php echo base_url('assets/js/jquery-2.1.1.js')?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>

</body>

</html>
