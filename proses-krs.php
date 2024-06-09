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
                $id = $_POST['inputId'];
                $inputNpmMahasiswa = $_POST['inputNpmMahasiswa'];
                $inputKdMK = $_POST['inputKdMK'];

                $query = "INSERT INTO krs VALUES(null, '$inputNpmMahasiswa', '$inputKdMK')";
                $sql = mysqli_query($koneksi, $query);

                if ($sql) {
                    header("location: krs.php");
                } else {
                    echo $query;
                } 

                }elseif ($_POST['aksi'] == "edit") {
                $id = $_POST['inputId'];
                $inputNpmMahasiswa = $_POST['inputNpmMahasiswa'];
                $inputKdMK = $_POST['inputKdMK'];

                $query = "UPDATE krs SET mahasiswa_npm='$inputNpmMahasiswa', matakuliah_kodemk='$inputKdMK' WHERE id='$id';";
                $sql = mysqli_query($koneksi, $query);

                if ($sql) {
                    header("location: krs.php");
                } else {
                    echo $query;
                }

                }
            }

            if (isset($_GET['hapus'])) {
            $id = $_GET['hapus'];
            $query = "DELETE FROM krs WHERE id = '$id'";
            $sql = mysqli_query($koneksi, $query);
            
            if ($sql) {
                header("location: krs.php");
            } else {
                echo $query;
            }

            }
        ?>
  
    </div>
<body>


