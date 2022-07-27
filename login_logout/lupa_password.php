<?php

require '../settings/koneksi.php';
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $passbr = md5($_POST['passbaru']);

    $sql_user = mysqli_query($koneksi, "SELECT * FROM users
    WHERE username ='$user'");

    $data = mysqli_num_rows($sql_user);
    if($data == 1){

        // $hpass = password_hash($passbr, PASSWORD_DEFAULT);
        $sqlupd = mysqli_query($koneksi,"UPDATE users SET password='$passbr' WHERE username='$user'");

        if($sqlupd == true){
            echo'
            <script>
            alert("Password Berhasil Diubah");
            document.location ="login_view.php";
            </script>
            ';
        }
    }
    else{
        echo'
        <script>
        alert("Username Tidak Ada");
        history.go(-1);
        </script>
        ';
    }

}

// $sql_user = mysqli_query($koneksi, "SELECT * FROM users");
// var_dump


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas DKP3 Banjarbaru</title>
</head>
<body>
    
    <div class="section-lupa-password-widg">
        <div class="container">
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="passbaru" id="passbaru" placeholder="Password Baru">
                <button type="submit" name="submit">Ubah Password</button>
            </form>
        </div>
    </div>


</body>
</html>