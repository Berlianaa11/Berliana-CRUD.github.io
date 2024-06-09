<?php 
  include 'koneksi.php';

  $id = '';
  $mahasiswa_npm = '';
  $matakuliah_kodemk = '';

  if (isset($_GET['ubah'])) {
    $id = $_GET['ubah'];

    $query = "SELECT * FROM krs WHERE id = '$id';";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $mahasiswa_npm = $result['mahasiswa_npm'];
    $matakuliah_kodemk = $result['matakuliah_kodemk'];

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
                <a class="nav-link" aria-current="page" href="#">Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="krs.php">KRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="matkul.php">Matakuliah</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--Header-->
    <div class="container mt-3">
        <figure>
            <blockquote class="blockquote">
              <h3>Edit Data KRS</h3>
            </blockquote>
            <figcaption class="blockquote-footer">
              using CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
            </figcaption>
        </figure>
    

    <!--Form Tambah Data-->
    <div class="container py-3" id="form">
        <form method="POST" action="proses-krs.php">
      <div class="mb-3">
        <label for="inputId" class="form-label">ID</label>
        <input type="text" class="form-control" id="inputId" name="inputId" placeholder="example: 11"value="<?php echo $id ?>">
      </div>

      <div class="mb-3">
        <label for="inputNpmMahasiswa" class="form-label">NPM</label>
        <input required value="<?php echo $mahasiswa_npm ?>" type="text" class="form-control" id="inputNpmMahasiswa" name="inputNpmMahasiswa" placeholder="example: 17040">
      </div>

      <div class="mb-3">
        <label for="inputKdMK" class="form-label">Kode Matakuliah</label>
        <input required value="<?php echo $matakuliah_kodemk ?>" type="text" class="form-control" id="inputKdMK" name="inputKdMK" placeholder="example: PBW01">
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
              
              <a type="button" href="krs.php" class="btn btn-sm btn-danger active">
                <i class="fa fa-times-circle"></i>
                Batal
              </a>
      
            </div>
    </div>
    </div>
    </div>
    </form>
