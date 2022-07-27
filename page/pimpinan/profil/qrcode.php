<?php
    if(isset($_GET['id'])){

        $id_pegawai = $_GET['id'];
        $no = $id_pegawai;

		include "../../resource/phpqrcode/qrlib.php";
		$tempdir = "../../assets/qrcode/";

		if(!file_exists($tempdir)){
			mkdir($tempdir);
		}

		$isi_teks = $no;
		$namafile = $no.".png";
		$quality = "H";
		$ukuran = 5;
		$padding = 2;

		QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

        echo '
        <script>
        alert("QRCode Berhasil Dibuat");
        document.location = "?page=profil";
        </script>
        ';

    }

?>