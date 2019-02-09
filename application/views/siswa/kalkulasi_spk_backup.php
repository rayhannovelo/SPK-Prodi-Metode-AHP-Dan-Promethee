<?php 
    function preferensi($d, $tipe_preferensi, $p, $q, $g) {
        switch ($tipe_preferensi) {
            case 'I':
                if($d <= 0) {
                    return 0;
                }elseif($d > 0) {
                    return 1;
                }
                break;
            case 'II':
                if($d <= $q) {
                    return 0;
                }elseif($d > $q) {
                    return 1;
                }
                break;
            case 'III':
                if($d <= 0) {
                    return 0;
                }elseif(0 <= $d && $d <= $p) {
                    return $d/$p;
                }elseif($d > $q){
                    return 1;
                }
                break;
            case 'IV':
                if(abs($d) <= $q) {
                    return 0;
                }elseif($q < abs($d) && abs($d) <= $p) {
                    return 0.5;
                }elseif(abs($d) > $p) {
                    return 1;
                }
                break;
            case 'V':
                if(abs($d) <= $q) {
                    return 0;
                }elseif($q < abs($d) && abs($d) <= $p) {
                    return (abs($d) - $q)/($p - $q);
                }elseif(abs($d) > $p) {
                    return 1;
                }
                break;  
            case 'VI':
                if($d <= 0) {
                    return 0;
                }elseif($d > 0) {
                    return (1 - exp(pow($d, 2)/(2*(pow($g, 2)))));
                }
                break;
            default:
                return '9999999';
                break;          
        }
    }

    function rangking($net_flow, $net_flow1, $daftar_net_flow, $jumlah_alternatif){
        for($i = 0; $i < $jumlah_alternatif; $i++) { 
            if($net_flow == $daftar_net_flow[$i]['nilai'] && $net_flow1 == $daftar_net_flow[$i]['id_prodi']) {
                return $i + 1;
            }
        }
    }

    // $daftar_alternatif1 -> daftar nama alternatif (16)
    // $daftar_alternatif  -> daftar nama alternatif (256)
    
    for($i = 0; $i<count($daftar_alternatif1); $i++) {
        for($j = 0; $j<count($daftar_alternatif1); $j++) {
            $daftar_alternatif[] = $daftar_alternatif1[$i];
        }
    }
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNSRI | Kalkulasi Promethee</title>

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
                <li>
                    <a href="<?php echo site_url('kuesioner')?>"><i class="fa fa-clipboard"></i> <span class="nav-label">Kuesioner</span></a>
                </li>
                <li class="active">
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
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Kalkulasi AHP dan Promethee</h5>
                            </div>
                            <div class="ibox-content">
                            <div class="row">
                            <div class="col-lg-12">
                            <h2>Nilai Bobot Kriteria dari Skala Perbandingan</h2>
                            <div class="table-responsive">
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
                                            <td><?php echo $perbandingan_kriteria[0]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[1]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[2]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[3]['nilai']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nilai</td>
                                            <td><?php echo $perbandingan_kriteria[4]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[5]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[6]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[7]['nilai']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Akreditasi</td>
                                            <td><?php echo $perbandingan_kriteria[8]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[9]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[10]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[11]['nilai']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Cita Cita</td>
                                            <td><?php echo $perbandingan_kriteria[12]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[13]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[14]['nilai']; ?></td>
                                            <td><?php echo $perbandingan_kriteria[15]['nilai']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>
                                                <?php 
                                                    $total_kolom[] = $perbandingan_kriteria[0]['nilai'] + $perbandingan_kriteria[4]['nilai'] + $perbandingan_kriteria[8]['nilai'] + $perbandingan_kriteria[12]['nilai']; 
                                                    echo $total_kolom[0]; 
                                                ?>    
                                            </td>
                                            <td>
                                                <?php 
                                                    $total_kolom[] = $perbandingan_kriteria[1]['nilai'] + $perbandingan_kriteria[5]['nilai'] + $perbandingan_kriteria[9]['nilai'] + $perbandingan_kriteria[13]['nilai'];  
                                                    echo $total_kolom[1]; 
                                                ?> 
                                            </td>
                                            <td>
                                                <?php 
                                                    $total_kolom[] = $perbandingan_kriteria[2]['nilai'] + $perbandingan_kriteria[6]['nilai'] + $perbandingan_kriteria[10]['nilai'] + $perbandingan_kriteria[14]['nilai'];  
                                                    echo $total_kolom[2]; 
                                                ?>  
                                            </td>
                                            <td>
                                                <?php 
                                                    $total_kolom[] = $perbandingan_kriteria[3]['nilai'] + $perbandingan_kriteria[7]['nilai'] + $perbandingan_kriteria[11]['nilai'] + $perbandingan_kriteria[15]['nilai'];  
                                                    echo $total_kolom[3]; 
                                                ?>  
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-lg-12">
                            <h2>Matrik Nilai Kriteria</h2>
                            <div class="table-responsive">
                            <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>Minat</td>
                                            <td>Nilai</td>
                                            <td>Akreditasi</td>
                                            <td>Cita Cita</td>
                                            <td>Jumlah Baris</td>
                                            <td>Bobot Prioritas</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Minat</td>
                                            <td>
                                                <?php
                                                    $total_baris[0][] = $perbandingan_kriteria[0]['nilai'] / $total_kolom[0]; 
                                                    echo number_format($total_baris[0][0], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[0][] = $perbandingan_kriteria[1]['nilai'] / $total_kolom[1]; 
                                                    echo number_format($total_baris[0][1], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[0][] = $perbandingan_kriteria[2]['nilai'] / $total_kolom[2]; 
                                                    echo number_format($total_baris[0][2], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[0][] = $perbandingan_kriteria[3]['nilai'] / $total_kolom[3]; 
                                                    echo number_format($total_baris[0][3], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $jumlah_baris[] = $total_baris[0][0] + $total_baris[0][1] + $total_baris[0][2] + $total_baris[0][3];
                                                    echo number_format($jumlah_baris[0], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <strong>
                                                <?php
                                                    $bobot_prioritas[] = $jumlah_baris[0] / 4;
                                                    echo number_format($bobot_prioritas[0], 3, ',', '.');
                                                ?>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nilai</td>
                                            <td>
                                                <?php
                                                    $total_baris[1][] = $perbandingan_kriteria[4]['nilai'] / $total_kolom[0]; 
                                                    echo number_format($total_baris[1][0], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[1][] = $perbandingan_kriteria[5]['nilai'] / $total_kolom[1]; 
                                                    echo number_format($total_baris[1][1], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[1][] = $perbandingan_kriteria[6]['nilai'] / $total_kolom[2]; 
                                                    echo number_format($total_baris[1][2], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[1][] = $perbandingan_kriteria[7]['nilai'] / $total_kolom[3]; 
                                                    echo number_format($total_baris[1][3], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $jumlah_baris[] = $total_baris[1][0] + $total_baris[1][1] + $total_baris[1][2] + $total_baris[1][3];
                                                    echo number_format($jumlah_baris[1], 3, ',', '.'); 
                                                ?>
                                            </td>
                                            <td>
                                                <strong>
                                                <?php
                                                    $bobot_prioritas[] = $jumlah_baris[1] / 4;
                                                    echo number_format($bobot_prioritas[1], 3, ',', '.');
                                                ?>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Akreditasi</td>
                                            <td>
                                                <?php
                                                    $total_baris[2][] = $perbandingan_kriteria[8]['nilai'] / $total_kolom[0]; 
                                                    echo number_format($total_baris[2][0], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[2][] = $perbandingan_kriteria[9]['nilai'] / $total_kolom[1]; 
                                                    echo number_format($total_baris[2][1], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[2][] = $perbandingan_kriteria[10]['nilai'] / $total_kolom[2]; 
                                                    echo number_format($total_baris[2][2], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[2][] = $perbandingan_kriteria[11]['nilai'] / $total_kolom[3]; 
                                                    echo number_format($total_baris[2][3], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $jumlah_baris[] = $total_baris[2][0] + $total_baris[2][1] + $total_baris[2][2] + $total_baris[2][3];
                                                    echo number_format($jumlah_baris[2], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <strong>
                                                <?php
                                                    $bobot_prioritas[] = $jumlah_baris[2] / 4;
                                                    echo number_format($bobot_prioritas[2], 3, ',', '.');
                                                ?>
                                                </strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Cita Cita</td>
                                            <td>
                                                <?php
                                                    $total_baris[3][] = $perbandingan_kriteria[12]['nilai'] / $total_kolom[0]; 
                                                    echo number_format($total_baris[3][0], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[3][] = $perbandingan_kriteria[13]['nilai'] / $total_kolom[1]; 
                                                    echo number_format($total_baris[3][1], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[3][] = $perbandingan_kriteria[14]['nilai'] / $total_kolom[2]; 
                                                    echo number_format($total_baris[3][2], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $total_baris[3][] = $perbandingan_kriteria[15]['nilai'] / $total_kolom[3]; 
                                                    echo number_format($total_baris[3][3], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php 
                                                    $jumlah_baris[] = $total_baris[3][0] + $total_baris[3][1] + $total_baris[3][2] + $total_baris[3][3];
                                                    echo number_format($jumlah_baris[3], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <strong>
                                                <?php
                                                    $bobot_prioritas[] = $jumlah_baris[3] / 4;
                                                    echo number_format($bobot_prioritas[3], 3, ',', '.');
                                                ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-lg-12">
                            <h2>Rekapitulasi nilai alternatif dan parameter</h2>
                            <div class="table-responsive">
                            <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                <thead>
                                    <tr>
                                        <td rowspan="2">Kriteria</td>
                                        <td rowspan="2">Kaidah</td>
                                        <td rowspan="2">Bobot</td>
                                        <td colspan="<?php echo $jumlah_alternatif ?>">Alternatif</td>
                                        <td rowspan="2">Tipe Preferensi</td>
                                        <td rowspan="2">Preference (p)</td>
                                        <td rowspan="2">Indifference (q)</td>
                                        <td rowspan="2">Gaussian (σ)</td>
                                    </tr>
                                    <tr>
                                        <?php 
                                            if($alternatif != NULL) foreach($alternatif as $a) { 
                                                echo '<td>'.$a['nama_prodi'].'</td>';
                                            } 
                                        ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($kriteria != NULL) foreach($kriteria as $key => $k) { ?>
                                    <tr>
                                        <td><?php echo $k['nama_kriteria']; ?></td>
                                        <td><?php echo $k['kaidah']; ?></td>
                                        <td><strong><?php echo number_format($bobot_prioritas[$key], 3, ',', '.'); ?></strong></td>
                                        <?php 
                                            if($alternatif != NULL) foreach($alternatif as $a) {
                                                if($k['id_kriteria'] == 1){
                                                    foreach($nilai_minat as $m) {
                                                        if($m['id_minat'] == $a['id_minat']){
                                                            echo '<td>'.$m['nilai_minat'].'</td>';
                                                            break;
                                                        }
                                                    }
                                                }elseif($k['id_kriteria'] == 2) {
                                                    foreach($nilai_pelajaran as $mp) {
                                                        if($mp['id_pelajaran'] == $a['id_pelajaran']){
                                                            echo '<td>'.$mp['nilai_pelajaran'].'</td>';
                                                            break;
                                                        }
                                                    }
                                                }elseif($k['id_kriteria'] == 3) {
                                                    echo '<td>'.$a['nilai_akreditasi'].'</td>';
                                                }elseif($k['id_kriteria'] == 4) {
                                                    foreach($nilai_cita_cita as $c) {
                                                        if($c['id_cita_cita'] == $a['id_cita_cita']){
                                                            echo '<td>'.$c['nilai_cita_cita'].'</td>';
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                        ?>
                                        <td><?php echo $k['tipe_preferensi']; ?></td>
                                        <td><?php echo number_format($parameter[$key]['p'], 3, ',', '.'); ?></td>
                                        <td><?php echo number_format($parameter[$key]['q'], 3, ',', '.'); ?></td>
                                        <td><?php echo number_format($parameter[$key]['g'], 3, ',', '.'); ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <?php if($kriteria != NULL) foreach($kriteria as $key => $k) { ?>
                            <div class="col-lg-6">
                                <h3>Perbandingan Berpasangan Kriteria <?php echo $k['nama_kriteria'] ?></h3>
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td colspan="2">Kriteria</td>
                                            <td>g(a)</td>
                                            <td>g(b)</td>
                                            <td>d<sub>j</sub>(a,b)</td>
                                            <td>P<sub>j</sub>(a,b)</td>
                                            <td>φ(a,b)</td> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $x = 0;
                                            $y = 0;
                                            $max = count($daftar_alternatif1) - 1; // 15
                                            $jumlah_daftar_alternatif = count($daftar_alternatif);
                                            for($i = 0; $i < $jumlah_daftar_alternatif; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $daftar_alternatif[$i]; ?></td>
                                            <td><?php echo $daftar_alternatif1[$y]; ?></td>
                                            <td><?php echo $daftar_nilai[$key][$x]; ?></td>
                                            <td><?php echo $daftar_nilai[$key][$y]; ?></td>
                                            <td>
                                                <?php
                                                    // Perbandingan Berpasangan Kriteria
                                                    // dj(a,b)=g(a)-g(b)    
                                                    $d[$key][$y] = $daftar_nilai[$key][$x] - $daftar_nilai[$key][$y];
                                                    echo $d[$key][$y]; 
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    // Penerapan fungsi preferensi
                                                    // Pj(a,b) = Pj(dj(a,b))   
                                                    $p[$key][$y] = preferensi($d[$key][$y], $k['tipe_preferensi'], $parameter[$key]['p'], $parameter[$key]['q'], $parameter[$key]['g']);
                                                    echo number_format($p[$key][$y], 3, ',', '.');
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    // Penentuan Nilai Preferensi 
                                                    // Ф(a,b)= Pj(a,b) * wj(a,b) | wj(a,b) -> bobot
                                                    $ip[$key][] = $p[$key][$y] * $bobot_prioritas[$key];
                                                    echo number_format($ip[$key][$i], 3, ',', '.');
                                                ?>
                                            </td>
                                        </tr>
                                        <?php   
                                                if($y == $max) {
                                                    $y = 0;
                                                    $x++;
                                                }else {
                                                    $y++;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <?php
                            $x = 0;
                            for($i = 0; $i < $jumlah_daftar_alternatif; $i++) {
                                for($j = 0; $j < $jumlah_kriteria; $j++) {
                                    for($k = 0;$k < $jumlah_daftar_alternatif; $k++){
                                        if($i == $k){
                                            $x += $ip[$j][$k];
                                            break;
                                        }
                                    }   
                                }
                                $tip[] = $x; // total indeks preferensi
                                $x = 0;
                            }

                            $batas = $jumlah_alternatif;
                            $jumlah_tip = count($tip);
                            for($i = 0;$i < $jumlah_tip; $i++) {
                                if($i < $batas){
                                    $ipg[$x][] = $tip[$i];
                                }elseif($i == $batas) {
                                    $x++;
                                    $ipg[$x][] = $tip[$i]; // indeks preferensi global
                                    $batas += $jumlah_alternatif;
                                }   
                            }
                        ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Rekapitulasi Nilai Indeks Preferensi Global Alternatif</h2>
                                <div class="table-responsive">
                                <table id="mytable" class="table table-striped table-bordered table-hover dataTables-example" align="center">
                                    <thead>
                                        <tr>
                                            <td>Alternatif</td>
                                            <?php 
                                                if($alternatif != NULL) foreach($alternatif as $a) { 
                                                    echo '<td>'.$a['nama_prodi'].'</td>';
                                                } 
                                            ?>
                                            <td>Jumlah</td>
                                            <td>Leaving</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $temp = 0; $jumlah_baris = []; if($alternatif != NULL) foreach ($alternatif as $key => $a){ ?>
                                        <tr>
                                            <td><?php echo $a['nama_prodi']; ?></td>
                                            <?php 
                                                $jumlah_ipg = count($ipg, COUNT_RECURSIVE) - count($ipg); // 256
                                                for($i = 0; $i < $jumlah_ipg; $i++) { 
                                                    if($i < $jumlah_alternatif) {
                                                        echo '<td>'.number_format($ipg[$key][$i], 3).'</td>';
                                                        $temp += $ipg[$key][$i];
                                                    }else {
                                                        $jumlah_baris[] = $temp;
                                                        $temp = 0;
                                                        break;
                                                    }
                                                }

                                                $leaving_flow[$key] = ($jumlah_baris[$key] / ($jumlah_alternatif - 1));
                                            ?>
                                            <td><?php echo number_format($jumlah_baris[$key], 3); ?></td>
                                            <td><?php echo number_format($leaving_flow[$key], 3); ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td>Jumlah</td>
                                            <?php 
                                                for($i = 0; $i < $jumlah_alternatif; $i++) {
                                                    for($j = 0; $j < $jumlah_alternatif; $j++) {
                                                        for($k = 0; $k < $jumlah_alternatif; $k++) {
                                                            if($i == $k){
                                                                $temp += $ipg[$j][$i];
                                                            }
                                                        }
                                                    }
                                                    $jumlah_kolom[$i] = $temp;
                                                    $temp = 0; 
                                                    echo '<td>'.number_format($jumlah_kolom[$i], 3).'</td>';
                                                }
                                            ?>
                                        </tr>
                                        <tr>
                                            <td>Entering</td>
                                            <?php
                                                for($i = 0; $i < $jumlah_alternatif; $i++) { 
                                                    $entering_flow[$i] = ($jumlah_kolom[$i] / ($jumlah_alternatif - 1));
                                                    echo '<td>'.number_format($entering_flow[$i], 3).'</td>';
                                                }
                                            ?>
                                        </tr>
                                    </tbody>
                                </table>
                                </div>
                                <br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <h2>Hasil Perangkingan Promethee</h2>
                                        <div class="table-responsive">
                                        <table id="mytable" class="rangking table table-striped table-bordered table-hover dataTables-example" align="center">
                                            <thead>
                                                <tr>
                                                    <td>Alternatif</td>
                                                    <td>Leaving Flow</td>
                                                    <td>Entering Flow</td>
                                                    <td>Net Flow</td>
                                                    <td class="no-sort">Rangking</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    foreach($alternatif as $key => $value) {
                                                        $daftar_net_flow[$key]['nilai'] = $leaving_flow[$key] - $entering_flow[$key];
                                                        $daftar_net_flow[$key]['id_prodi'] = $value['id_prodi'];                
                                                    }
                                                    
                                                    usort($daftar_net_flow, function($a, $b) {
                                                        return$b['nilai'] > $a['nilai'];
                                                    });

                                                    if($alternatif != NULL) foreach($alternatif as $key => $a) { 
                                                ?>          
                                                <tr>
                                                    <td><?php echo $a['nama_prodi']; ?></td>
                                                    <td><?php echo number_format($leaving_flow[$key], 3); ?></td>
                                                    <td><?php echo number_format($entering_flow[$key], 3); ?></td>
                                                    <td>
                                                        <?php
                                                            $net_flow[$key]['nilai'] = $leaving_flow[$key] - $entering_flow[$key];
                                                            echo number_format($net_flow[$key]['nilai'], 3);
                                                            $net_flow[$key]['id_prodi'] = $a['id_prodi'];
                                                        ?>
                                                    </td>
                                                    <td><?php echo rangking($net_flow[$key]['nilai'], $net_flow[$key]['id_prodi'], $daftar_net_flow, $jumlah_alternatif); ?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        </div>
                                        <br>
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
            $('.rangking').DataTable({
                "order": [4, "asc"],
                "iDisplayLength": 25,
                "paging":   false,
                "searching": false,
                "info":     false,
                "columnDefs": [ {
                    "targets"  : [0,1,2,3,4]
                    // "orderable": false,
                }]
            });
        });
    </script>

</body>

</html>
