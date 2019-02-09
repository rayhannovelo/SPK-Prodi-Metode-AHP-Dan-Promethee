<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNSRI | Dashboard</title>

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
                <li class="active">
                    <a href="<?php echo site_url('daftar_kriteria')?>"><i class="fa fa-tasks"></i> <span class="nav-label">Kriteria</span></a>
                </li>
                <li>
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
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Form Edit Kriteria</h5>
                                <div class="text-right">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5"><i class="fa fa-info-circle"></i> TIPS</button>
                                <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Bagaimana memilih fungsi preferensi yang benar?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Fungsi preferensi tipe V (tipe III) dan linier (tipe V)</strong> paling sesuai untuk kriteria kuantitatif (misalnya harga, biaya, daya, ...). Pilihan akan tergantung pada apakah Anda ingin memperkenalkan ambang ketidakpedulian ( <i>indifference threshold</i> ) atau tidak. Sebenarnya, bentuk V adalah kasus khusus yang linier.</p>

                                            <p><strong>Fungsi preferensi Gaussian (tipe VI)</strong> kurang sering digunakan karena parameternya lebih sulit (nilai ambang batas Gaussian (σ) berada di antara ambang batas Indifference (q) dan ambang batas Preference (p) .</p>

                                            <p><strong>Fungsi preferensi Biasa (tipe I) dan Tingkat (tipe IV)</strong> paling sesuai untuk kriteria kualitatif. Dalam hal sejumlah angka kecil pada skala kriteria (misalnya, ya / tidak ada kriteria atau skala 5 poin) dan jika tingkat yang berbeda dianggap sangat berbeda satu sama lain, fungsi preferensi Biasa adalah pilihan yang tepat. Jika Anda ingin membedakan penyimpangan yang lebih kecil dari yang lebih besar, fungsi preferensi Tingkat lebih memadai.</p>

                                            <p><strong>Fungsi preferensi U-shape (type II)</strong> adalah kasus khusus dari Level satu dan kurang sering digunakan.</p>
                                            <br>
                                            <p>Sumber: <a href="http://www.promethee-gaia.net/faq-pro/?action=article&cat_id=003002&id=4&lang=">http://www.promethee-gaia.net/faq-pro/?action=article&cat_id=003002&id=4&lang=</a></p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if($kriteria != NULL) foreach ($kriteria as $k) { ?>
                                        <form class="form-horizontal" role="form" action="<?php echo site_url('daftar_kriteria/edit_kriteria_form/'.$k['id_kriteria'])?>" method="post">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Nama Kriteria :</label>
                                            <div class="col-lg-9">
                                                <input type="hidden" name="id_kriteria" value="<?php echo $k['id_kriteria']; ?>">
                                                <input type="text" name="nama_kriteria" placeholder="Nama Kriteria" class="form-control" value="<?php echo $k['nama_kriteria']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Kaidah :</label>
                                            <div class="col-lg-9">
                                                <select name="kaidah" class="form-control">
                                                    <option <?php if($k['kaidah'] == 'min'){ echo "selected='selected'";} ?> value="min">Min</option>
                                                    <option <?php if($k['kaidah'] == 'max'){ echo "selected='selected'";} ?> value='max'>Max</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Pilih Tipe Preferensi :</label>
                                            <div class="col-lg-9">
                                                <select name="id_preferensi" class="form-control">
                                                <?php if($tipe_preferensi != NULL) foreach($tipe_preferensi as $tp) { ?>
                                                    <option <?php if($tp['id_preferensi'] == $k['id_preferensi']){ echo "selected='selected'";} ?> value="<?php echo $tp['id_preferensi'] ?>"><?php echo $tp['tipe_preferensi'].' - '.$tp['nama_preferensi'] ?></option>
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
                                    <?php } ?>
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
