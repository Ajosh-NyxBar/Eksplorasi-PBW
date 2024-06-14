<?php
include 'function.php';

$mahasiswa = tampil_data("SELECT * FROM mahasiswa");

if(isset($_POST['keyword'])){
    $mahasiswa = cari_data($_POST['keyword']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Form Mahasiswa</title>
</head>

<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="w-100 border border-primary rounded-4 p-4 ms-5 ">
            <nav class="navbar justify-content-center align-items-center">
                <form action="" method="post" class="w-50">
                    <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Masukkan Keyword">
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="btn btn-primary w-50">Cari</button>
                    </div>
                </form>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nim</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($mahasiswa as $row) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nama_mhs']; ?></td>
                            <td><?php echo   $row['npm']; ?></td>
                            <td><?php echo $row['prodi']; ?></td>
                            <td><img src="./img/<?php echo $row['gambar']; ?>" alt="" width="100"></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="hapus.php?id=<?php echo $row['id']; ?>"
                                    onclick="return confirm('Yakin Akan Dihapus?')" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                <form action="tambah.php">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>

    </div>
</body>

</html>