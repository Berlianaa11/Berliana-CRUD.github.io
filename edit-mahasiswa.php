<?php 
  include 'koneksi.php';

  $npm = '';
  $nama = '';
  $jurusan = '';
  $alamat = '';

  if (isset($_GET['ubah'])) {
    $npm = $_GET['ubah'];

    $query = "SELECT * FROM mahasiswa WHERE npm = '$npm';";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $nama = $result['nama'];
    $jurusan = $result['jurusan'];
    $alamat = $result['alamat'];

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--font awesome-->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Kuliah-CRUD</title>
</head>
<body>

    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: pink">
        <div class="container-fluid container">
          <a class="navbar-brand" href="#">CRUD Berliana</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">KRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Matakuliah</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--Header-->
    <div class="container mt-3">
        <figure>
            <blockquote class="blockquote">
              <h3>Edit Data Mahasiswa</h3>
            </blockquote>
            <figcaption class="blockquote-footer">
              using CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
            </figcaption>
        </figure>
    

    <!--Form Tambah Data-->
    <div class="container py-3" id="form">
        <form method="POST" action="proses-mahasiswa.php">
      <div class="mb-3">
        <label for="inputNpm" class="form-label">NPM</label>
        <input type="text" class="form-control" id="inputNpm" name="inputNpm" placeholder="Enter NPM" value="<?php echo $npm ?>">
      </div>

      <div class="mb-3">
        <label for="inputNamaMhs" class="form-label">Nama</label>
        <input type="text" class="form-control" id="inputNamaMhs" name="inputNamaMhs" placeholder="Enter Name" value="<?php echo $nama ?>">
      </div>

      <div class="mb-3">
        <label for="inputJurusan" class="form-label">Jurusan</label>
        <select class="form-select" id="inputJurusan" name="inputJurusan" aria-label="Default select example">
            <option selected>Chose Option</option>
            <option <?php if ($jurusan == 'Sistem Informasi'){echo "selected";}?>  value="Sistem Informasi"> Sistem Informasi </option>
            <option <?php if ($jurusan == 'Teknik Informatika'){echo "selected";}?>  value="Teknik Informatika">Teknik Informatika</option>
        </select>
      </div>
      <div class="mb-3 py-3">
        <label for="inputAlamat" class="form-label">Alamat</label>
        <textarea class="form-control" id="inputAlamat" name="inputAlamat" rows="3"><?php echo $alamat ?></textarea>
      </div>

    <!--Tombol Tambah Data-->
    <div class="mb-3 row mt-3">
            <div class="col">
              <?php
                if (isset($_GET['ubah'])) {
              ?>
              <button type="submit" name="aksi" value="edit" class="btn btn-sm btn-success active">
                <i class="fa fa-send"></i>
                Simpan
              </button>
              <?php
              } else {
                ?>
                <button type="submit" name="aksi" value="add" class="btn btn-sm btn-primary active">
                  <i class="fa fa-plus-square"></i>
                  Tambah Data
                </button>
              <?php
              }
              ?>
              
              <a type="button" href="index.php" class="btn btn-sm btn-danger active">
                <i class="fa fa-times-circle"></i>
                Batal
              </a>
            </div>

          </div>
    </div>
    </div>
    </form>
