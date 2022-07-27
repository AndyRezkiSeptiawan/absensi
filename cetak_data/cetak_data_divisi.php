<?php
include '../settings/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Bidang</title>

    
  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!--Data Table-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
    <style>

        body {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                background-color: #FAFAFA;
                font: 12pt "Tahoma";
                
            }
            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }

            .page {
                width: 210mm;
                min-height: 297mm;
                padding: 20mm;
                margin: 10mm auto;
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            /* .subpage {
                padding: 1cm;
                border: 5px red solid;
                height: 257mm;
                outline: 2cm #FFEAEA solid;
            } */
            
            @page {
                size: A4;
                margin: 0;
            }

            @media print {
            html, body {
                    width: 210mm;
                    height: 297mm;        
                }
                .page {
                    margin: 0;
                    border: initial;
                    border-radius: initial;
                    width: initial;
                    min-height: initial;
                    box-shadow: initial;
                    background: initial;
                    page-break-after: always;
                }
            }
        @media print { body { -webkit-print-color-adjust: exact; 
      
        } }
        

        .cop-lp .cop-text h3,
        .cop-lp .cop-text h3{
            font-size:30px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight:700;
            color:black;
        }
        .title h3{
            text-transform:uppercase;
            font-size:25px;
            line-spacing:20px;
            font-family: 'Source Serif Pro', serif;
            font-weight:200;
            color:black;
           
        }
        .cop-lp .cop-text small{
            font-size:18px;
            font-family: Arial, Helvetica, sans-serif;
            color:black;
        }
        .linep {
            width:105%;
            height:2px;
            background:black;
            position: absolute;
        }
        .footer-cop {
            color: #000000;
            text-align:right;
            float :right;
            margin: 50px  100px;
        }.footer-cop .ttd {
           content : '';
           height:100px;
        }
    </style>

</head>
<body onload="script:window.print()">
    

<?php

date_default_timezone_set('Asia/Makassar');

$bulan = array(
    '01' => 'JANUARI',
    '02' => 'FEBRUARI',
    '03' => 'MARET',
    '04' => 'APRIL',
    '05' => 'MEI',
    '06' => 'JUNI',
    '07' => 'JULI',
    '08' => 'AGUSTUS',
    '09' => 'SEPTEMBER',
    '10' => 'OKTOBER',
    '11' => 'NOVEMBER',
    '12' => 'DESEMBER',
);

$data = date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y');
$tglnow = $data;
?>


<div id="content book">
    <!-- cop report -->
    <div class="page">
        <div class="cop-lp d-flex justify-content-center mt-3" style="color:black">
            <div class="img" style="width:170px;margin-left:-50px">
                <img src="../assets/img/logo1.png" alt="logo" class="img-fluid"
                style="margin-top:-15px;width:250px;height:150px">
            </div>
              
            <div class="cop-text py-1 px-4 text-center" style="margin-left:-30px">
                <h3>DINAS KETAHANAN PANGAN,PERTANIAN</h3>
                <h3>DAN PERIKANAN KOTA BANJARBARU</h3>
                <small>Jl. Agus Salim Telp/Fax. 0511-4781050</small><br>
                <small>distangankanpemkobjb@yahoo.com</small>
            </div>
        </div>
        <div class="linep mt-2"></div>
        
        <div class="title mt-5 text-center">
            <h3>LAPORAN DATA BIDANG</h3>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center" style="backgorund:red">
                        <th>ID</th>
						<th>Nama Bidang</th>
                    </tr>
                </thead>
                <tbody>

                <?php
					$no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM bidang");
                    while($data = mysqli_fetch_array($sql)){

                        $nama = $data[1];
                        echo '
                        <tr class="text-center">
							<td style="width:1%">'.$no++.'</td>
                            <td>'.$nama.'</td>
                        </tr>
                        ';
                    }
                ?>
                </tbody>
            </table>
        </div>




        <div class="footer-cop">
        <div class="tgl">Banjarbaru <?=$tglnow?></div>
        <p class="mt-2">
        <b>Mengetahui</b><br>
        <b>Kepala Dinas DKP3 Banjarbaru</b></p>
        <div class="ttd"></div>
        <strong style="text-decoration:underline">Hamdah, SP, MT.</strong><br>
        </div>
    </div>
</div>


</body>
</html>