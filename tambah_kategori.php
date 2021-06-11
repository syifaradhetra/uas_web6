<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Toko Baju</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
<!-- content-->
<div>
    <div class="section">
        <div class="container">
            <h1>Tambah Data Kategori</h1>
            <div class="box">
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                <input type="submit" name="submit" value="Tambah" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                $nama = ucwords($_POST['nama']);

                $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                     null, 
                     '".$nama."') ");

                if($insert){
                    echo '<script>alert("Tambah data berhasil")</script>';
                    echo '<script>window.location="?page=datakategori"</script>';
                }else{
                    echo 'Gagal' .mysqli_error($conn);
                }
            }
            ?>
</div>
</div>
</div>
<!--footer-->
<footer>
    <div class="container">
        <small>Copyright &copy; 2021 - Toko Baju</small>
</footer>
</body>
</html>