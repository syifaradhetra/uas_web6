<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
    $d = mysqli_fetch_object($query);
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
            <h1>Profil</h1>
            <div class="box">
            <form action="" method="POST">
                <img src="img/<?php echo $d->image ?>"width="200px" style="margin-bottom: 20px;">
                <input type="hidden" name="foto" class="input-control" 
                value="<?php echo $d->image ?>"required>
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" 
                value="<?php echo $d->admin_name ?>"required>
                <input type="text" name="user" placeholder="Username" class="input-control" 
                value="<?php echo $d->username ?>"required>
                <input type="text" name="hp" placeholder="No Hp" class="input-control" 
                value="<?php echo $d->admin_telp ?>"required>
                <input type="email" name="email" placeholder="Email" class="input-control" 
                value="<?php echo $d->admin_email ?>"required>
                <input type="text" name="alamat" placeholder="Alamat" class="input-control" 
                value="<?php echo $d->admin_address ?>"required>
                <input type="submit" name="submit" value="Ubah Profil" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                $nama = $_POST['nama'];
                $user = $_POST['user'];
                $hp = $_POST['hp'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];

                $update = mysqli_query($conn, "UPDATE tb_admin SET
                admin_name = '".$nama."',
                username = '".$user."',
                admin_telp = '".$hp."',
                admin_email = '".$email."',
                admin_address = '".$alamat."'
                WHERE admin_id = '".$d->admin_id."' ");

                if($update){
                    echo'<script>alert("Ubah data berhasil")</script>';
                    echo'<script>window.location="?page=profil"</script>';
                }else{
                    echo'gagal'.mysqli_error($conn);
                }
            }
            ?>
</div>
<h1>Ubah Password</h1>
            <div class="box">
            <form action="" method="POST">
                <input type="password" name="pass1" placeholder="Password baru" class="input-control" required>
                <input type="password" name="pass2" placeholder="konfirmasi password" class="input-control" required>
                <input type="submit" name="ubah_password" value="Ubah Password" class="btn">
            </form>
            <?php
            if(isset($_POST['ubah_password'])){
                $pass1 = $_POST['pass1'];
                $pass2 = $_POST['pass2'];

                if($pass2 != $pass1){
                    echo '<script>alert("Konfirmasi password baru tidak sesuai")</script>';
                }else{
                    $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
                    password = '".MD5($pass1)."'
                    WHERE admin_id ='".$d->admin_id."' ");
                    if($u_pass){
                        echo'<script>alert("Ubah data berhasil")</script>';
                        echo'<script>window.location="?page=profil"</script>';
                    }else{
                        echo'gagal'.mysqli_error($conn);
                    }
                }

            }
            ?>
</div>
</div>
<!--footer-->

</body>
</html>