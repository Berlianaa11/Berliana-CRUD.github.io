<?php 
  include 'koneksi.php';
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
    <!--Navbar-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: pink">
        <div class="container-fluid container">
          <a class="navbar-brand" href="#">CRUD Berliana</a>
        </div>
    </nav>

    <!--Proses Edit Data -->
    <div class="container mt-5 pt-5">
            <?php
              if (isset($_POST['aksi'])) {
                  if ($_POST['aksi'] == "add") {
                    $inputNpm = $_POST['inputNpm'];
                    $inputNamaMhs = $_POST['inputNamaMhs'];
                    $inputJurusan = $_POST['inputJurusan'];
                    $inputAlamat = $_POST['inputAlamat'];

                    $query = "INSERT INTO mahasiswa VALUES('$inputNpm', '$inputNamaMhs', '$inputJurusan', '$inputAlamat')";
                    $sql = mysqli_query($koneksi, $query);

                    if ($sql) {
                      header("location: index.php");
                      // echo "<h2 class='text-light'>Tambah Data</h2> <a href='index.php'>[Home]</a>"; 
                    } else {
                      echo $query;
                    }

                  }elseif ($_POST['aksi'] == "edit") {
                    $inputNpm = $_POST['inputNpm'];
                    $inputNamaMhs = $_POST['inputNamaMhs'];
                    $inputJurusan = $_POST['inputJurusan'];
                    $inputAlamat = $_POST['inputAlamat'];

                    $query = "UPDATE mahasiswa SET npm='$inputNpm', nama='$inputNamaMhs', jurusan='$inputJurusan', alamat='$inputAlamat' WHERE npm='$inputNpm';";
                    $sql = mysqli_query($koneksi, $query);

                    if ($sql) {
                      header("location: index.php");
                    } else {
                      echo $query;
                    }

                  }
              }

              if (isset($_GET['hapus'])) {
                $npm = $_GET['hapus'];
                $query = "DELETE FROM mahasiswa WHERE npm = '$npm'";
                $sql = mysqli_query($koneksi, $query);
                
                if ($sql) {
                  header("location: index.php");
                } else {
                  echo $query;
                }
                
              }
            ?>

          </div>
<body>


