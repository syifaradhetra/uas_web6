<?php
    $do = explode ("/", $_REQUEST['do']);
    $opsi = $do[0];
    define('PUB_DIR', dirname (__FILE__) . '/');
    switch($opsi) {
            
        default:
            $halaman=$opsi;
            if($halaman==''){
                $halaman = 'home';
                require_once (PUB_DIR . 'home.php');    
            }else{
                $namafile = $halaman.'.php';
                if(file_exists($namafile)){
                    require_once (PUB_DIR . $halaman.'.php');        
                }else{
                    
                }
            }
    }
?>