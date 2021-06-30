<?php
include "koneksi.php";
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
$sort = $_GET['sort'];


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

$nmr = 1;

include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .card {
            width: 90%;
            display: inline-block;
            box-shadow: 2px 2px 10px black;
            border-radius: 20px;
            margin: 20px;
        }

        ol {
            list-style-type: none;
        }
        .button:hover{
            background-color: #f6c23e;
        }
    
        
        
          @media screen and (max-width:1000px) {
            .card {
                width: 100%
            }


        }

        @media screen and (max-width:620px) {

            .card {
                width: 90%;
                padding-right: 60px;
            }

            img {
                width: 100%;
            }

        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Kritik dan Saran</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin SPK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboardadmin.php">
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
                    <span>Pengujian</span>
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

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin SPK</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="index.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm padfa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 style="text-align: center; font-weight: bold;">Kritik dan Saran</h1>
<br><br><br>
<div>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <?php
                    for ($i = 0; $i < 5; $i++) { ?>
                        <?php echo "
                        <img src='bintang.png' class='bintang' style='width: 2%;'>" ?>
                    <?php
                    }
                    ?>
                    <?php echo $jumlah_star5; ?>
                       <br><br>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    for ($i = 0; $i < 4; $i++) { ?>
                        <?php echo "
                        <img src='bintang.png' class='bintang' style='width: 2%;'>" ?>
                    <?php
                    }
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $jumlah_star4; ?>
                    <br><br>
                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    for ($i = 0; $i < 3; $i++) { ?>
                        <?php echo "
                        <img src='bintang.png' class='bintang' style='width: 2%;'>" ?>
                    <?php
                    }
                    ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $jumlah_star3; ?>
                       <br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    for ($i = 0; $i < 2; $i++) { ?>
                        <?php echo "
                        <img src='bintang.png' class='bintang' style='width: 2%;'>" ?>
                    <?php
                    }
                    ?>
                         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $jumlah_star2; ?>
                         <br><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    for ($i = 0; $i < 1; $i++) { ?>
                        <?php echo "
                        <img src='bintang.png' class='bintang' style='width: 2%;'>" ?>
                    <?php
                    }
                    ?>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php echo $jumlah_star1; ?>
                    <br><br><br>
                    <button class="btn btn-light border-warning tombol" style="margin-left:60px;" onclick="window.location='halamankritiksaranadmin.php?id=0';"> 
                         All
                        <i class="fas fa-star" style="color: #ffca08"></i>
                    </button>
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <button class="btn btn-light border-warning " onclick="window.location='halamankritiksaranadmin.php?id=5';"> 
                         5
                        <i class="fas fa-star" style="color: #ffca08"></i>
                    </button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button class="btn btn-light border-warning " onclick="window.location='halamankritiksaranadmin.php?id=4';"> 
                         4
                        <i class="fas fa-star" style="color: #ffca08"></i>
                    </button>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     <button class="btn btn-light border-warning " onclick="window.location='halamankritiksaranadmin.php?id=3';"> 
                         3
                        <i class="fas fa-star" style="color: #ffca08"></i>
                    </button>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     <button class="btn btn-light border-warning " onclick="window.location='halamankritiksaranadmin.php?id=2';"> 
                         2
                        <i class="fas fa-star" style="color: #ffca08"></i>
                    </button>
                     &nbsp;&nbsp;&nbsp;&nbsp;
                     <button class="btn btn-light border-warning " onclick="window.location='halamankritiksaranadmin.php?id=1';"> 
                         1
                        <i class="fas fa-star" style="color: #ffca08"></i>
                    </button>
                   
                    <!-- <div class="card"> -->
                    <!-- <div class="col-sm-2">
    </div> -->
                    <!-- <div class="col-sm-8 text-center"> -->
                    <ol>
                        <?php
                        if($id > 0 && $id <=5){
                        $sql = mysqli_query($koneksi, "SELECT * FROM kritiksaran WHERE star = $id ORDER BY datee DESC") or die(mysqli_error($koneksi));
                            
                        }elseif($id == 0){
                            $sql = mysqli_query($koneksi, "SELECT * FROM kritiksaran ORDER BY datee DESC") or die(mysqli_error($koneksi));
                        }elseif($id > 5){
                            $sql = mysqli_query($koneksi, "SELECT * FROM kritiksaran ORDER BY datee DESC") or die(mysqli_error($koneksi));
                        }
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>
                      

                            <div class="card" style="padding: 10px;">
                                <li>&nbsp; <?php echo $row['nama']; ?> <br>



                                    <?php
                                    $rating = $row['star'];
                                    for ($i = 0; $i < $rating; $i++) {
                                    ?>
                                        <?php echo "<img style='width:2%; background-color:white;' src='star.png' alt='*'>"; ?>
                                    <?php
                                    } ?>
                                    <?php echo strftime('%d/%m/%Y', strtotime($row['datee'])); ?>
                                    <i>

                                        <br><br>
                                        <b>
                                            "<?php echo $row['kritiksaran']; ?>"<br><br>

                                        </b>
                                    </i>
                                </li>

                            </div>



                        <?php
                            $nmr++;
                        }
                        ?>
                    </ol>
                    <!-- </div> -->
                    <div class="col-sm-2">
                    </div>
                    <!-- </div> -->
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Rekomendasi Pemilihan Game Online dengan SPK 2021</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan tombol logout untuk keluar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
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

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.myTable').DataTable();
        });
    </script>

</body>

</html>