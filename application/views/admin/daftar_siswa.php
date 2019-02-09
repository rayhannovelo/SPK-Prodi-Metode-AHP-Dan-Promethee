<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNSRI | Daftar Siswa</title>

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
                <li class="active">
                    <a href="<?php echo site_url('daftar_siswa')?>"><i class="fa fa-users"></i> <span class="nav-label">Daftar Siswa</span></a>
                </li>
                <li>
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
                        <?php
                            if($this->session->flashdata('hasil')) {
                              echo $this->session->flashdata('hasil');
                            }
                        ?>
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Daftar Siswa</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                <div class="col-lg-12">
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover siswa" align="center">
                                    <thead>
                                        <tr>
                                            <td>Nama Siswa</td>
                                            <td>Gender</td>
                                            <td>Alamat</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($siswa != NULL) foreach($siswa as $s) { ?>
                                        <tr>
                                            <td><?php echo $s['nama_siswa']; ?></td>
                                            <td><?php echo $s['gender']; ?></td>
                                            <td><?php echo $s['alamat']; ?></td>
                                            <td>
                                                <button class="btn btn-danger dim" onclick="if (confirm('Data Siswa akan dihapus, apakah Anda yakin?')) location.href='<?php echo site_url('daftar_siswa/hapus_siswa/'.$s['id_siswa'].'/'.$s['id_users'])?>'" type="button"><i class="fa fa-trash"></i></button>
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
