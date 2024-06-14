<?php
include 'koneksi.php';


function tampil_data($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah_data($query){
    global $koneksi;
    $nama = $_POST['nama_mhs'];
    $npm = $_POST['npm'];
    $prodi = $_POST['prodi'];
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    $query = "INSERT INTO mahasiswa (nama_mhs, npm, prodi, gambar) VALUES ('$nama', '$npm', '$prodi', '$gambar')";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function hapus_data($id){
    global $koneksi;
    $query = "DELETE FROM mahasiswa WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function edit_data($data){
    global $koneksi;
    $id = $data["id"];
    $nama = $data["nama_mhs"];
    $npm = $data["npm"];
    $prodi = $data["prodi"];
    $gambarOld = $data['gambarOld'];
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarOld;
    } else {
        $gambar = upload();
        if (!$gambar) {
            return false;
        }
    }
    $query = "UPDATE mahasiswa SET nama_mhs = '$nama', npm = '$npm', prodi = '$prodi', gambar = '$gambar' WHERE id = $id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function upload(){
    $gambar = $_FILES['gambar']['name'];
    $gambarTmp = $_FILES['gambar']['tmp_name'];
    $gambarUkuran = $_FILES['gambar']['size'];
    $gambarError = $_FILES['gambar']['error'];
    $gambarDir = 'img/';
    $gambarPath = $gambarDir . $gambar;
    
    if($gambarError === 4){
        echo "<script>alert('Pilih gambar terlebih dahulu');window.location.assign('tambah.php');</script>";
        return false;
    }

    $eksGambarValid = ['jpg', 'jpeg', 'png', 'gif', 'svg+xml'];
    $ekstensiGambar = explode('.', $gambar);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $eksGambarValid)){
        echo "<script>alert('Ekstensi gambar tidak valid');window.location.assign('tambah.php');</script>";
        return false;
    }

//    {['halo', ['PNG']]}

    if($gambarUkuran > 2000000){
        echo "<script>alert('Ukuran gambar tidak boleh melebihi 2MB');window.location.assign('tambah.php');</script>";
        return false;
    }

    $newFile = uniqid() . '.' . $ekstensiGambar;
    $gambarPath = $gambarDir . $newFile;
    move_uploaded_file($gambarTmp, $gambarPath);
    return $newFile;
}

function cari_data($keyword){
    global $koneksi;
    $query = "SELECT * FROM mahasiswa WHERE nama_mhs LIKE '%$keyword%' 
    OR npm LIKE '%$keyword%' 
    OR prodi LIKE '%$keyword%'";
    return tampil_data($query);
}
?>
