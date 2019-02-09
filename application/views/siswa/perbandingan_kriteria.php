<?php 
    function desimal_ke_pecahan($bilangan){
        if($bilangan < 1) { 
            return "1/".(round(1 / $bilangan)); 
        }else { 
            return $bilangan; 
        }
    }
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNSRI | Perbandingan Kriteria</title>

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

<body class="skin-3"> <!-- .md-skin -->

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
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Perbandingan Kriteria</h5>
                                <div class="text-right">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal5"><i class="fa fa-info-circle"></i> Petunjuk Pengisian</button>
                                <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-text="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-text="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title">Petunjuk Pengisian</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">Berilah nilai skala kriteria (A) terhadap kriteria (B) yang sesuai dengan pendapat anda berdasarkan nilai pada tabel dibawah ini :</p>
                                            <table class="table table-striped table-bordered table-hover" align="center">
                                                <thead>
                                                    <tr>
                                                        <td>Intesitas Kepentingan</td>
                                                        <td>Definisi</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Kedua kriteria sama pentingnya</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Kriteria A sedikit lebih penting dari kriteria B</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>Kriteria A lebih penting dari kriteria B</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>Kriteria A sangat lebih penting dari kriteria B</td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>Kriteria A mutlak lebih penting dari kriteria B</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2, 4, 6, 8</td>
                                                        <td>Nilai-nilai diantara dua perimbangan yang berdekatan</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
                            <div class="table-responsive">
                                <form action="<?php echo site_url('perbandingan_kriteria/simpan')?>" method="post">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>Minat</td>
                                            <td>Nilai</td>
                                            <td>Akreditasi</td>
                                            <td>Cita Cita</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Minat</td>
                                            <td>
                                                <?php 
                                                    echo '<input type="text" id="bobot1" name="kriteria[]" class="form-control" value="'.$perbandingan_kriteria[0]['nilai'].'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot22" name="kriteria[]" value="<?php echo $perbandingan_kriteria[1]['nilai'] ?>">
                                                <select id="bobot2" class="form-control" onchange="ubah_bobot5()">
                                                <?php for($i = 9; $i > 1; $i--) { ?>
                                                    <option <?php if("1/".$i == "1/".(round(1/$perbandingan_kriteria[1]['nilai']))){ echo "selected='selected'"; } ?> value="<?php echo "1/$i"; ?>"><?php echo "1/".$i; ?></option>
                                                <?php } ?>
                                                <?php for($i = 1; $i <= 9; $i++) { ?>
                                                    <option <?php if($i == $perbandingan_kriteria[1]['nilai']){ echo "selected='selected'"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot33" name="kriteria[]" value="<?php echo $perbandingan_kriteria[2]['nilai'] ?>">
                                                <select id="bobot3" class="form-control" onchange="ubah_bobot7()">
                                                <?php for($i = 9; $i > 1; $i--) { ?>
                                                    <option <?php if("1/".$i == "1/".(round(1/$perbandingan_kriteria[2]['nilai']))){ echo "selected='selected'"; } ?> value="<?php echo "1/$i"; ?>"><?php echo "1/".$i; ?></option>
                                                <?php } ?>
                                                <?php for($i = 1; $i <= 9; $i++) { ?>
                                                    <option <?php if($i == $perbandingan_kriteria[2]['nilai']){ echo "selected='selected'"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot44" name="kriteria[]" value="<?php echo $perbandingan_kriteria[3]['nilai'] ?>">
                                                <select id="bobot4" class="form-control" onchange="ubah_bobot13()">
                                                <?php for($i = 9; $i > 1; $i--) { ?>
                                                    <option <?php if("1/".$i == "1/".(round(1/$perbandingan_kriteria[3]['nilai']))){ echo "selected='selected'"; } ?> value="<?php echo "1/$i"; ?>"><?php echo "1/".$i; ?></option>
                                                <?php } ?>
                                                <?php for($i = 1; $i <= 9; $i++) { ?>
                                                    <option <?php if($i == $perbandingan_kriteria[3]['nilai']){ echo "selected='selected'"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nilai</td>
                                            <td>
                                                <input type="hidden" id="bobot55" name="kriteria[]" value="<?php echo $perbandingan_kriteria[4]['nilai'] ?>">
                                                <?php 
                                                    echo '<input type="text" id="bobot5" class="form-control" value="'.desimal_ke_pecahan($perbandingan_kriteria[4]['nilai']).'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo '<input type="text" id="bobot5" name="kriteria[]" class="form-control" value="'.$perbandingan_kriteria[5]['nilai'].'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot77" name="kriteria[]" value="<?php echo $perbandingan_kriteria[6]['nilai'] ?>">
                                                <select id="bobot7" class="form-control" onchange="ubah_bobot10()">
                                                <?php for($i = 9; $i > 1; $i--) { ?>
                                                    <option <?php if("1/".$i == "1/".(round(1/$perbandingan_kriteria[6]['nilai']))){ echo "selected='selected'"; } ?> value="<?php echo "1/$i"; ?>"><?php echo "1/".$i; ?></option>
                                                <?php } ?>
                                                <?php for($i = 1; $i <= 9; $i++) { ?>
                                                    <option <?php if($i == $perbandingan_kriteria[6]['nilai']){ echo "selected='selected'"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot88" name="kriteria[]" value="<?php echo $perbandingan_kriteria[7]['nilai'] ?>">
                                                <select id="bobot8" class="form-control" onchange="ubah_bobot14()">
                                                <?php for($i = 9; $i > 1; $i--) { ?>
                                                    <option <?php if("1/".$i == "1/".(round(1/$perbandingan_kriteria[7]['nilai']))){ echo "selected='selected'"; } ?> value="<?php echo "1/$i"; ?>"><?php echo "1/".$i; ?></option>
                                                <?php } ?>
                                                <?php for($i = 1; $i <= 9; $i++) { ?>
                                                    <option <?php if($i == $perbandingan_kriteria[7]['nilai']){ echo "selected='selected'"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Akreditasi</td>
                                            <td>
                                                <input type="hidden" id="bobot77" name="kriteria[]" value="<?php echo $perbandingan_kriteria[8]['nilai'] ?>">
                                                <?php 
                                                    echo '<input type="text" id="bobot7" class="form-control" value="'.desimal_ke_pecahan($perbandingan_kriteria[8]['nilai']).'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot1010" name="kriteria[]" value="<?php echo $perbandingan_kriteria[9]['nilai'] ?>">
                                                <?php 
                                                    echo '<input type="text" id="bobot10" class="form-control" value="'.desimal_ke_pecahan($perbandingan_kriteria[9]['nilai']).'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo '<input type="text" id="bobot9" name="kriteria[]" class="form-control" value="'.$perbandingan_kriteria[10]['nilai'].'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot1212" name="kriteria[]" value="<?php echo $perbandingan_kriteria[11]['nilai'] ?>">
                                                <select id="bobot12" class="form-control" onchange="ubah_bobot15()">
                                                <?php for($i = 9; $i > 1; $i--) { ?>
                                                    <option <?php if("1/".$i == "1/".(round(1/$perbandingan_kriteria[11]['nilai']))){ echo "selected='selected'"; } ?> value="<?php echo "1/$i"; ?>"><?php echo "1/".$i; ?></option>
                                                <?php } ?>
                                                <?php for($i = 1; $i <= 9; $i++) { ?>
                                                    <option <?php if($i == $perbandingan_kriteria[11]['nilai']){ echo "selected='selected'"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cita Cita</td>
                                            <td>
                                                <input type="hidden" id="bobot1313" name="kriteria[]" value="<?php echo $perbandingan_kriteria[12]['nilai'] ?>">
                                                <?php 
                                                    echo '<input type="text" id="bobot13" class="form-control" value="'.desimal_ke_pecahan($perbandingan_kriteria[12]['nilai']).'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot1414" name="kriteria[]" value="<?php echo $perbandingan_kriteria[13]['nilai'] ?>">
                                                <?php 
                                                    echo '<input type="text" id="bobot14" class="form-control" value="'.desimal_ke_pecahan($perbandingan_kriteria[13]['nilai']).'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <input type="hidden" id="bobot1515" name="kriteria[]" value="<?php echo $perbandingan_kriteria[14]['nilai'] ?>">
                                                <?php 
                                                    echo '<input type="text" id="bobot15" class="form-control" value="'.desimal_ke_pecahan($perbandingan_kriteria[14]['nilai']).'" readonly>'
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    echo '<input type="text" id="bobot9" name="kriteria[]" class="form-control" value="'.$perbandingan_kriteria[15]['nilai'].'" readonly>'
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-offset-8 col-lg-4">
                                            <button type="reset" class="btn btn-w-m btn-warning">Reset</button>
                                            <button class="btn btn-w-m btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
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
        function ubah_bobot5() {
            var bobot2 = document.getElementById("bobot2").value;
            var lastChar = bobot2[bobot2.length -1];
            
            if(bobot2.length > 1) { // "1/2"
                document.getElementById("bobot22").value = (1/lastChar).toFixed(2);
                document.getElementById("bobot55").value = lastChar;
                document.getElementById("bobot5").value = lastChar;
            }else if(bobot2.length == 1){ // != "1" => 
                document.getElementById("bobot22").value = lastChar;
                document.getElementById("bobot55").value = (1/lastChar).toFixed(2);
                if(bobot2 == "1") {
                    document.getElementById("bobot5").value = "1";
                }else {
                    document.getElementById("bobot5").value = "1/"+lastChar;
                }
            }
            
        }
        function ubah_bobot13() {
            var bobot4 = document.getElementById("bobot4").value;
            var lastChar = bobot4[bobot4.length -1];
            
            if(bobot4.length > 1) { // "1/2"
                document.getElementById("bobot44").value = (1/lastChar).toFixed(2);
                document.getElementById("bobot1313").value = lastChar;
                document.getElementById("bobot13").value = lastChar;
            }else if(bobot4.length == 1){ // != "1" => 
                document.getElementById("bobot44").value = lastChar;
                document.getElementById("bobot1313").value = (1/lastChar).toFixed(2);
                if(bobot4 == "1") {
                    document.getElementById("bobot13").value = "1";
                }else {
                    document.getElementById("bobot13").value = "1/"+lastChar;
                }
            }
           
        }
        function ubah_bobot14() {
            var bobot8 = document.getElementById("bobot8").value;
            var lastChar = bobot8[bobot8.length -1];
            
            if(bobot8.length > 1) { // "1/2"
                document.getElementById("bobot88").value = (1/lastChar).toFixed(2);
                document.getElementById("bobot1414").value = lastChar;
                document.getElementById("bobot14").value = lastChar;
            }else if(bobot8.length == 1){ // != "1" => 
                document.getElementById("bobot88").value = lastChar;
                document.getElementById("bobot1414").value = (1/lastChar).toFixed(2);
                if(bobot4 == "1") {
                    document.getElementById("bobot14").value = "1";
                }else {
                    document.getElementById("bobot14").value = "1/"+lastChar;
                }
            }
           
        }
        function ubah_bobot15() {
            var bobot12 = document.getElementById("bobot12").value;
            var lastChar = bobot12[bobot12.length -1];
            
            if(bobot12.length > 1) { // "1/2"
                document.getElementById("bobot1212").value = (1/lastChar).toFixed(2);
                document.getElementById("bobot1515").value = lastChar;
                document.getElementById("bobot15").value = lastChar;
            }else if(bobot12.length == 1){ // != "1" => 
                document.getElementById("bobot1212").value = lastChar;
                document.getElementById("bobot1515").value = (1/lastChar).toFixed(2);
                if(bobot12 == "1") {
                    document.getElementById("bobot15").value = "1";
                }else {
                    document.getElementById("bobot15").value = "1/"+lastChar;
                }
            }
           
        }
        function ubah_bobot10() {
            var bobot7 = document.getElementById("bobot7").value;
            var lastChar = bobot7[bobot7.length -1];

            if(bobot7.length > 1) { // "1/2"
                document.getElementById("bobot77").value = (1/lastChar).toFixed(2);
                document.getElementById("bobot1010").value = lastChar;
                document.getElementById("bobot10").value = lastChar;
            }else if(bobot7.length == 1){ // != "1" => 
                document.getElementById("bobot77").value = lastChar;
                document.getElementById("bobot1010").value = (1/lastChar).toFixed(2);
                if(bobot7 == "1") {
                    document.getElementById("bobot10").value = "1";
                }else {
                    document.getElementById("bobot10").value = "1/"+lastChar;
                }
            }
        }

        function ubah_bobot8() {
            var bobot6 = document.getElementById("bobot6").value;
            document.getElementById("bobot8").value = (1/bobot6).toFixed(2);

            var bobot6 = document.getElementById("bobot6").value;
            var lastChar = bobot6[bobot6.length -1];

            if(bobot6.length > 1) { // "1/2"
                document.getElementById("bobot66").value = (1/lastChar).toFixed(2);
                document.getElementById("bobot88").value = lastChar;
                document.getElementById("bobot8").value = lastChar;
            }else if(bobot6.length == 1){ // != "1" => 
                document.getElementById("bobot66").value = lastChar;
                document.getElementById("bobot88").value = (1/lastChar).toFixed(2);
                if(bobot6 == "1") {
                    document.getElementById("bobot8").value = "1";
                }else {
                    document.getElementById("bobot8").value = "1/"+lastChar;
                }
            }
        }
    </script>
</body>

</html>
