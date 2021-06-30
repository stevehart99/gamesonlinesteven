    <?php
    include "koneksi.php";

    if (isset($_POST['bobot'])) {
        $id = $_POST['id'];
        $ulasan = $_POST['ulasan'];
        $rating = $_POST['rating'];
        $violance = $_POST['violance'];
        $download = $_POST['download'];
        $size = $_POST['size'];


        $query = "UPDATE bobot
        SET ulasan ='$ulasan',
            rating = '$rating',
            violance = '$violance',
            download = '$download',
            size = '$size'
            WHERE id = '$id'";
        $run = mysqli_query($koneksi, $query);

        if ($run) {
            echo "<script language='javascript'>
            alert('Data anda selesai diproses!')
            document.location='hasil.php'</script>";
        } else {
            echo '<script type="text/javascript">
            alert("Data anda tidak selesai diproses")
            </script>';
        }
    }

    ?>
    <!doctype html>
    <html lang="en">

    <head>
        <!--  d meta tags -->
        <title>Cari Games</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
        <style>
            .background{
                 background-image: url("kartu.jpg");
                  
            }
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

            /* Full-width input fields */
            input[type=text],
            input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            /* Set a style for all buttons */
            .button2 {
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 100%;
            }

            .button2:hover {
                opacity: 0.8;
            }


            /* Center the image and position the close button */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }


            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* The Modal (background) */
            .modal {
                display: none;
                /* Hidden by default */
                position: fixed;
                /* Stay in place */
                z-index: 1;
                /* Sit on top */
                left: 0;
                top: 0;
                width: 100%;
                /* Full width */
                height: 100%;
                /* Full height */
                overflow: auto;
                /* Enable scroll if needed */
                background-color: rgb(0, 0, 0);
                /* Fallback color */
                background-color: rgba(0, 0, 0, 0.4);
                /* Black w/ opacity */
                padding-top: 60px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto;
                /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 25%;
                /* Could be more or less, depending on screen size */
            }

            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {
                    -webkit-transform: scale(0)
                }

                to {
                    -webkit-transform: scale(1)
                }
            }

            @keyframes animatezoom {
                from {
                    transform: scale(0)
                }

                to {
                    transform: scale(1)
                }
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }

                .cancelbtn {
                    width: 100%;
                }
            }

            select {
                width: 100%;
                border: 1px solid grey;
                border-radius: 05px;
                box-shadow: 1px 1px 2px 1px grey;
                padding: 10px 15px 10px 15px;
            }

            .btnlogout:hover {
                background-color: crimson;
                color: white;
            }

            .background {
                background-size: cover;
                background-position: center;
            }

            @media screen and (max-width:620px) {


                .animate {
                    width: 80%;
                }
            }
        </style>
    </head>

    <body class="background" style="font-family: 'Courier New', Courier, monospace;">
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
              <button class="nav-toggler" style="width:auto; background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none; font-size:20px" onclick="window.location='index.php';">Home</button>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">

                    <button class="nav-toggler" onclick="document.getElementById('id01').style.display='block'" style="width:auto; background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none; font-size:20px">Admin</button>
                    <div id="id01" class="modal">


                        <form class="modal-content animate" method="POST" action="proseslogin.php" onSubmit="return validateForm()">

                            <div class="imgcontainer">
                                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                <img src="admin.png" alt="Avatar" class="avatar">
                            </div>

                            <div class="container2" style="padding: 16px;">
                                <input type="hidden">
                                <label type="hidden"></label>
                                <label for="uname" style="float: left;"><b>Username</b></label>
                                <input class="uname" type="text" placeholder="Enter Username" name="username" required>

                                <label for="psw"><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" required>

                                <button class="button2" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                    <br>
                    <h1 style="color: black; font-weight: bold;">
                        <center>Cari Games</center>
                    </h1>
                    <br>
                    <form name="form-input" method="post" action="hasil.php" style="font-size: 12px;">
                        <input type="hidden" name="id" id="id" value="1">
                         <input type="hidden" name="history" id="history" value="1">
                        <div class="form-group">
                            <label class="konten1" for="ulasan" style="color: black; font-weight: bold;   font-size: 20px;">Jumlah Ulasan: <button style="background-color:transparent; color: black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none" data-toggle="popover" data-content="Jumlah ulasan/review dari user."><i class="fa fa-question-circle"></i></button></label>
                            <select name="ulasan" required>
                                <option value="" style="font-size:16px;"> --Select--</option>
                                <option value="5" style="font-size:16px;">> 50jt review</option>
                                <option value="4" style="font-size:16px;">20jt - 50jt review</option>
                                <option value="3" style="font-size:16px;">1jt - 10jt review</option>
                                <option value="2" style="font-size:16px;">10rb - 100rb review</option>
                                <option value="1" style="font-size:16px;">< 10rb review</option>
                            </select>
                            <!-- <input type="text" class="form-control" name="rating" placeholder="Masukkan Rating" oninvalid="this.setCustomValidity('Masukkan harus berupa angka desimal. cth: 4.5')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+([\.][0-9]+)"> -->
                        </div>

                        <div class="form-group">
                            <label for="rating" style="color: black; font-weight: bold;  font-size: 20px;">Rating: <button style="background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none" data-toggle="popover" data-toggle="popover" data-content="Penilaian yang diberikan oleh user mengenai game tersebut."><i class="fa fa-question-circle"></i></button></label>
                            <select name="rating" required>
                                <option value="" style="font-size:16px;"> --Select--</option>
                                <option value="5" style="font-size:16px;">5.0</option>
                                <option value="4" style="font-size:16px;">4.0 - 4.5</option>
                                <option value="3" style="font-size:16px;">3.0 - 3.9</option>
                                <option value="2" style="font-size:16px;">2.0 - 2.9</option>
                                <option value="1" style="font-size:16px;">
                                    < 2.0</option>
                            </select>
                            <!-- <input type="text" class="form-control" name="rating" placeholder="Masukkan Rating" oninvalid="this.setCustomValidity('Masukkan harus berupa angka desimal. cth: 4.5')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+([\.][0-9]+)"> -->
                        </div>
                        <div class="form-group">
                            <label for="violance" style="color: black; font-weight: bold; font-size: 20px;">Rating Konten: <button style="background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none" data-toggle="popover" data-content="Rating yang menjelaskan tingkat kedewasaan minimum suatu konten dalam aplikasi."><i class="fa fa-question-circle"></i></button></label>
                            <select name="violance" required>
                                <option value="" style="font-size:14px;"> --Select--</option>
                                <option value="5" style="font-size:14px;">3+ (Beberapa kekerasan dalam konteks komikal atau fantasi dapat diterima. Bahasa buruk tidak diizinkan)</option>
                                <option value="4" style="font-size:14px;">7+ (Dapat berisi beberapa adegan atau suara yang menakutkan. Kekerasan ringan)</option>
                                <option value="3" style="font-size:14px;">12+ (Kekerasan sedang. Ketelanjangan non-grafis, simulasi perjudian, kata kasar seksual tidak diizinkan) </option>
                                <option value="2" style="font-size:14px;">16+ (Kekerasan realistis, aktivitas seksual, makian, penggunaan obat-obatan)</option>
                                <option value="1" style="font-size:14px;">18+ (Kekerasan berat seperti kekerasan seksual, tindakan diskriminasi, pujian terhadap penggunaan obat terlarang)
                                </option>
                            </select>
                            <!-- <input type="text" class="form-control" name="violance" placeholder="Masukkan violance" oninvalid="this.setCustomValidity('Masukkan harus berupa angka saja!')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+"> -->
                        </div>
                        <div class="form-group">
                            <label for="download" style="color: black; font-weight: bold;  font-size: 20px;">Jumlah Download: <button style="background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none" data-toggle="popover" data-content="Jumlah user yang sudah mendownload/menginstal game tersebut."><i class="fa fa-question-circle"></i></button> </label>
                            <select name="download" required>
                                <option value="" style="font-size:16px;"> --Select--</option>
                                <option value="5" style="font-size:16px;">> 1 milyar</option>
                                <option value="4" style="font-size:16px;">100jt - 1 milyar</option>
                                <option value="3" style="font-size:16px;">1jt - 10jt</option>
                                <option value="2" style="font-size:16px;">10rb - 100rb</option>
                                <option value="1" style="font-size:16px;">< 1rb</option>
                            </select>
                            <!-- <input type="text" class="form-control" name="download" placeholder="Masukkan Kontrol" oninvalid="this.setCustomValidity('Masukkan harus berupa angka desimal. cth: 4.5')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+([\.][0-9]+)"> -->
                        </div>
                        <div class="form-group">
                            <label for="size" style="color: black; font-weight: bold;  font-size: 20px;">Size <font size="1">(mb)</font>: <button style="background-color:transparent; color:black; background-repeat:no-repeat; border: none; cursor: pointer; overflow:hidden; outline:none" data-toggle="popover" data-content="Ukuran file game."><i class="fa fa-question-circle"></i></button></label>
                            <select name="size" required>
                                <option value="" style="font-size:16px;"> --Select--</option>
                                <option value="1" style="font-size:16px;">> 1GB</option>
                                <option value="2" style="font-size:16px;">700MB - 1GB</option>
                                <option value="3" style="font-size:16px;">400MB - 600MB</option>
                                <option value="4" style="font-size:16px;">100MB - 300MB</option>
                                <option value="5" style="font-size:16px;">< 100MB</option>
                            </select>
                            <!-- <input type="text" class="form-control" name="size" placeholder="Masukkan Size" oninvalid="this.setCustomValidity('Masukkan harus berupa angka saja!')" onchange="try{setCustomValidity('')}catch(e){}" oninput="setCustomValidity(' ')" pattern="[0-9]+"> -->
                        </div>
                        <center><input type="submit" class="btn btn-success" name="bobot" value="Cari">
                            <input type="reset" class="btn btn-danger" name="batal" value="Batal">
                        </center>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('[data-toggle="popover"]').popover({
                    placement: 'top',
                    trigger: 'hover'
                });
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

            //Get the button
            var mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
    </body>
    <br>
    <!-- <div style="background-color:#343a40; color:white; font-family: 'Courier New', Courier, monospace;" class="footer-copyright text-center py-3">© 2020 Copyright:
        <a style="color:white;"> Sistem Rekomendasi Pemilihan Game Mobile</a>
    </div> -->

    </html>