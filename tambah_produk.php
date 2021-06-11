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
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
</head>
<body>
    <!--header-->

<!-- content-->
    <div class="section">
        <div class="container">
            <h1>Tambah Data Produk</h1>
            <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
                <SELECT class="input-control" name="kategori" required>
                <option value="">---PILIH---</option>
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                WHILE($r = mysqli_fetch_array($kategori)){
                ?>
                <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name']?>-</option>
                <?php } ?>
                </SELECT>


                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                
                <SELECT class="input-control" name="size" required>
                <option value="">---PILIH---</option>
                <?php
                $size = mysqli_query($conn, "SELECT * FROM ukuran_produk ORDER BY id_size DESC");
                WHILE($s = mysqli_fetch_array($size)){
                ?>
                <option value="<?php echo $s['id_size']?>"><?php echo $s['size']?>-</option>
                <?php } ?>
                </SELECT>

                <input type="text" name="harga" class="input-control" placeholder="Harga" required>
                <input type="file" name="gambar" class="input-control" placeholder="" required>
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea><br>
                <SELECT class="input-control" name="status">
                <option value="">---PILIH---</option>
                <option value="1">Tersedia</option>
                <option value="0">Tidak Tersedia</option>
                </SELECT>
                <input type="submit" name="submit" value="Tambah" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){
                //print_r($_FILES['gambar']);
                //menampung inputan dari form
                $kategori = $_POST['kategori'];
                $nama = $_POST['nama'];
                $size = $_POST['size'];
                $harga = $_POST['harga'];
                $deskripsi = $_POST['deskripsi'];
                $status = $_POST['status'];
                //menampung data file yang diapload
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $tipe1 = explode('.',$filename);
                $tipe2 = $tipe1[1];
                $newname = 'produk'.time().'.'.$tipe2;
                //menampung data format file yang diizinkan
                $tipe_diizinkan = array('jpg','JPEG','png');
                //validasi format file
                if(!in_array($tipe2, $tipe_diizinkan)){
                    //jika format tidak ada tipe diizinkan
                    echo '<script>alert("format file tidak diizinkan")</script>';
                }else{
                    //jika format sesuai dengan array
                    //proses apload file sekaligus insert database
                    move_uploaded_file($tmp_name, './produk/'.$newname);

                    $insert = mysqli_query($conn, "INSERT INTO tb_produk VALUES (
                        null,
                        '".$kategori."',
                        '".$size."',
                        '".$nama."',
                        '".$harga."',
                        '".$deskripsi."',
                        '".$newname."',
                        '".$status."',
                        null
                        )");

                        if($insert){
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="?page=dataproduk"</script>';
                        }else{
                            echo 'Gagal'.mysqli_error($conn);
                        }
                }
               
            }
            ?>
</div>
</div>
</div>
<!--footer-->

<script>
                        CKEDITOR.replace( 'deskripsi' );
                </script>
</body>
</html>