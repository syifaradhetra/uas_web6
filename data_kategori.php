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
    <!--header-->
  
<!-- content-->
<div>
    <div class="section">
        <div class="container">
            <h1>Data Kategori</h1>
            <div class="">
                <p><a href="?page=tambahkategori">Tambah Data</a></p>
                <table border="1" cellspacing="0" id="datatabel" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width = "60px">No</th>
                            <th>Kategori</th>
                            <th width = "150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                        if(mysqli_num_rows($kategori) > 0){
                        WHILE($row = mysqli_fetch_array($kategori)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a href="?page=editkategori&id=<?php echo $row['category_id']?>">Edit</a> || <a href="?page=hapuskategori&idk=<?php echo $row['category_id']?>" onclick="return confirm('Yakin Ingin Menghapus ?')">Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                            <td colspan="3">Tidak ada Produk</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
</div>
</div>
</div>
<!--footer-->

</body>
</html>