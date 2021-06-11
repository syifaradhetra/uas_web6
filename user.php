<?php   
    session_start();
    include 'koneksi.php';
    if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
    

}
?>
<link rel="stylesheet" type="text/css" href="css/style.css">


    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="section">
    <div class="container">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="margin-top:5px;">Daftar User</h3>
                <div class="card-tools">
                  <a href="?page=tambahuser" class="btn btn-sm btn-info float-right"><i class="fa fa-plus"></i> Tambah User</a>
                </div>
                <br>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <!-- <div class="col-sm-12">
                  <div class="alert alert-success" role="alert">Data Berhasil Ditambahkan</div>
                  <div class="alert alert-success" role="alert">Data Berhasil Diubah</div>
              </div> -->
              <table id="datatabel" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Username</th>
                          <th class="text-center">Image</th>
                          <th class="text-center">Telpon</th>
                          <th class="text-center">Email</th>
                          <th class="text-center">Alamat</th>
                          <th class="text-center">Opsi</th>
                      </tr>
                  </thead>
                  <tbody>
                  
                  <?php
                    $no = 1;
                    $datas = mysqli_query($conn, "SELECT * FROM tb_admin ORDER BY `admin_id` DESC");
                    if(mysqli_num_rows($datas) > 0){
                      WHILE($data = mysqli_fetch_array($datas)){
                  ?>


                  
                      <tr>
                          <td class="text-center"><?= $no++; ?></td>
                          <td class="text-center"><?= $data['admin_name'] ?></td>
                          <td class="text-center"><?= $data['username'] ?></td>
                          <td class="text-center"> <img src="img/<?= $data['image'] ?>" alt="" srcset="" width="80px"> </td>
                          <td class="text-center"><?= $data['admin_telp'] ?></td>
                          <td class="text-center"><?= $data['admin_email'] ?></td>
                          <td class="text-center"><?= $data['admin_address'] ?></td>
                          
                          <td class="text-center">
                              <a class="btn btn-info btn-s text-white" href="?page=edituser&id=<?= $data['admin_id'] ?>"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger btn-s text-white" href="?page=hapususer&idu=<?= $data['admin_id'] ?>" onclick="return confirm('Yakin Ingin Menghapus ?')"><i class="fa fa-trash"></i></a>
                          </a></td>
                      </tr>
                  <?php }} ?>
                    
                  </tbody>
              </table>
            </div>
            </div>
    </section>