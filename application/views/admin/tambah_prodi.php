<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNSRI | Tambah Prodi</title>

    <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css')?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/css/animate.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/plugins/dataTables/datatables.min.css')?>" rel="stylesheet">
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
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata('username') ?></strong></a>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="#"><center><strong><span class="nav-label">Daftar Menu</span></strong></center></a>
                </li>
                <li>
                    <a href="<?php echo site_url('daftar_kriteria')?>"><i class="fa fa-tasks"></i> <span class="nav-label">Kriteria</span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('daftar_siswa')?>"><i class="fa fa-users"></i> <span class="nav-label">Daftar Siswa</span></a>
                </li>
                <li class="active">
                    <a href="<?php echo site_url('daftar_prodi')?>"><i class="fa fa-university"></i> <span class="nav-label">Daftar Prodi</span></a>
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
                            <span class="m-r-sm text-muted welcome-message">Selamat Datang, <?php echo $this->session->userdata('username') ?></span>
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
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Form Tambah Program Studi</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_prodi/tambah_prodi_form')?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Program Studi :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="nama_prodi" placeholder="Nama Program Studi" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Akreditasi :</label>
                                            <div class="col-lg-9">
                                                <select name="id_akreditasi" class="form-control">
                                                    <?php if($akreditasi != NULL) foreach($akreditasi as $a){ ?>
                                                    <option value="<?php echo $a['id_akreditasi'] ?>"><?php echo $a['nama_akreditasi']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Prioritas Nilai :</label>
                                            <div class="col-lg-9">
                                                <select name="id_pelajaran" class="form-control">
                                                    <?php if($mata_pelajaran != NULL) foreach($mata_pelajaran as $mp){ ?>
                                                    <option value="<?php echo $mp['id_pelajaran'] ?>"><?php echo $mp['nama_pelajaran']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Prioritas Minat :</label>
                                            <div class="col-lg-9">
                                                <select name="id_minat" class="form-control">
                                                    <?php if($minat != NULL) foreach($minat as $m){ ?>
                                                    <option value="<?php echo $m['id_minat'] ?>"><?php echo $m['nama_minat']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Prioritas Cita Cita :</label>
                                            <div class="col-lg-9">
                                                <select name="id_cita_cita" class="form-control">
                                                    <?php if($cita_cita != NULL) foreach($cita_cita as $m){ ?>
                                                    <option value="<?php echo $m['id_cita_cita'] ?>"><?php echo $m['nama_cita_cita']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
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
