<?php
include 'koneksi.php';

if(isset($_GET['idu'])){
    $delete = mysqli_query($conn, "DELETE FROM tb_admin WHERE admin_id = '".$_GET['idu']."' ");
    echo '<script>window.location="?page=user"</script>';
}
?>