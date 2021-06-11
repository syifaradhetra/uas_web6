<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
    $admin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_GET['id']."' ");
    $a = mysqli_fetch_object($admin);
?>

<link rel="stylesheet" type="text/css" href="css/style.css">


<section class="content section">
<div class="container">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title"style="margin-top:5px;"><i class="fa fa-list-alt"></i> Form Edit Data User</h3>
        <div class="card-tools">
          <a href="?page=user" class="btn btn-sm btn-warning float-right"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      </br>
      <!-- <div class="col-sm-10">
          <div class="alert alert-danger" role="alert">Maaf data nama wajib di isi</div>
      </div> -->
      <form class="form-horizontal" enctype="multipart/form-data" method="POST">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-info"><i class="fa fa-user-circle"></i> <u>Data User</u></span></label>
          </div>          
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" required class="form-control" name="nama" id="nama" value="<?php echo $a->admin_name ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-7">
              <input type="text" required class="form-control" name="username" id="username" value="<?php echo $a->username ?>">
            </div>
          </div>
          <img src="img/<?php echo $a->image ?>"width="130px">
          <input type="hidden" name="foto" value="<?php echo $a->image ?>">
          <input type="file" name="gambar" class="input-control">
          <!-- <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-7">
              <input type="password" required class="form-control" name="password" id="password" value="" disabled>
            </div>
          </div> -->
          <div class="form-group row">
            <label for="telp" class="col-sm-3 col-form-label">No Telpon</label>
            <div class="col-sm-7">
              <input type="number" required class="form-control" name="telp" id="telp" value="<?php echo $a->admin_telp ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-7">
              <input type="email" required class="form-control" name="email" id="email" value="<?php echo $a->admin_email ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-7">
              <input type="text" required class="form-control" name="address" id="address" value="<?php echo $a->admin_address ?>">
            </div>
          </div>
          

          </div>
        </div>

      
                
          <div class="col-sm-12">
            <button type="submit" name="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Simpan</button>
          </div>  
        
     
      </form>
      <?php
          if(isset($_POST['submit'])){

            //data inputan dari form
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            // $password = $_POST['password'];
            $telp = $_POST['telp'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $foto = $_POST['foto'];

            $filename = $_FILES['gambar']['name'];
                $tmp_name = $_FILES['gambar']['tmp_name'];

                $tipe1 = explode('.',$filename);
                $tipe2 = $tipe1[1];
                $newname = 'user'.time().'.'.$tipe2;

                //menampung data format file yang diizinkan
                $tipe_diizinkan = array('jpg','JPEG','png');

                //jika ganti gambar
                if($filename != ''){
                    if(!in_array($tipe2, $tipe_diizinkan)){
                    //jika format tidak ada tipe diizinkan
                    echo '<script>alert("format file tidak diizinkan")</script>';
                    }else{
                        unlink('./img/'.$foto);
                        move_uploaded_file($tmp_name, './img/'.$newname);
                        $namagambar = $newname;
                    }
                }else{
                    //jika admin tidak ganti gambar
                    $namagambar = $foto;
                }
           

            //query update data user
            $update = mysqli_query($conn, "UPDATE tb_admin SET 
            admin_name = '".$nama."',
            username = '".$username."',
            admin_telp = '".$telp."',
            admin_email = '".$email."',
            admin_address = '".$address."' ,
            image = '".$namagambar."'
            WHERE admin_id = '".$a->admin_id."' ");

        if($update){
            echo '<script>alert("Ubah data berhasil")</script>';
            echo '<script>window.location="?page=user"</script>';
        }else{
         echo 'Gagal'.mysqli_error($conn);
}

        }
        ?>
            
    </div>
    <!-- /.card -->
</div>

    </section>