<?php
include "koneksi.php";

function tambah($data)
{
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $ulasan = htmlspecialchars($data['ulasan']);
    $rating = htmlspecialchars($data['rating']);
    $violance = htmlspecialchars($data['violance']);
    $download = htmlspecialchars($data['download']);
    $size = htmlspecialchars($data['size']);

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // MASIH EROR

    $query = "INSERT INTO game(nama, gambar) VALUES('" . $nama . "', '" . $gambar . "');";

    // echo "<pre>";
    mysqli_query($koneksi, $query);
    print_r(mysqli_affected_rows($koneksi));
    // echo "</pre>";

    if (mysqli_affected_rows($koneksi) === 1) {
        // print_r('masuk if');
        $sql = mysqli_query($koneksi, "SELECT * FROM game ORDER BY id DESC LIMIT 1") or die(mysqli_error($koneksi));
        $success_data = mysqli_fetch_array($sql);

        $query = "INSERT INTO kriteria(ulasan, rating, violance, download, size, id_game) 
        VALUES('" . $ulasan . "', '" . $rating . "', '" . $violance . "', '" . $download . "', '" . $size . "', '" . $success_data['id'] . "');";

        mysqli_query($koneksi, $query);
        print_r(mysqli_affected_rows($koneksi));

        return mysqli_affected_rows($koneksi);
    }
    return mysqli_affected_rows($koneksi);
}

function edit($data)
{
    global $koneksi;
    $id = htmlspecialchars($data['id']);
    $nama = htmlspecialchars($data['nama']);
    $ulasan = htmlspecialchars($data['ulasan']);
    $rating = htmlspecialchars($data['rating']);
    $violance = htmlspecialchars($data['violance']);
    $download = htmlspecialchars($data['download']);
    $size = htmlspecialchars($data['size']);
    $gambarLama = htmlspecialchars($data['gambarLama']);

    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {

        $gambar = upload();
    }

    $query2 = "UPDATE game INNER JOIN kriteria ON kriteria.id_game = game.id SET nama='$nama',
    ulasan='$ulasan',
    rating='$rating',
    violance='$violance',
    download='$download',
    size='$size',
    gambar = '$gambar'
    WHERE id_game='$id'";


    mysqli_query($koneksi, $query2);

    return mysqli_affected_rows($koneksi);
}

function kritiksaran($data)
{
    global $koneksi;
    $nama = htmlspecialchars($data['nama']);
    $kritiksaran = htmlspecialchars($data['kritiksaran']);
    $star = $_POST['item'];
    $countstar = count($star);
    
       $sql = "SELECT * FROM kritiksaran WHERE nama='$nama'";
    $result = mysqli_query($koneksi, $sql);
    
        if (mysqli_num_rows($result) > 0) {
        echo "<script>
        alert('Nama sudah ada!');
        </script>";
        return false;
    } else
    if($star == ""||$star == null){
         echo "<script>
        alert('Pilih star!');
        </script>";
        return false;
    }else{
     $query3 = "INSERT INTO kritiksaran(nama, kritiksaran, star, datee) VALUES('$nama', '$kritiksaran', '$countstar', CURDATE());";

    mysqli_query($koneksi, $query3);

    return mysqli_affected_rows($koneksi);   
    }
}


function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    //yang diupload gambar ap bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar');
        </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    //lolos 
    //generate nama gambar baru biar pas upload gambar sama ga sama gambarnya
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'gambar/' . $namaFile);

    return $namaFile;
}
