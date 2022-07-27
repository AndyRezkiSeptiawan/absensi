<?php
	session_start();
	if(!empty($_SESSION)){
		if($_SESSION['level'] == 'Manager'){
			echo "
				<script>
					document.location = 'page/index.php';
				</script>
			";
		}
		if($_SESSION['level'] == 'Karyawan'){
			echo "
				<script>
					document.location = 'page/index.php';
				</script>
			";
		}else{
			echo "
				<script>
					alert('Anda Tidak Dapat Login');
					document.location = 'login_logout/login_view.php';
				</script>
			";
		}
	}else{
		echo "
				<script>
					document.location = 'login_logout/login_view.php';
				</script>
			";
	}
?>