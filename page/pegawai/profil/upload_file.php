<?php

    if(isset($_POST['submit'])){

        $nik = $_GET['id'];

        $file = $_FILES['foto']['name'];
        $tmpfile = $_FILES['foto']['tmp_name'];

        if(!$file){
            echo '<script>
            alert("Tidak Ada Foto Yang DiUpload!!");
                history.go(-1);
                </script>';
            
        }else{
    
            $namefile = date('dmYHis').$file;
            $lokasi = "../../assets/img/foto/".$namefile;
    
            if(move_uploaded_file($tmpfile,$lokasi)){
                $sqlupdate = mysqli_query($koneksi,"UPDATE users SET foto='$namefile' where nik='$nik'
                ");

                if($sqlupdate == true){
                    echo '<script>
                    alert("Foto Berhasil Diubah");
                    document.location="?page=profil";</script>';
                }else{
                    echo '<script>history.go(-1);</script>';
                }
            }
        }
    }
?>