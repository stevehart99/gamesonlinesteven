<?php
$koneksi = mysqli_connect("localhost", "gamesonl_steven", "ep&Ni=K^}qZE", "gamesonl_games_online");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
