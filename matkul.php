<?php 
  include 'koneksi.php';
  $query_mahasiswa = "SELECT * FROM mahasiswa"; 
  $sql_mahasiswa = mysqli_query($koneksi, $query_mahasiswa);
  $query_matakuliah = "SELECT * FROM matakuliah"; 
  $sql_matakuliah = mysqli_query($koneksi, $query_matakuliah);
  $query_krs = "SELECT * FROM krs"; 
  $sql_krs = mysqli_query($koneksi, $query_krs);
  $no = 0;
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
                <a class="nav-link active" href="#">Matakuliah</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!--Header-->
    <div class="container mt-3">
        <figure>
            <blockquote class="blockquote">
              <h3>Tabel Mata Kuliah</h3>
            </blockquote>
            <figcaption class="blockquote-footer">
              using CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
            </figcaption>
        </figure>
        <a href="edit-matakuliah.php" class="btn btn-sm btn-primary active mt-4" role="button" aria-pressed="true">
        <i class="fa fa-plus-square"></i> Tambah Data</a>

        <!--Table Matakuliah-->
        <div class="table-responsivr">
            <table class="table table-striped mt-3">
              <thead style="background-color: pink">
                <tr>
                  <th scope="col">Kode Matakuliah</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jumlah SKS</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php
                  while ($result = mysqli_fetch_assoc($sql_matakuliah)) {
                ?>
                <tr>
                  <td>
                    <?php echo $result['kodemk'];?>
                  </td>
                  <td>
                    <?php echo $result['nama'];?>
                  </td>
                  <td>
                    <?php echo $result['jumlah_sks'];?>
                  </td>

                  <td>
                    <a type="button" class="btn btn-sm btn-success" href="edit-matakuliah.php?ubah=<?php echo $result['kodemk'];?>"> <i class="fa fa-pencil"></i> Edit</a>
                    <a type="button" class="btn btn-sm btn-danger" href="proses-matakuliah.php?hapus=<?php echo $result['kodemk'];?>" onClick="return confirm('Data tersebut akan dihapus')"> <i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
        </div>
    </div>
   
</body>
</html>