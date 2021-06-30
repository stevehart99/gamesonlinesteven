<?php
require_once('koneksi.php');

$password = $username = '';

$username = $_POST['username'];
$password = $_POST['password'];
$pwd = MD5($password);

$sql = "SELECT * FROM adminn WHERE username='$username' AND password='$pwd'";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['role'] == "admin") {
            $id = $row["id"];
            $username = $row["username"];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['role'] = "admin";
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = 1;

            header("Location: dashboardadmin.php");
        } else {
            // $id = $row["id"];
            // $username = $row["username"];
            // session_start();
            // $_SESSION['id'] = $id;
            // $_SESSION['username'] = $username;
            // $_SESSION['role'] = "user";
            // $_SESSION['username'] = $username;
            // $_SESSION['loggedIn'] = 1;

            header("Location: dashboardawal.php");
            echo $username;
        }
    }
} else {
    echo "Invalid email or password";
    header("Location: dashboardawal.php");
}
