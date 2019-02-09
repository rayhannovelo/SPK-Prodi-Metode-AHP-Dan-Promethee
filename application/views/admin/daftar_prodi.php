<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNSRI | Daftar Prodi</title>

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
                    <div class="col-lg-3" style="margin: 0px 10px; text-transform: none;">
                        <button class="btn btn-primary btn-rounded btn-block dim" style="text-transform: none;" type="button" onclick="location.href='<?php echo site_url('daftar_prodi/tambah_prodi')?>'"><i class="fa fa-plus"></i> Tambah Program Studi</button>
                    </div>
                    <div class="col-lg-8">
                        <?php echo $this->session->flashdata('hasil'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">                        
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar Program Studi</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover siswa" align="center">
                                    <thead>
                                        <tr>
                                            <td>Nama Program Studi</td>
                                            <td>Akreditasi</td>
                                            <td>Prioritas Nilai</td>
                                            <td>Prioritas Minat</td>
                                            <td>Prioritas Cita Cita</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($prodi != NULL) foreach($prodi as $p) { ?>
                                        <tr>
                                            <td><?php echo $p['nama_prodi']; ?></td>
                                            <td><?php echo $p['nama_akreditasi']; ?></td>
                                            <td><?php echo $p['nama_pelajaran']; ?></td>
                                            <td><?php echo $p['nama_minat']; ?></td>
                                            <td><?php echo $p['nama_cita_cita']; ?></td>
                                            <td>
                                                <button class="btn btn-info dim" onclick="location.href='<?php echo site_url('daftar_prodi/edit_prodi/'.$p['id_prodi'])?>'" type="button"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-danger dim" onclick="if (confirm('Data Siswa akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_prodi/hapus_prodi/'.$p['id_prodi'])?>'" type="button"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
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

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.siswa').DataTable({
            });
        });
    </script>
</body>

</html>
