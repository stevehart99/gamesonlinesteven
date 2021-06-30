<?php
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

include "koneksi.php";
require 'allfunction.php';

if (isset($_POST['input'])) {
    if (tambah($_POST) > 0) {
        echo "<script language='javascript'>
        alert('Data berhasil tersimpan!')
        document.location='halamanlistgameadmin.php'</script>";
    } else {
        echo "<script language='javascript'>
                    alert('Data gagal tersimpan')
                    document.location='halamanlistgameadmin.php'</script>";
        die(mysqli_error($koneksi));
    }
}

if (isset($_POST["ubah"])) {
    if (edit($_POST) > 0) {
        echo "<script language='javascript'>
        alert('Data berhasil tersimpan!')
        document.location='halamanlistgameadmin.php'</script>";
    } else {
        echo "<script language='javascript'>
                    alert('Data gagal tersimpan')
                    document.location='halamanlistgameadmin.php'</script>";
        die(mysqli_error($koneksi));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Games</title>

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
                font-size: 13px;
                text-align: right;
                position: relative;
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 0;
                width: 50%;
                padding-left: 15px;
                font-size: 13px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>

    <script>
        function validateForm() {

        }

        function validateFormedit() {
            var x = document.forms["form-input"]["violance"].value;
            if(x != 3 && x != 7 && x!= 12 && x!= 16 && x!=18){
                alert("Rating Konten yang boleh dimasukan hanya: 3, 7, 12, 16, 18 saja.");
                return false;
            }

        }
    </script>
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
                    </button> <!-- Topbar Navbar -->
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
                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8 text-center">

                            <!-- Button trigger modal -->

                            <button type="button" style="float: right;" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="icon-plus "></i> &nbsp;Tambah Game
                            </button>
                            <br><br>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" role="dialog" arialabelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#007bff;color:white;">
                                            <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;"> Tambah Game</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form name="form-input" method="post" action="halamanlistgameadmin.php" enctype="multipart/form-data" onSubmit="return validateForm()">
                                                <div class="form-group" style="padding:1px 30px;">
                                                    <input type="hidden" name="id_game">
                                                    <label for="nama" style="float: left;">Nama Game : </label>
                                                    <input type="text" class="form-control" name="nama" placeholder="Cth: Cyberpunk 2077" required>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="form-group" style="padding:1px 30px;">
                                                            <label for="ulasan" style="float: left;">Ulasan : </label>
                                                            <input type="number" class="form-control" name="ulasan" placeholder="Cth: 1000000">
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group" style="padding:1px 30px;">
                                                            <label for="rating" style="float: left;">Rating : </label>
                                                              <input type="number" class="form-control" name="rating" placeholder="Cth: 4.5" min=1.0 max=5.0 step='0.1' oninvalid="this.setCustomValidity('Masukkan harus di antara 1.0 sampai 5.0')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+([\.][0-9]+)">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="form-group" style="padding:1px 30px;">
                                                            <label for="violance" style="float: left;">Rating Konten : </label>
                                                             <select class="form-control" name="violance" required>
                                                                <option value=""> --Select--</option>
                                                                <option value="3">3</option>
                                                                <option value="7">7</option>
                                                                <option value="12">12</option>
                                                                <option value="16">16</option>
                                                                <option value="18">18</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group" style="padding:1px 30px;">
                                                            <label for="download" style="float: left;">Jumlah Download : </label>
                                                            <input type="number" class="form-control" name="download" placeholder="Cth: 100000000">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col">
                                                        <div class="form-group" style="padding:1px 30px;">
                                                            <label for="size" style="float: left;">Size <font size="1">(mb)</font> : </label>
                                                            <input type="number" class="form-control" name="size" placeholder="Cth: 100">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group" style="padding:8px 30px;">
                                                    <label for="gambar" style="float: left;">Pilih Gambar : </label>
                                                    <input type="file" class="form-control" name="gambar" id="gambar">
                                                </div>
                                        </div>
                                        <div class="modal-footer" style="background-color:#007bff;">
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                            <input type="submit" class="btn btn-success" name="input" value="Input">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                            include "koneksi.php";
                            $nmr = 1;
                            ?>
                            <table class="table myTable table-bordered ">
                                <thead style="background-color: #4e73df; color:white;">
                                    <tr>
                                        <th>ID</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Ulasan</th>
                                        <th>Rating</th>
                                        <th>Rating Konten</th>
                                        <th style="font-size:13px;">Jumlah Download</th>
                                        <th>Size<br>
                                            <font size="1">(mb)</font>
                                        </th>
                                        <th>Edit</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = mysqli_query($koneksi, "SELECT * FROM game INNER JOIN kriteria ON kriteria.id_game = game.id") or die(mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <tr>
                                            <td data-label="ID"><?php echo $row['id']; ?></td>
                                            <td data-label="Gambar"><img style="widht:60px;height:60px;" src="gambar/<?php echo $row["gambar"]; ?>" alt="" srcset=""></td>
                                            <td data-label="Nama"><?php echo $row['nama']; ?></td>
                                            <td data-label="Ulasan"><?php echo $row['ulasan']; ?></td>
                                            <td data-label="Rating"><?php echo $row['rating']; ?></td>
                                            <td data-label="Rating Konten"><?php echo $row['violance']; ?></td>
                                            <td data-label="Jumlah Download"><?php echo $row['download']; ?></td>
                                            <td data-label="Size"><?php echo $row['size']; ?></td>
                                            <td data-label="Edit">
                                                <a style="color: #4CAF50;" data-toggle="modal" data-target="#editModal<?php echo $row['id']; ?>"><i class="icon-edit"></i></a>
                                            </td>
                                            <td data-label="Hapus">
                                                <a style="color: red;" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href='hapuskriteria.php?hapus=<?php echo $row['id']; ?>'><i class="icon-remove"></i></a>
                                            </td>
                                        </tr>

                                        <!-- Modal edit -->
                                        <div class="modal fade" id="editModal<?php echo $row['id']; ?>" role="dialog" arialabelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:#4CAF50;color:white;">
                                                        <h5 class="modal-title" id="exampleModalLabel" style="text-align:center;"> Edit Game</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form name="form-input" method="post" action="halamanlistgameadmin.php"  enctype="multipart/form-data" >
                                                            <?php
                                                            $id = $row['id'];
                                                            $query_edit = mysqli_query($koneksi, "SELECT * FROM game INNER JOIN kriteria ON kriteria.id_game = game.id WHERE id='$id'");
                                                            while ($row = mysqli_fetch_array($query_edit)) {
                                                            ?>
                                                                <div class="form-group" style="padding:1px 30px;">
                                                                    <label for="id" style="float: left;">ID :</label>
                                                                    <input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>

                                                                </div>
                                                                <div class="form-group" style="padding:1px 30px;">
                                                                    <label for="nama" style="float: left;">Nama Game : </label>
                                                                    <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>" required>
                                                                </div>
                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <div class="form-group" style="padding:1px 30px;">
                                                                            <label for="ulasan" style="float: left;">Ulasan : </label>
                                                                            <input type="number" class="form-control" name="ulasan" value="<?php echo $row['ulasan']; ?>" required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col">
                                                                        <div class="form-group" style="padding:1px 30px;">
                                                                            <label for="rating" style="float: left;">Rating : </label>
                                                                              <input type="number" class="form-control" name="rating" step="0.1" min=1.0 max=5.0 value="<?php echo $row['rating']; ?>" oninvalid="this.setCustomValidity('Masukkan harus di antara 1.0 sampai 5.0')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]{1}([\.][0-9]+)" required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">
                                                                    <div class="col">
                                                                        <div class="form-group" style="padding:1px 30px;">
                                                                            <label for="violance" style="float: left;">Rating Konten : </label>
                                                                             <select class="form-control" name="violance" required>
                                                                                <option value=""> --Select--</option>
                                                                                <option value="3"<?= $row['violance'] == '3' ? ' selected="selected"' : '';?>>3</option>
                                                                                <option value="7"<?= $row['violance'] == '7' ? ' selected="selected"' : '';?>>7</option>
                                                                                <option value="12"<?= $row['violance'] == '12' ? ' selected="selected"' : '';?>>12</option>
                                                                                <option value="16"<?= $row['violance'] == '16' ? ' selected="selected"' : '';?>>16</option>
                                                                                <option value="18"<?= $row['violance'] == '18' ? ' selected="selected"' : '';?>>18</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col">
                                                                        <div class="form-group" style="padding:1px 30px;">
                                                                            <label for="download" style="float: left;">Jumlah Download : </label>
                                                                            <input type="number" class="form-control" name="download" value="<?php echo $row['download']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-4">

                                                                    <div class="col">
                                                                        <div class="form-group" style="padding:1px 30px;">
                                                                            <label for="size" style="float: left;">Size <font size="1">(mb)</font> : </label>
                                                                            <input type="number" class="form-control" name="size" value="<?php echo $row['size']; ?>" required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group" style="padding:1px 30px;">
                                                                    <label for="gambar" style="float: left;">Pilih Gambar : </label>
                                                                    <img style="width: 60px; height:60px;" src="gambar/<?php echo $row['gambar']; ?>">
                                                                    <input type="hidden" name="gambarLama" id="gambarLama" value="<?php echo $row['gambar']; ?>">
                                                                    <input type="file" class="form-control" name="gambar">
                                                                </div>
                                                    </div>
                                                    <div class="modal-footer" style="background-color:#4CAF50;">
                                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                        <input type="submit" class="btn btn-success" name="ubah" value="Update">
                                                    </div>
                                                <?php
                                                            }
                                                ?>
                                                </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Edit End -->
                                    <?php
                                        $nmr++;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <div class="col-sm-2">
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