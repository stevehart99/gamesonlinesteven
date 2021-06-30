<?php
include "koneksi.php";
require 'allfunction.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
};
if ($_SESSION['loggedIn'] == 0) {
    header("location: index.php");
}
if ($_SESSION['role'] != 'admin') {
    header("location: proseslogout.php");
}

$id = $_GET['id'];



$sql = mysqli_query($koneksi, "SELECT * FROM game") or die(mysqli_error($koneksi));
$jumlah_game = mysqli_num_rows($sql);

$sql2 = mysqli_query($koneksi, "SELECT * FROM kritiksaran") or die(mysqli_error($koneksi));
$jumlah_kritik = mysqli_num_rows($sql2);


$sql3 = mysqli_query($koneksi, "SELECT * FROM bobot") or die(mysqli_error($koneksi));
$jumlah_bobot = mysqli_num_fields($sql3);
$jumlah_bobott = $jumlah_bobot - 1;

$sql4 = mysqli_query($koneksi, "SELECT * FROM history") or die(mysqli_error($koneksi));
$jumlah_history = mysqli_num_rows($sql4);

$sql5 = mysqli_query($koneksi, "SELECT star FROM kritiksaran WHERE star = 5") or die(mysqli_error($koneksi));
$jumlah_star5 = mysqli_num_rows($sql5);

$sql6 = mysqli_query($koneksi, "SELECT star FROM kritiksaran WHERE star = 4") or die(mysqli_error($koneksi));
$jumlah_star4 = mysqli_num_rows($sql6);

$sql7 = mysqli_query($koneksi, "SELECT star FROM kritiksaran WHERE star = 3") or die(mysqli_error($koneksi));
$jumlah_star3 = mysqli_num_rows($sql7);

$sql8 = mysqli_query($koneksi, "SELECT star FROM kritiksaran WHERE star = 2") or die(mysqli_error($koneksi));
$jumlah_star2 = mysqli_num_rows($sql8);

$sql9 = mysqli_query($koneksi, "SELECT star FROM kritiksaran WHERE star = 1") or die(mysqli_error($koneksi));
$jumlah_star1 = mysqli_num_rows($sql9);

$sql10 = mysqli_query($koneksi, "SELECT count(*) as totaljan FROM history WHERE DATE_FORMAT(datee2, '%m') = '01'") or die(mysqli_error($koneksi));
if ($sql10) {
    while ($row = mysqli_fetch_assoc($sql10)) {
        $hasiljan = $row['totaljan'];
        // echo $hasiljan;
    }
}

$sql11 = mysqli_query($koneksi, "SELECT count(*) as totalfeb FROM history WHERE DATE_FORMAT(datee2, '%m') = '02'") or die(mysqli_error($koneksi));
if ($sql11) {
    while ($row = mysqli_fetch_assoc($sql11)) {
        $hasilfeb = $row['totalfeb'];
        // echo $hasilfeb;
    }
}

$sql12 = mysqli_query($koneksi, "SELECT count(*) as totalmar FROM history WHERE DATE_FORMAT(datee2, '%m') = '03'") or die(mysqli_error($koneksi));
if ($sql12) {
    while ($row = mysqli_fetch_assoc($sql12)) {
        $hasilmar = $row['totalmar'];
        // echo $hasilmar;
    }
}

$sql13 = mysqli_query($koneksi, "SELECT count(*) as totalapr  FROM history WHERE DATE_FORMAT(datee2, '%m') = '04'") or die(mysqli_error($koneksi));
if ($sql13) {
    while ($row = mysqli_fetch_assoc($sql13)) {
        $hasilapr = $row['totalapr'];
        // echo $hasilapr;
    }
}

$sql14 = mysqli_query($koneksi, "SELECT count(*) as totalmei  FROM history WHERE DATE_FORMAT(datee2, '%m') = '05'") or die(mysqli_error($koneksi));
if ($sql14) {
    while ($row = mysqli_fetch_assoc($sql14)) {
        $hasilmei = $row['totalmei'];
        // echo $hasilmei;
    }
}

$sql15 = mysqli_query($koneksi, "SELECT count(*) as totaljun  FROM history WHERE DATE_FORMAT(datee2, '%m') = '06'") or die(mysqli_error($koneksi));
if ($sql15) {
    while ($row = mysqli_fetch_assoc($sql15)) {
        $hasiljun = $row['totaljun'];
        // echo $hasiljun;
    }
}


$sql16 = mysqli_query($koneksi, "SELECT count(*) as totaljul FROM history WHERE DATE_FORMAT(datee2, '%m') = '07'") or die(mysqli_error($koneksi));
if ($sql16) {
    while ($row = mysqli_fetch_assoc($sql16)) {
        $hasiljul = $row['totaljul'];
        // echo $hasiljul;
    }
}


$sql17 = mysqli_query($koneksi, "SELECT count(*) as totalaug  FROM history WHERE DATE_FORMAT(datee2, '%m') = '08'") or die(mysqli_error($koneksi));
if ($sql17) {
    while ($row = mysqli_fetch_assoc($sql17)) {
        $hasilaug = $row['totalaug'];
        // echo $hasilaug;
    }
}

$sql18 = mysqli_query($koneksi, "SELECT count(*) as totalsep  FROM history WHERE DATE_FORMAT(datee2, '%m') = '09'") or die(mysqli_error($koneksi));
if ($sql18) {
    while ($row = mysqli_fetch_assoc($sql18)) {
        $hasilsep = $row['totalsep'];
        // echo $hasilsep;
    }
}
$sql19 = mysqli_query($koneksi, "SELECT count(*) as totaloct  FROM history WHERE DATE_FORMAT(datee2, '%m') = '10'") or die(mysqli_error($koneksi));
if ($sql19) {
    while ($row = mysqli_fetch_assoc($sql19)) {
        $hasiloct = $row['totaloct'];
        // echo $hasiloct;
    }
}

$sql20 = mysqli_query($koneksi, "SELECT count(*) as totalnov  FROM history WHERE DATE_FORMAT(datee2, '%m') = '11'") or die(mysqli_error($koneksi));
if ($sql20) {
    while ($row = mysqli_fetch_assoc($sql20)) {
        $hasilnov = $row['totalnov'];
        // echo $hasilnov;
    }
}

$sql21 = mysqli_query($koneksi, "SELECT count(*) as totaldec  FROM history WHERE DATE_FORMAT(datee2, '%m') = '12'") or die(mysqli_error($koneksi));
if ($sql21) {
    while ($row = mysqli_fetch_assoc($sql21)) {
        $hasildec = $row['totaldec'];
        // echo $hasildec;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
    <style>
        .kartu1:active{
             border: 5px solid red;
        }
        
        .kartu2:active{
            border: 5px solid #36b9cc;
        }
        
        .kartu3:active{
            border: 5px solid #f6c23e;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin SPK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="halamandashboardadmin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="halamanlistgameadmin.php" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>List Games</span>
                </a>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="halamanperhitunganadmin.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Perhitungan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="halamankritiksaranadmin.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-comments"></i>
                    <span>Kritik dan Saran</span>
                </a>
            </li>
            
             <li class="nav-item">
                <a class="nav-link collapsed" href="halamanhistoryadmin.php" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-history"></i>
                    <span>History Pencarian</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin SPK</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4 ">
                            <div class="card border-left-danger shadow h-100 py-2 kartu1" onclick="window.location='http://gamesonlinesteven.com/halamanlistgameadmin.php';">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Jumlah Game</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_game; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-gamepad fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2 kartu2" onclick="window.location='http://gamesonlinesteven.com/halamankritiksaranadmin.php';">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kritik dan Saran
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jumlah_kritik; ?></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <!--<div class="col-xl-3 col-md-6 mb-4">-->
                        <!--    <div class="card border-left-success shadow h-100 py-2">-->
                        <!--        <div class="card-body">-->
                        <!--            <div class="row no-gutters align-items-center">-->
                        <!--                <div class="col mr-2">-->
                        <!--                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Kriteria-->
                        <!--                    </div>-->
                        <!--                    <div class="row no-gutters align-items-center">-->
                        <!--                        <div class="col-auto">-->
                        <!--                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo  $jumlah_bobott; ?></div>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--                <div class="col-auto">-->
                        <!--                    <i class="fas fa-cog fa-2x text-gray-300"></i>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2 kartu3" onclick="window.location='http://gamesonlinesteven.com/halamanhistoryadmin.php';">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Jumlah History</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_history; ?> </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">History Pencarian</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myChart" width="30" height="10"></canvas>
                                        <script>
                                            var ctx = document.getElementById('myChart').getContext('2d');
                                            var myChart = new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                                    datasets: [{
                                                        label: 'History Pencarian',
                                                        data: [<?php echo $hasiljan; ?>, <?php echo $hasilfeb; ?>, <?php echo $hasilmar; ?>, <?php echo $hasilapr; ?>, <?php echo $hasilmei; ?>, <?php echo $hasiljun; ?>, <?php echo $hasiljul; ?>, <?php echo $hasilaug; ?>, <?php echo $hasilsep; ?>, <?php echo $hasiloct; ?>, <?php echo $hasilnov; ?>, <?php echo $hasildec; ?>],
                                                        backgroundColor: [
                                                            'rgba(255, 99, 132, 0.2)',
                                                            'rgba(54, 162, 235, 0.2)',
                                                            'rgba(255, 206, 86, 0.2)',
                                                            'rgba(75, 192, 192, 0.2)',
                                                            'rgba(153, 102, 255, 0.2)',
                                                            'rgba(255, 159, 64, 0.2)'
                                                        ],
                                                        borderColor: [
                                                            'rgba(255, 99, 132, 1)',
                                                            'rgba(54, 162, 235, 1)',
                                                            'rgba(255, 206, 86, 1)',
                                                            'rgba(75, 192, 192, 1)',
                                                            'rgba(153, 102, 255, 1)',
                                                            'rgba(255, 159, 64, 1)'
                                                        ],
                                                        borderWidth: 2
                                                    }]
                                                },
                                                options: {
                                                    scales: {
                                                        yAxes: [{
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Kriteria</h6>
                                   
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <script>
                                        var ctx = document.getElementById("myPieChart");
                                        var myPieChart = new Chart(ctx, {
                                            type: 'doughnut',
                                            data: {
                                                labels: ["Ulasan", "Rating", "Rating Konten", "Jumlah Download", "Size"],
                                                datasets: [{
                                                    data: [0.10, 0.10, 0.10, 0.10, 0.10],
                                                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#e74a3b', '#f6c23e'],
                                                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#e74a3b', '#f6c23e'],
                                                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                                                }],
                                            },
                                            options: {
                                                maintainAspectRatio: false,
                                                tooltips: {
                                                    backgroundColor: "rgb(255,255,255)",
                                                    bodyFontColor: "#858796",
                                                    borderColor: '#dddfeb',
                                                    borderWidth: 1,
                                                    xPadding: 15,
                                                    yPadding: 15,
                                                    displayColors: false,
                                                    caretPadding: 10,
                                                },
                                                legend: {
                                                    display: false
                                                },
                                                cutoutPercentage: 80,
                                            },
                                        });
                                    </script>

                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Ulasan
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Rating
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Rating Konten
                                        </span><br>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Download
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-dark"></i> Size
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Rating Sistem</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold star5" >Bintang 5 <span class="float-right"><?php echo $jumlah_star5; ?></span></h4>
                                    <div class="progress mb-4" onclick="window.location='halamankritiksaranadmin.php?id=5';">
                                        <div class="progress-bar bg-success" role="progressbar" style=" width:<?php echo $jumlah_star5; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Bintang 4 <span class="float-right"><?php echo $jumlah_star4; ?></span></h4>
                                    <div class="progress mb-4"  onclick="window.location='halamankritiksaranadmin.php?id=4';">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $jumlah_star4; ?>%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Bintang 3 <span class="float-right"><?php echo $jumlah_star3; ?></span></h4>
                                    <div class="progress mb-4" onclick="window.location='halamankritiksaranadmin.php?id=3';">
                                        <div class="progress-bar" role="progressbar" style="width:<?php echo $jumlah_star3; ?>%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Bintang 2 <span class="float-right"><?php echo $jumlah_star2; ?></span></h4>
                                    <div class="progress mb-4" onclick="window.location='halamankritiksaranadmin.php?id=2';">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $jumlah_star2; ?>%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" ></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Bintang 1 <span class="float-right"><?php echo $jumlah_star1; ?></span></h4>
                                    <div class="progress" onclick="window.location='halamankritiksaranadmin.php?id=1';">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width:<?php echo $jumlah_star1; ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sistem Rekomendasi Pemilihan Game Online dengan Metode SAW</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
                                    </div>
                                    <p style="text-align: justify;">Sistem dibangun dengan menggunakan bahasa pemrograman PHP Native, MYSQLi Database, dan Bootstrap. Sistem rekomendasi ini dibatasi hanya untuk game online saja.
                                        Jumlah game yang dijadikan acuan untuk sistem rekomendasi berjumlah 100 dengan kriteria yang digunakan yaitu jumlah review, rating, rating konten, jumlah download dan size. Kriteria-kriteria tersebut diambil dari playstore dengan kriteria yang sama.</p>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="proseslogout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

</body>

</html>