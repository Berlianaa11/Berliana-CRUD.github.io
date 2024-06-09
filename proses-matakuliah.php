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
                $inputKdMk = $_POST['inputKdMk'];
                $inputNamaMk = $_POST['inputNamaMk'];
                $inputSks = $_POST['inputSks'];

                $query = "INSERT INTO matakuliah VALUES('$inputKdMk', '$inputNamaMk', '$inputSks')";
                $sql = mysqli_query($koneksi, $query);

                if ($sql) {
                    header("location: matkul.php");
                } else {
                    echo $query;
                }
                
                }elseif ($_POST['aksi'] == "edit") {
                $inputKdMk = $_POST['inputKdMk'];
                $inputNamaMk = $_POST['inputNamaMk'];
                $inputSks = $_POST['inputSks'];

                $query = "UPDATE matakuliah SET kodemk='$inputKdMk', nama='$inputNamaMk', jumlah_sks='$inputSks' WHERE kodemk='$inputKdMk';";
                $sql = mysqli_query($koneksi, $query);

                if ($sql) {
                    header("location: matkul.php");
                } else {
                    echo $query;
                }
                }
            }

            if (isset($_GET['hapus'])) {
            $kodemk = $_GET['hapus'];
            $query = "DELETE FROM matakuliah WHERE kodemk = '$kodemk'";
            $sql = mysqli_query($koneksi, $query);

            if ($sql) {
                header("location: matkul.php");
            } else {
                echo $query;
            }

            }
        ?>
    </div>
<body>


