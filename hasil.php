<?php


error_reporting(E_ERROR | E_PARSE);
include "koneksi.php";

// $b1 = $_POST['ulasan'];
// $b2 = $_POST['rating'];
// $b3 = $_POST['violance'];
// $b4 = $_POST['download'];
// $b5 = $_POST['alur'];
// $b6 = $_POST['size'];

// $b = array($b1, $b2, $b3, $b4, $b5, $b6);

// $c1 = $b1 * $a[0];
// $c2 = $b2 * $a[1];
// $c3 = $b3 * $a[2];
// $c4 = $b4 * $a[3];
// $c5 = $b5 * $a[4];
// $c6 = $b6 * $a[5];

// $a = array(0.16, 0.30, 0.20, 0.30, 0.04);

// // fetch bobot
// $sqlBobot = mysqli_query($koneksi, "SELECT ulasan as bobot1, 
//                                             rating as bobot2, 
//                                             violance as bobot3, 
//                                             download as bobot4,
//                                             size as bobot5
//                                             from bobot");

// $bobot = mysqli_fetch_array($sqlBobot);
if (isset($_POST['bobot'])) {
    $w1 = $_POST['ulasan'];
    $w2 = $_POST['rating'];
    $w3 = $_POST['violance'];
    $w4 = $_POST['download'];
    $w5 = $_POST['size'];
    $sum = $_POST['history'];
    $totalbobot = $w1 + $w2 + $w3 + $w4 + $w5;

    $W1 = $w1 / $totalbobot;
    $W2 = $w2 / $totalbobot;
    $W3 = $w3 / $totalbobot;
    $W4 = $w4 / $totalbobot;
    $W5 = $w5 / $totalbobot;
    
    $query = "INSERT INTO history(sum, datee2) VALUES('$sum', CURDATE());";
    $run = mysqli_query($koneksi, $query);
}


// fetch data MAX (benefit) dan MIN(cost)
$sqlMax = mysqli_query($koneksi, "SELECT MAX(ulasan) as MAX1,
                                                        MAX(rating) as MAX2,
                                                        MIN(violance) as MIN3,
                                                        MAX(download) as MAX4,
                                                        MIN(size) as MIN5
                                                        from kriteria
                                                        inner join game
                                                        on game.id = kriteria.id_game");


$max = mysqli_fetch_array($sqlMax);

$nmr = 1;
$nmr2 = $nmr - 1;

$sqlKriteria = mysqli_query($koneksi, "SELECT * FROM kriteria INNER JOIN game ON game.id = kriteria.id_game") or die(mysqli_error($koneksi));

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <!-- <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Rekomendasi Game</title>

    <style type="text/css">
        .body {
            background-color: white;
        }

        * {
            margin: 0px;
            padding: 0px;
        }

        .main {

            margin: 2%;
        }

        .card {
            width: 20%;
            display: inline-block;
            box-shadow: 2px 2px 20px blue;
            border-radius: 5px;
            margin: 2%;
        }

        .card1 {
            width: 30%;
            display: inline-block;
            box-shadow: 5px 5px 60px gold;
            border-radius: 5px;
            margin: 2%;
        }

        .image img {
            width: 100%;
            height: 250px;
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
        }

        .image2 img {
            width: 100%;
            height: 400px;
            border-top-right-radius: 5px;
            border-top-left-radius: 5px;
        }

        .title {

            text-align: center;
            padding: 10px;

        }

        h1 {
            font-size: 20px;
        }


        /* .card {
            font-size: 1em;
            overflow: hidden;
            padding: 5;
            border: none;
            border-radius: .28571429rem;
            box-shadow: 5px 5px 30px white;
            margin-top: 20px;
        } */

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: red;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: #555;
        }

        .column {
            float: left;
            padding: 10px;
        }

        .column2 {
            float: center;
            padding: 10px;
        }

        .column3 {
            float: center;
            padding: 10px;
        }

        .column4 {
            float: center;
            padding: 10px;
        }
        
        .column5 {
            float: center;
            padding: 10px;
        }

        .left {
            width: 50%;
        }

        .right {
            width: 50%;
        }

        .middle2 {
            width: 100%;
        }

        .middle3 {
            width: 100%;
        }

        .middle4 {
            width: 100%;
        }
        
        .middle5 {
            width: 100%;
        }

        h3 {
            font-size: 15px;
        }

        h6 {
            font-size: 13px;
            font-weight: bold;
        }

        @media screen and (max-width:1000px) {
            .card {
                width: 40%
            }

            h3 {
                font-size: 15px;
                font-weight: bold;
            }
        }

        @media screen and (max-width:620px) {

            .card,
            .card1 {
                width: 100%;
            }

            h3 {
                font-size: 13px;
                font-weight: bold;
            }

            .card1 {
                box-shadow: 1px 1px 10px gold;
            }

            .card {

                box-shadow: 2px 2px 10px blue;
            }

            .kartu {
                padding-right: 30px
            }


        }
    </style>
</head>

<body style="font-family: 'Courier New', Courier, monospace;">
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="icon-chevron-up"></i> </button>

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <button style="background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none">
            <a style="color:black;" class="nav-link" href="dashboardawal.php"> &laquo; Cari Lagi</a></i>
        </button>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">


                <button style=" background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none">
                    <a style="color:black;" class="nav-link" href="kritiksaran.php">Kritik dan Saran</a></i>
                </button>
            </li>
        </ul>
    </nav>
    <div class="container-fluid kartu">
        <?php
        while ($row = mysqli_fetch_array($sqlKriteria)) {
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
                'gambar' => $row['gambar'],
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
        foreach ($data as $item) {

            if ($item['saw'] == 0) {
                echo "<script language='javascript'>
                alert('Inputan anda tidak benar!')
                document.location='index.php'</script>";
                return false;
            }
            if ($item['saw'] != 0)
                // if ($nmr == 2)
                echo " <center>
                <div class='card1 text-center'>
                    <div style='color:red;background-color:#FFD700;' class='card-header'>
                  <h1><b>Rank $nmr</b></h1>
                    </div>
                            <div class='image2'>
                                <img src='gambar/$item[gambar]'>
                            </div>
                            <div class='title text-center' style='color:red;background-color:#FFD700;'>
                            <h3><b>$item[nama]<b></h3>
                            </div>
                            <div style='background-color:white';>
                            <div class='column left'>
                            <h3>Rating: <i class='icon-star'></i>&nbsp;$item[rating]</h3>
                            </div>
                            <div class='column right'>
                            <h3>Size: <i class='icon-download-alt'></i> $item[size] Mb</h3>
                            </div>

                            <div class='column2 middle2'>
                            <h3>Download: $item[download]+</h3>
                            </div>


                            <div class='column3 middle3'>
                            <h3>Ulasan: <i class='icon-comments'></i> $item[ulasan]</h3>

                            </div>

                            <div class='column4 middle4'>
                            <h3>Rating Kekerasan: $item[violance]</h3>

                            </div>
                             <div class='column5 middle5'>
                                    <button type='button' class='btn btn-warning'><a href='https://play.google.com/store/search?q=$item[nama]&c=apps' target='_blank' rel='noopener noreferrer' style='color:white;'><i class='icon-download-alt'></i></a></button>
                                </div>
                            </div>
                            </div>
                            </center>
                                        "
        ?>
        <?php
            $nmr++;
            $nmr2++;
            if ($nmr == 2) break;
        }
        ?>
        <br>

        <!-- card kedua -->
        <?php
        foreach ($data as $item) {

            if ($item['saw'] == 0)  break;
            if ($item['saw'] != 0)
                if ($nmr > 2 && $nmr <= 6)
                    echo "<div class='card text-center'>
                    <div style='color:white;background-color:royalblue;' class='card-header'>
                    <h1>Rank $nmr2</h1>
                    </div>
                            <div class='image'>
                                <img src='gambar/$item[gambar]'>
                            </div>
                            <div class='title' style='color:white;background-color:royalblue;'>
                                <h6>$item[nama]</h6>
                            </div>
                            <div class='body'>
                                <div class='column left'>
                                <h6>Rating: <i class='icon-star'></i>&nbsp;$item[rating]</h6>
                                </div>
                                <div class='column right'>
                                <h6>Size: <i class='icon-download-alt'></i> $item[size] Mb</h6>
                                </div>

                                <div class='column2 middle2'>
                                <h6>Download: $item[download]+</h6>
                                </div>


                                <div class='column3 middle3'>
                                <h6>Ulasan: <i class='icon-comments'></i> $item[ulasan]</h6>

                                </div>

                                <div class='column4 middle4'>
                                <h6>Rating Kekerasan: $item[violance]</h6>

                                </div>
                                
                                <div class='column5 middle5'>
                                    <button type='button' class='btn btn-primary'><a href='https://play.google.com/store/search?q=$item[nama]&c=apps' target='_blank' rel='noopener noreferrer' style='color:white;'><i class='icon-download-alt'></i></a></button>
                                </div>
                      

                    
                          
                         
                            
                            </div>
                        
                            </div>
                                        "
        ?>
        <?php
            $nmr++;
            $nmr2++;
        }
        ?>
        <!--  -->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.myTable').DataTable();
        });

        function validateForm() {
            var x = document.forms["form-input"]["username"].value;
            if (x == "" || x == null) {
                alert("Anda belum memasukan username");
                return false;
            }
            var x = document.forms["form-input"]["password"].value;
            if (x == "" || x == null) {
                alert("Anda belum memasukan password");
                return false;
            }
        }

        function openLoginForm() {
            document.body.classList.add("showLoginForm");
        }

        function closeLoginForm() {
            document.body.classList.remove("showLoginForm");
        }
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

    </script>
</body>
<br>
<!-- <div style="background-color:#343a40; color:white; font-family: 'Courier New', Courier, monospace;" class="footer-copyright text-center py-3">© 2020 Copyright:
    <a style="color:white;"> Sistem Rekomendasi Pemilihan Game Mobile</a>
</div> -->

</html>