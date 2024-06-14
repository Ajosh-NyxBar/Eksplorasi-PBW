<?php
include 'koneksi.php';
include 'function.php';

$id = $_GET['id'];
if(hapus_data($id) > 0){
    echo "<script>alert('Data berhasil Dihapus');window.location.assign('index.php');</script>";
}else{
    echo "<script>alert('Data gagal Dihapus');window.location.assign('index.php');</script>";
}
?>
