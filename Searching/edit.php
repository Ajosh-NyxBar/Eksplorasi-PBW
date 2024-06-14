<?php
include 'koneksi.php';
include 'function.php';

$id = $_GET['id'];

$mhs = tampil_data("SELECT * FROM mahasiswa WHERE id = $id")[0];

if(isset($_POST["submit"])){
    if(edit_data($_POST) > 0){
        echo "<script>alert('Data berhasil diubah');window.location.assign('index.php');</script>";
    }else{
        echo "<script>alert('Data gagal diubah');window.location.assign('index.php');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container d-flex justify-content-center vh-100 align-items-center">
        <div class="w-50 border border-primary rounded-4 p-4">
            <div class="container-fluid">
                <form action="" class="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="hidden" name="gambarOld" id="gambarOld" value="<?= $mhs['gambar']; ?>">
                        <input type="hidden" name="id" id="id" value="<?= $mhs['id']; ?>">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?= $mhs['nama_mhs']; ?>" required>
                        <label for="nim" class="form-label">Nim</label>
                        <input type="text" class="form-control" id="npm" name="npm" value="<?= $mhs['npm']; ?>" required>
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" value="<?= $mhs['prodi']; ?>" required>
                        <label for="gambar" class="form-label">Gambar</label>
                        <img src="img/<?= $mhs['gambar']; ?>" class="img-fluid">
                        <input type="file" class="form-control" id="gambar" name="gambar"required>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3 w-50" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>