<!doctype html>
<html lang="en">

<head>
    <title>TOKO BAJU</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/linearicons/style.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="css/demo.css">
    
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <!-- <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png"> -->
    
    <!-- <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png"> -->
   
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="scripts/klorofil-common.js"></script>

</head>

<body>

    <!-- WRAPPER -->
    <div id="wrapper">
        <!-- NAVBAR -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="brand"><h3>TOKO BAJU</h3>
            </div>
            <div class="container-fluid">
                <div class="navbar-btn">
                    <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
                </div>
                <div id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="" class="icon-menu"  aria-expanded="true">
                                <i class="lnr lnr-alarm"></i>
                                <span class="badge bg-danger"></span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="img/user.png" class="img-circle" alt="Avatar"> <span></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target="#modal_logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
        <div id="sidebar-nav" class="sidebar">
            <div class="sidebar-scroll">
                <nav>
                    <ul class="nav putih">
                        <li><a href="?page=dasboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                        <li><a href="?page=profil" class=""><i class="lnr lnr-users"></i> <span>Profil</span></a></li>
                        <li><a href="?page=datakategori" class=""><i class="lnr lnr-tag"></i> <span>Data Kategori</span></a></li>
                        <li><a href="?page=dataproduk" class=""><i class="lnr lnr-tag"></i> <span>Data Produk</span></a></li>
                        <li><a href="?page=user" class=""><i class="lnr lnr-users"></i> <span>Pengaturan User</span></a></li>
                       
                    </ul>
                </nav>
            </div>
        </div>
        <!-- END LEFT SIDEBAR -->
        <!-- MAIN -->
        <div class="main">
            <!-- MAIN CONTENT -->
            <?php
            if(@$_GET["page"] == 'dasboard' || @$_GET["page"] == '') {
                include "dasboard.php";
            }else if(@$_GET["page"] == 'profil') {
                include "profil.php";
            }else if(@$_GET["page"] == 'datakategori') {
                include "data_kategori.php";
            }else if(@$_GET["page"] == 'dataproduk') {
                include "data_produk.php";
            }else if(@$_GET["page"] == 'user') {
                include "user.php";
            }else if(@$_GET["page"] == 'tambahkategori') {
                include "tambah_kategori.php";
            }else if(@$_GET["page"] == 'editkategori') {
                include "edit_kategori.php";
            }else if(@$_GET["page"] == 'hapuskategori') {
                include "hapus_kategori.php";
            }else if(@$_GET["page"] == 'editproduk') {
                include "edit_produk.php";
            }else if(@$_GET["page"] == 'hapusproduk') {
                include "hapus_produk.php";
            }else if(@$_GET["page"] == 'tambahproduk') {
                include "tambah_produk.php";
            }else if(@$_GET["page"] == 'tambahuser') {
                include "tambah_user.php";
            }else if(@$_GET["page"] == 'hapususer') {
                include "hapus_user.php";
            }else if(@$_GET["page"] == 'edituser') {
                include "edit_user.php";
            }
            ?>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
            </div>
        </footer>
    </div>
    <!-- END WRAPPER -->
    <div id="modal_logout" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Log Out</h4>
      </div>
          <div class="modal-body">
                <p>Apakah anda yakin ingin keluar ?</p>
          </div>
          <div class="modal-footer">
            <a href="keluar.php" type="submit" class="btn btn-danger" name="submit" >YA</a>
            <button type="button" class="btn btn-default" data-dismiss="modal">TIDAK</button>
          </div>
   
    </div>
  </div>
</div>
</body>

</html>
