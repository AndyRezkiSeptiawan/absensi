<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $status = 'Ajukan';
    $update = mysqli_query($koneksi, "UPDATE cuti SET status_cuti='$status'
    where id_cuti='$id'
    ");
    echo '
    <script>
    history.go(-1);
    </script>
    ';
}

?>