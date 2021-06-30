<?php
error_reporting(E_ERROR | E_PARSE);
include "koneksi.php";
require 'allfunction.php';



$starbox = 0;

if (isset($_GET["item"])) {
    $starbox = 1;
}

if (isset($_GET["item2"])) {
    $starbox = 2;
}

if (isset($_GET["item3"])) {
    $starbox = 3;
}

if (isset($_GET["item4"])) {
    $starbox = 4;
}

if (isset($_GET["item5"])) {
    $starbox = 5;
}

if (isset($_POST['input'])) {
    if (kritiksaran($_POST) > 0) {
        echo "<script language='javascript'>
        alert('Kritik dan saran berhasil tersimpan!')
        document.location='dashboardawal.php'</script>";
    } else {
        echo "<script language='javascript'>
        alert('Kritik dan saran gagal tersimpan')
        document.location='kritiksaran.php'</script>";
        die(mysqli_error($koneksi));
    }
}

?>


<!doctype html>
<html lang="en">

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        .card {
            display: inline-block;
            box-shadow: 2px 2px 30px black;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            margin: 2%;
        }

        .previous {
            background-color: #f1f1f1;
            color: black;
        }
    </style>
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
</head>

<body style="font-family: 'Courier New', Courier, monospace;">
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="icon-chevron-up"></i> </button> -->

    <nav class="navbar navbar-expand-sm bg-light navbar-light">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <!-- <button> -->
                <a style="color:black; background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none" class="nav-link previous" href="index.php"> &laquo; Home</a></i>
                <!-- </button> -->
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <form method="POST" action="kritiksaran.php" onSubmit="return validateForm()">
            <h1 class="mt-5 mb-3 fadeInRight" style="text-align: center">Kritik & Saran</h1>
            <div class="mb-3 mt-3 fadeInLeft">
                <label for="exampleFormControlInput1" class="form-label">Nama: </label>
                <input type="text" class="form-control" name="nama" placeholder="cth: Laurentius Rando" required>
            </div>
            <div class="mb-3 wow fadeInLeft">
                <label for="exampleFormControlTextarea1" class="form-label">Kritik & Saran</label>
                <textarea class="form-control" name="kritiksaran" id="exampleFormControlTextarea1" rows="5" placeholder="cth: Aplikasi ini sangat membantu saya dalam memilih game online" required></textarea>
            </div>
            <div class="mb-3 wow fadeInLeft">
                <label for="star">Pilih sesuai kepuasan anda</label>
                <br>
                <span class="star-rating">
                    <!--RADIO 1-->

                    <input type='checkbox' class="radio_item" value="1" name="item[]" id="radio1" >
                    <label class="label_item" for="radio1"> &#9734 </label>

                    <!--RADIO 2-->
                    <input type='checkbox' class="radio_item" value="2" name="item[]" id="radio2" >
                    <label class="label_item" for="radio2"> &#9734 </label>

                    <!--RADIO 3-->
                    <input type='checkbox' class="radio_item" value="3" name="item[]" id="radio3" >
                    <label class="label_item" for="radio3"> &#9734 </label>


                    <!--RADIO 4-->
                    <input type='checkbox' class="radio_item" value="4" name="item[]" id="radio4" >
                    <label class="label_item" for="radio4"> &#9734 </label>

                    <!--RADIO 5-->
                    <input type='checkbox' class="radio_item" value="5" name="item[]" id="radio5" >
                    <label class="label_item" for="radio5"> &#9734 </label>
                </span>
            </div>
            <div class="block pt-3 pb-3 wow fadeInLeft">
                <button type="submit" name="input" value="Submit" class="btn btn-primary mt-auto mb-auto btn-block tombol">Submit</button>
            </div>
        </form>
    </div>
    <!-- </div> -->

</body>
<br><br><br>

<script>
    $('.star-rating input').click(function() {
        starvalue = $(this).attr('value');

        // iterate through the checkboxes and check those with values lower than or equal to the one you selected. Uncheck any other.
        for (i = 0; i <= 5; i++) {
            if (i <= starvalue) {
                $("#radio" + i).prop('checked', true);
            } else {
                $("#radio" + i).prop('checked', false);
            }
        }
    });
</script>

</html>