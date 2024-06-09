<?php 
  include 'koneksi.php';

  $kodeMk = '';
  $namaMk = '';
  $sks = '';

  if (isset($_GET['ubah'])) {
    $kodeMk = $_GET['ubah'];

    $query = "SELECT * FROM matakuliah WHERE kodemk = '$kodeMk';";
    $sql = mysqli_query($koneksi, $query);

    $result = mysqli_fetch_assoc($sql);

    $namaMk = $result['kodemk'];
    $namaMk = $result['nama'];
    $sks = $result['jumlah_sks']; 

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
                <a class="nav-link" aria-current="page" href="index.php">Mahasiswa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="krs.php">KRS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="matkul.php">Matakuliah</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--Header-->
    <div class="container mt-3">
        <figure>
            <blockquote class="blockquote">
              <h3>Edit Data Matakuliah</h3>
            </blockquote>
            <figcaption class="blockquote-footer">
              using CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
            </figcaption>
        </figure>
    

    <!--Form Tambah Data-->
    <div class="container py-3" id="form">
        <form method="POST" action="proses-matakuliah.php">
      <div class="mb-3">
        <label for="inputKdMk" class="form-label">Kode MataKuliah</label>
        <input type="text" class="form-control" id="inputKdMk" name="inputKdMk" placeholder="example: PBW01" value="<?php echo $kodeMk ?>">
      </div>

      <div class="mb-3">
        <label for="inputNamaMk" class="form-label">Nama MataKuliah</label>
        <input type="text" class="form-control" id="inputNamaMk" name="inputNamaMk" placeholder="example: Aljabar Linear" value="<?php echo $namaMk ?>">
      </div>

      <div class="mb-3">
        <label for="inputSks" class="form-label">Jumlah SKS</label>
        <input type="text" class="form-control" id="inputSks" name="inputSks" placeholder="example: 3" value="<?php echo $sks ?>">
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
              
              <a type="button" href="matkul.php" class="btn btn-sm btn-danger active">
                <i class="fa fa-times-circle"></i>
                Batal
              </a>
              
            </div>
    </div>
    </div>
    </div>
    </form>
