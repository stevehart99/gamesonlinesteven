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

// if (isset($_POST['bobot'])) {
//     $id = $_POST['id'];
//     $ulasan = $_POST['ulasan'];
//     $rating = $_POST['rating'];
//     $violance = $_POST['violance'];
//     $download = $_POST['download'];
//     $size = $_POST['size'];

//     $query = "UPDATE bobot
//     SET ulasan ='$ulasan',
//         rating = '$rating',
//         violance = '$violance',
//         download = '$download',
//         size = '$size'
//         WHERE id = '$id'";
//     $run = mysqli_query($koneksi, $query);
// }

if (isset($_POST['bobot'])) {
    $w1 = $_POST['ulasan'];
    $w2 = $_POST['rating'];
    $w3 = $_POST['violance'];
    $w4 = $_POST['download'];
    $w5 = $_POST['size'];

    $totalbobot = $w1 + $w2 + $w3 + $w4 + $w5;

    $W1 = $w1 / $totalbobot;
    $W2 = $w2 / $totalbobot;
    $W3 = $w3 / $totalbobot;
    $W4 = $w4 / $totalbobot;
    $W5 = $w5 / $totalbobot;
}

error_reporting(E_ERROR | E_PARSE);

// $sqlBobot = mysqli_query($koneksi, "SELECT ulasan as bobot1, 
//                                             rating as bobot2, 
//                                             violance as bobot3, 
//                                             download as bobot4,
//                                             size as bobot5
//                                             from bobot");

// $bobot = mysqli_fetch_array($sqlBobot);



$nmr = 1;
$nmr2 = 1;


$sqlKriteria = mysqli_query($koneksi, "SELECT * FROM game") or die(mysqli_error($koneksi));
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pengujian Sistem</title>

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
    <style>
        @media(max-width: 500px) {
            .table thead {
                display: none;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 15px;
            }

            .table td {
                text-align: right;
                padding-left: 50%;
                text-align: right;
                position: relative;
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-size: 12px;
                font-weight: bolder;
                text-align: left;
            }
        }
    </style>
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
                    <h3>Pengujian</h3>
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
                    <div class="card mt-3">

                        <div class="card-header bg-warning text-white">
                            Cari Games
                        </div>
                        <div class="card-body">
                            <form name="form-input" method="post" action="halamanperhitunganadmin.php">
                                <input type="hidden" name="id" id="id" value="1">
                                <div class="form-group">
                                    <label for="ulasan">Ulasan </label>
                                    <select class="form-control" name="ulasan" required>
                                         <option value=""> --Select--</option>
                                <option value="5" >> 50jt review</option>
                                <option value="4">20jt - 50jt review</option>
                                <option value="3" >1jt - 10jt review</option>
                                <option value="2" >10rb - 100rb review</option>
                                <option value="1" >< 10rb review</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="rating" placeholder="Masukkan Rating" oninvalid="this.setCustomValidity('Masukkan harus berupa angka desimal. cth: 4.5')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+([\.][0-9]+)"> -->
                                </div>

                                <div class="form-group">
                                    <label for="rating">Rating </label>
                                    <select class="form-control" name="rating" required>
                                        <option value=""> --Select--</option>
                                        <option value="5">5.0</option>
                                        <option value="4">4.0 - 4.5</option>
                                        <option value="3">3.0 - 3.9</option>
                                        <option value="2">2.0 - 2.9</option>
                                        <option value="1">
                                            < 2.0</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="rating" placeholder="Masukkan Rating" oninvalid="this.setCustomValidity('Masukkan harus berupa angka desimal. cth: 4.5')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+([\.][0-9]+)"> -->
                                </div>
                                <div class="form-group">
                                    <label for="violance">Rating Konten </label>
                                    <select class="form-control" name="violance" required>
                                      <option value="" style="font-size:16px;"> --Select--</option>
                                <option value="5">3+ (Beberapa kekerasan dalam konteks komikal atau fantasi dapat diterima. Bahasa buruk tidak diizinkan)</option>
                                <option value="4" >7+ (Dapat berisi beberapa adegan atau suara yang menakutkan. Kekerasan ringan)</option>
                                <option value="3">12+ (Kekerasan sedang. Ketelanjangan non-grafis, simulasi perjudian, kata kasar seksual tidak diizinkan) </option>
                                <option value="2" >16+ (Kekerasan realistis, aktivitas seksual, makian, penggunaan obat-obatan)</option>
                                <option value="1">18+ (Kekerasan berat seperti kekerasan seksual, tindakan diskriminasi, pujian terhadap penggunaan obat terlarang)
                                </option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="violance" placeholder="Masukkan violance" oninvalid="this.setCustomValidity('Masukkan harus berupa angka saja!')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+"> -->
                                </div>
                                <div class="form-group">
                                    <label for="download">Jumlah Download </label>
                                    <select class="form-control" name="download" required>
                                         <option value=""> --Select--</option>
                                <option value="5">> 1 milyar</option>
                                <option value="4">100jt - 1 milyar</option>
                                <option value="3" >1jt - 10jt</option>
                                <option value="2">10rb - 100rb</option>
                                <option value="1">< 1rb</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="download" placeholder="Masukkan Kontrol" oninvalid="this.setCustomValidity('Masukkan harus berupa angka desimal. cth: 4.5')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+([\.][0-9]+)"> -->
                                </div>
                                <div class="form-group">
                                    <label for="size">Size <font size="1">(mb)</font> </label>
                                    <select class="form-control" name="size" required>
                                         <option value=""> --Select--</option>
                                <option value="1" >> 1GB</option>
                                <option value="2">700MB - 1GB</option>
                                <option value="3" >400MB - 600MB</option>
                                <option value="4">100MB - 300MB</option>
                                <option value="5">< 300MB</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="size" placeholder="Masukkan Size" oninvalid="this.setCustomValidity('Masukkan harus berupa angka saja!')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+"> -->
                                </div>
                                <center><input onclick="toBottom()" type="submit" class="btn btn-success" name="bobot" value="Input">
                                    <input type="reset" class="btn btn-danger" name="batal" value="Batal">
                                </center>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-danger text-white">
                            Normalisasi R
                        </div>
                        <div class="card-body">
                            <?php
                            include "koneksi.php";
                            $nmr = 1;
                            ?>
                            <!-- <table class="table table-striped table-bordered table-responsive-lg">
                    <thead class="thead-dark"> -->
                            <table class="table table-striped myTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <!-- <font size="1">(mb)</font> -->
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nmr = 1;
                                    $sqlMax = mysqli_query($koneksi, "SELECT MAX(ulasan) as MAX1,
                                                            MAX(rating) as MAX2,
                                                            MIN(violance) as MIN3,
                                                            MAX(download) as MAX4,
                                                            MIN(size) as MIN5
                                                            FROM kriteria
                                                            INNER JOIN game 
                                                            ON game.id = kriteria.id_game");
                                    $max = mysqli_fetch_array($sqlMax);

                                    $sqlKriteria = "SELECT * 
                                     FROM kriteria
                                     INNER JOIN game 
                                     ON game.id = kriteria.id_game";


                                    $hasil = mysqli_query($koneksi, $sqlKriteria);
                                    while ($row = mysqli_fetch_array($hasil)) {
                                    ?>
                                        <tr>
                                            <td data-label="No."><?php echo $nmr; ?></td>
                                            <td data-label="Nama" style="font-size: 11px;"><?php echo $row['nama']; ?></td>
                                            <td data-label="C1"><?php echo round($row['ulasan'] / $max['MAX1'], 7); ?></td>
                                            <td data-label="C2"><?php echo round($row['rating'] / $max['MAX2'], 7); ?></td>
                                            <td data-label="C3"><?php echo round($max['MIN3'] / $row['violance'], 7); ?></td>
                                            <td data-label="C4"><?php echo round($row['download'] / $max['MAX4'], 7); ?></td>
                                            <td data-label="C5"><?php echo round($max['MIN5'] / $row['size'], 7); ?></td>
                                        </tr>
                                    <?php
                                        $nmr++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>

                    </div>

                    <div class="card mt-3">
                        <div class="card-header bg-success text-white">
                            Ranking
                        </div>
                        <div class="card-body">
                            <?php
                            include "koneksi.php";
                            $nmr2 = 1;
                            ?>

                            <br>
                            <table class="table table-striped myTable2  ">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Ranking</center>
                                        </th>
                                        <th>
                                            <center>Nama</center>
                                        </th>
                                        <th>
                                            <center>Nilai</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $w = array(0.16, 0.30, 0.20, 0.30, 0.04);

                                    $sqlRank = mysqli_query($koneksi, "
                        SELECT MAX(ulasan) as MAX1,
                        MAX(rating) as MAX2,
                        MIN(violance) as MIN3,
                        MAX(download) as MAX4,
                        MIN(size) as MIN5
                        FROM 
                        kriteria
                        INNER JOIN game ON game.id = kriteria.id_game");

                                    $max = mysqli_fetch_array($sqlRank);

                                    $sqlRank = "SELECT * FROM kriteria
                        INNER JOIN game ON game.id = kriteria.id_game";

                                    $rank = mysqli_query($koneksi, $sqlRank);

                                    //             $sqlBobot = mysqli_query($koneksi, "SELECT ulasan as bobot1, 
                                    // rating as bobot2, 
                                    // violance as bobot3, 
                                    // download as bobot4,
                                    // size as bobot5
                                    // from bobot");

                                    //             $bobot = mysqli_fetch_array($sqlBobot);


                                    while ($row = mysqli_fetch_array($rank)) {
                                        $saw = round(
                                            (($row['ulasan'] / $max['MAX1']) * $W1) +
                                                (($row['rating'] / $max['MAX2']) * $W2) +
                                                (($max['MIN3'] / $row['violance']) * $W3) +
                                                (($row['download'] / $max['MAX4']) * $W4) +
                                                (($max['MIN5'] / $row['size']) * $W5),
                                            6
                                        );
                                        $row['saw'] = $saw;

                                        $data[] = array(
                                            'nama' => $row['nama'],
                                            'ulasan' => $row['ulasan'],
                                            'rating' => $row['rating'],
                                            'violance' => $row['violance'],
                                            'download' => $row['download'],
                                            'size' => $row['size'],
                                            'saw' => $saw
                                        );
                                    }

                                    foreach ($data as $key => $isi) {
                                        $saw1[$key] = $isi['saw'];
                                    }
                                    array_multisort($saw1, SORT_DESC, $data);
                                    ?>
                                    <?php
                                    $nmr2 = 1;
                                    foreach ($data as $item) {
                                        echo "<tr>
                                        <td data-label='Rank'>$nmr2</td>
                                        <td data-label='Nama'>$item[nama]</td>
                                        <td data-label='SAW'>$item[saw]</td>   
                                    </tr>"
                                    ?>
                                    <?php
                                        $nmr2++;
                                    }
                                    ?>
                                </tbody>
                            </table>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#toBottom").click(function() {
                $("html, body").animate({
                    scrollTop: $(
                        'html, body').get(0).scrollHeight
                }, 2000);
            });
        });

        $(document).ready(function() {
            $('.myTable').DataTable();
        });

        $(document).ready(function() {
            $('.myTable2').DataTable();
        });

        $(document).ready(function() {
            $(".scrollToBottom").click(function() {
                $('html,body').animate({
                    scrollTop: $($document).height()
                }, 1000);
                return false;
            });
        })
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <!-- Core plugin JavaScript-->
    <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->


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