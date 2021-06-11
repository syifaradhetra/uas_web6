<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
    $produk = mysqli_query($conn, "SELECT * FROM tb_produk WHERE produk_id = '".$_GET['id']."' ");
    $p = mysqli_fetch_object($produk);
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
            <h1>Edit Data Produk</h1>
            <div class="box">
            <form action="" method="POST" enctype="multipart/form-data">
               
                <SELECT class="input-control" name="kategori" required>
                <option value="">---PILIH---</option>
                <?php
                $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                WHILE($r = mysqli_fetch_array($kategori)){
                ?>
                <option value="<?php echo $r['category_id']?>"<?php echo ($r['category_id'] == $p->category_id)? '
                selected':"" ?>><?php echo $r['category_name']?>-</option>
                <?php } ?>
                </SELECT>
               
                <input type="text" name="nama" class="input-control" placeholder="Nama Produk" value="<?php  echo 
                $p->produk_name ?>"required>


                <SELECT class="input-control" name="size" required>
                <option value="">---PILIH---</option>
                <?php
                $size = mysqli_query($conn, "SELECT * FROM ukuran_produk ORDER BY id_size DESC");
                WHILE($s = mysqli_fetch_array($size)){
                ?>
                <option value="<?php echo $s['id_size']?>"<?php echo ($s['id_size'] == $p->id_size)? '
                selected':"" ?>><?php echo $s['size']?>-</option>
                <?php } ?>
                </SELECT>


                 



                <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php  echo 
                $p->produk_price ?>"required>
                
                <img src="produk/<?php echo $p->produk_image ?>"width="130px">
                <input type="hidden" name="foto" value="<?php echo $p->produk_image ?>">
                <input type="file" name="gambar" class="input-control">
                <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php  echo 
                $p->produk_deskripsi ?></textarea><br>
                <SELECT class="input-control" name="status">
                <option value="">---PILIH---</option>
                <option value="1"<?php echo ($p->produk_status == 1)? 'selected' : "" ?>>Tersedia</option>
                <option value="0"<?php echo ($p->produk_status == 0)? 'selected' : "" ?>>Tidak Tersedia</option>
                </SELECT>
                <input type="submit" name="submit" value="Tambah" class="btn">
            </form>
            <?php
            if(isset($_POST['submit'])){

                //data inputan dari form
                $kategori = $_POST['kategori'];
                $nama = $_POST['nama'];
                $size = $_POST['size'];
                $harga = $_POST['harga'];
                $deskripsi = $_POST['deskripsi'];
                $status = $_POST['status'];
                $foto = $_POST['foto'];

                //tampung data gambar baru
                $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $tipe1 = explode('.',$filename);
                $tipe2 = $tipe1[1];
                $newname = 'produk'.time().'.'.$tipe2;

                //menampung data format file yang diizinkan
                $tipe_diizinkan = array('jpg','JPEG','png');

                //jika ganti gambar
                if($filename != ''){
                    if(!in_array($tipe2, $tipe_diizinkan)){
                    //jika format tidak ada tipe diizinkan
                    echo '<script>alert("format file tidak diizinkan")</script>';
                    }else{
                        unlink('./produk/'.$foto);
                        move_uploaded_file($tmp_name, './produk/'.$newname);
                        $namagambar = $newname;
                    }
                }else{
                    //jika admin tidak ganti gambar
                    $namagambar = $foto;
                }
                //query update data produk
                $update = mysqli_query($conn, "UPDATE tb_produk SET 
                category_id = '".$kategori."',
                produk_name = '".$nama."',
                id_size = '".$size."',
                produk_price = '".$harga."',
                produk_deskripsi = '".$deskripsi."',
                produk_image = '".$namagambar."',
                produk_status = '".$status."' 
                WHERE produk_id = '".$p->produk_id."' ");

            if($update){
                echo '<script>alert("Ubah data berhasil")</script>';
                echo '<script>window.location="?page=dataproduk"</script>';
            }else{
             echo 'Gagal'.mysqli_error($conn);
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