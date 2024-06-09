<?php 
  include 'koneksi.php';
  $query_mahasiswa = "SELECT * FROM mahasiswa"; 
  $sql_mahasiswa = mysqli_query($koneksi, $query_mahasiswa);
  $query_matakuliah = "SELECT * FROM matakuliah"; 
  $sql_matakuliah = mysqli_query($koneksi, $query_matakuliah);
  $query_krs = "SELECT * FROM krs"; 
  $sql_krs = mysqli_query($koneksi, $query_krs);
  $query = "SELECT mahasiswa.nama AS 'nama' , matakuliah.nama AS 'matkul', matakuliah.jumlah_sks FROM mahasiswa JOIN krs ON mahasiswa.npm = krs.mahasiswa_npm JOIN matakuliah ON matakuliah.kodemk = krs.matakuliah_kodemk;";
  $sql = mysqli_query($koneksi, $query);
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
              <h3>Tabel KRS Mahasiswa</h3>
            </blockquote>
            <figcaption class="blockquote-footer">
              using CRUD <cite title="Source Title">Create, Read, Update, Delete</cite>
            </figcaption>
        </figure>
        <a href="edit-krs.php" class="btn btn-sm btn-primary active mt-4" role="button" aria-pressed="true">
        <i class="fa fa-plus-square"></i> Tambah Data</a>

        <!--Table KRS-->
        <div class="table-responsivr">
            <table class="table table-striped mt-3">
              <thead style="background-color: pink">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NPM</th>
                  <th scope="col">Kode Matakuliah</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="table-group-divider">
                <?php
                  while ($result = mysqli_fetch_assoc($sql_krs)) {
                ?>
                <tr>
                  <td>
                    <?php echo $result['id'];?>
                  </td>
                  <td>
                    <?php echo $result['mahasiswa_npm'];?>
                  </td>
                  <td>
                    <?php echo $result['matakuliah_kodemk'];?>
                  </td>

                  <td>
                    <a type="button" class="btn btn-sm btn-success" href="edit-krs.php?ubah=<?php echo $result['id'];?>"> <i class="fa fa-pencil"></i> Edit</a>
                    <a type="button" class="btn btn-sm btn-danger" href="proses-krs.php?hapus=<?php echo $result['id'];?>" onClick="return confirm('Data tersebut akan dihapus')"> <i class="fa fa-trash"></i> Delete</a>
                  </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
        </div>

        <!--Soal Nomor 2-->
        <table class="table table-striped mt-5 ">
        <thead style="background-color: pink">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">Mata Kuliah</th>
          <th scope="col">Keterangan</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
      <?php
          while ($result = mysqli_fetch_assoc($sql)) {
        ?>
        <tr>
          <th scope="row">
            <?php echo ++$no; ?>
          </th>
          <td>
          <?php echo $result['nama'];?>
          </td>
          <td>
          <?php echo $result['matkul'];?>
          </td>
          <td>
          <?php echo "<font color='mediumvioletred'>".$result['nama']."</font>" . " Mengambil Mata Kuliah"."<font color='mediumvioletred'> ".$result['matkul']."</font>" ." (".$result['jumlah_sks']." SKS)";?>
          </td>
        </tr>
        <?php
          }
        ?>
      </tbody>
    </table>

    </div>

    

   
</body>
</html>