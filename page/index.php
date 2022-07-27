<?php
    session_start();
    if(!empty($_SESSION)){
        if($_SESSION['level'] == 'Admin'){
            echo "
            <script>
            document.location = 'admin/index.php?page=dashboard';
            </script>
            ";
        }else if($_SESSION['level'] == 'Pegawai'){
            echo "
            <script>
            document.location = 'pegawai/index.php?page=dashboard';
            </script>
            ";
        }else if($_SESSION['level'] == 'Pimpinan'){
            echo "
            <script>
            document.location = 'pimpinan/index.php?page=dashboard';
            </script>
            ";
        }
        else{
            session_destroy();
            echo "
            <script>
                alert('Anda Tidak Dapat Login');
                document.location = '../login_logout/login_view.php';
            </script>
            ";
        }
    }else{
        echo "
            <script>
                alert('Anda Tidak Dapat Login');
                document.location = '../login_logout/login_view.php';
            </script>
            ";
    }

    
// update script

?>