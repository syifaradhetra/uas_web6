<?php
error_reporting(0);
include 'koneksi.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

$produk = mysqli_query($conn, "SELECT * FROM tb_produk LEFT JOIN ukuran_produk using (id_size) WHERE produk_id = '" . $_GET['id'] . "' ");
$p = mysqli_fetch_object($produk);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Toko Baju</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="<link rel=" preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <!--header-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Toko Baju</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="produk.php">Produk</a>
                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0" action="produk.php" method="post">
                <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit"></input>
            </form>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" style="    height: 70vh;">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!--search-->


    <!--produk detail-->
    <div class="section">
        <div class="container">
            <h2>Detail Produk</h2>
            <div class="box">
            <div class="row">
                <div class="col-lg-8">
                    <img src="produk/<?php echo $p->produk_image ?>" width="100%">
                </div>
                <div class="col-lg-4">
                    <h3><?php echo $p->produk_name ?></h3>
                    <h4>Rp. <?php echo number_format($p->produk_price) ?></h4>
                    <h3>Size : <?php echo $p->size ?></h3>
                    <p>Deskripsi : <br>
                        <?php echo $p->produk_deskripsi ?>
                    </p>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!--footer-->
    <section style="background-color: #ffffe6;">
        <div class="container wrapper-ft">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ft-img">
                        <img src="{{ asset('assets/logo.png') }}" alt="">
                        <p style="text-align:center">UB © Content 2021. All rights reserved</p>
                    </div>

                </div>
                <div class="col-lg-3">
                    <h6 style="font-weight: 600; color: #191919; margin-bottom:25px">Others</h6>
                    <ul class="list-unstyled">
                        <li><a href="">Privacy Policy</a></li>
                        <li><a href="">Terms & Condition</a></li>
                        <li><a href="">About Us</a></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 d-none d-sm-block">
                    <h6 style="font-weight: 600; color: #191919; margin-bottom:25px">Contact Us</h6>
                    <ul class="list-unstyled">
                        <li><a href=""><i class="fa fa-envelope"></i>&nbsp; tokobaju@gmail.com</a></li>
                        <li><a href=""><i class="fa fa-phone"></i>&nbsp; <?php echo $a->admin_telp ?></a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 style="font-weight: 600; color: #191919; margin-bottom:25px">Follow Us</h6>
                    <ul class="list-unstyled">
                        <li><a href=""><i class="fa fa-instagram"></i>&nbsp; Instagram</a></li>
                        <li><a href=""><i class="fa fa-facebook"></i>&nbsp; Facebook</a></li>
                        <!-- <li><a href=""><i class="fa fa-whatsapp" ></i>&nbsp; +62 813 591 973 60</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>

</html>