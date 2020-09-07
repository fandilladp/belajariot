<!-- dibuat oleh : fandilla dp -->
<!-- silahkan rubah sesuai kebutuhan anda, contoh projek ini open source -->
<!-- semoga bermanfaat -->


<!-- baca readme.md terlebih dahulu jika kamu ada kesulitan -->
<?php
include("function.php");

$conn = databaseConnect();

if (isset($_GET['message'])) {
    echo $_GET['message'];
    echo "<br>";
    echo "<br>";
}
$sql = "SELECT * FROM arduino_data";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>One Page Wonder - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">Belajar IoT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="text-center">
        <img class="img-fluid" src="img/head.png" alt="">
        <div class="masthead-content">
            <div class="container">
                <h1 class="masthead-heading mb-0">Belajar IoT</h1>
                <h2 class="masthead-subheading mb-0">contoh seederhana komunikasi dengan mikrokontroler</h2>
            </div>
        </div>
    </header>
    <hr>
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="img/iot.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Kirim data Ke Arduino</h2>
                        <p>ini adalah contoh dari pengontrolan IoT</p>
                        <form action='dariBrowser.php' method=GET>
                            <div class="form-row">
                                <div class="col">
                                    <label class="sr-only" for="key">Key</label>
                                    <input type="text" name='variabel' class="form-control mb-2" id="key" placeholder="Key">
                                </div>
                                <div class="col">
                                    <label class="sr-only" for="nilai">Value</label>
                                    <input type="text" name='nilai' class="form-control mb-2" id="nilai" placeholder="Value">
                                </div>
                                <div class="col">
                                    <button type="submit" value="Kirim" class="btn btn-primary mb-2">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <img class="img-fluid rounded" src="img/nodemcu.png" alt="">
                    </div>
                </div>
                <div id="tabel" class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">Menerima data dari Arduino</h2>

                        <?php if ($result->num_rows > 0) : ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col"> Key</th>
                                        <th scope="col">Value</th>
                                    </tr>
                                </thead>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tbody>
                                        <tr>
                                            <th scope="row"> <?= $row["id"] ?> </th>
                                            <td><?= $row["variabel"] ?></td>
                                            <td><?= $row["nilai"]; ?></td>
                                        </tr>
                                    <?php endwhile;  ?>
                                    </tbody>
                            </table>
                        <?php else : ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Key</th>
                                        <th scope="col">Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>tidak ada data</td>
                                        <td>tabel ini akan terisi oleh data yang dikirimkan arduino</td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif;  ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img width="600px" class="img-fluid rounded" src="img/sql.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Menghapus semua data dari arduino</h2>
                        <p>aksi ini akan menghapus semua data yang ada database kita di tabel arduino_data</p>
                        <form action='dariBrowser.php' method=GET>
                            <div class="form-row">
                                <div class="col">
                                    <input type='hidden' name='aksi' value='hapus'>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-danger mb-2">Hapus semua data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
        <div class="container">
            <p class="m-0 text-center text-white small">Copyright &copy; Your Website 2020</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        let dataarduino = <?= $result->num_rows; ?>;
        if (dataarduino > 0) {
            setInterval(() => {
                location.reload()
            }, 5000);
        }
    </script>
</body>

</html>

<?php
$conn->close();
?>