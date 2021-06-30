<?php
include "koneksi.php";

$id = $_GET['hapus'];

$sql_delete_kriteria = mysqli_query($koneksi, "DELETE FROM kriteria WHERE id_game = '" . $id . "';");

$sql_delete_game = mysqli_query($koneksi, "DELETE FROM game WHERE id='" . $id . "';");


if ($sql_delete_kriteria && $sql_delete_game) {
    echo "<script language='javascript'>
                alert('Data berhasil dihapus!')
                document.location='halamanlistgameadmin.php'</script>";
} else {
    echo "<script language='javascript'>
                alert('Data gagal dihapus!')
                document.location='halamanlistgameadmin.php'</script>";
}
