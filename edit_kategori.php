<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
    $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
    $k = mysqli_fetch_object($kategori);
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
    <!--header-->
   
<!-- content-->
<div>
    <div class="section">
        <div class="container">
            <h1>Edit Data Kategori</h1>
            <div class="box">
            <form action="" method="POST">
                <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" 
                value="<?php echo $k -> category_name ?>" required>
                <input type="submit" name="submit" value="Tambah" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                $nama = ucwords($_POST['nama']);

                $update = mysqli_query($conn, "UPDATE tb_category SET
                category_name = '".$nama."'
                WHERE category_id = '".$k->category_id."' ");

                if($update){
                    echo '<script>alert("Edit data berhasil")</script>';
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

</body>
</html>