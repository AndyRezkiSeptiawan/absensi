<?php
include '../settings/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slip Gaji</title>


    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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

            html,
            body {
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

        @media print {
            body {
                -webkit-print-color-adjust: exact;

            }
        }


        .cop-lp .cop-text h3,
        .cop-lp .cop-text h3 {
            font-size: 30px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: 700;
            color: black;
        }

        .title h3 {
            text-transform: uppercase;
            font-size: 25px;
            line-spacing: 20px;
            font-family: 'Source Serif Pro', serif;
            font-weight: 200;
            color: black;

        }

        .cop-lp .cop-text small {
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            color: black;
        }

        .linep {
            width: 105%;
            height: 2px;
            background: black;
            position: absolute;
        }

        .footer-cop {
            color: #000000;
            text-align: right;
            float: right;
            margin: 50px 100px;
        }

        .footer-cop .ttd {
            content: '';
            height: 100px;
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

    $id = $_GET['id'];
    $ambldt = mysqli_query($koneksi,"SELECT * FROM data_pegawai
    INNER JOIN gaji ON data_pegawai.gaji = gaji.id_gaji
    WHERE id_gaji ='$id'");
    $data = mysqli_fetch_assoc($ambldt);
    $id_peggawaidt = $data['id_pegawai'];
    $idd = $data['id_divisi'];

    $tgl = date('F', STRTOTIME($data['waktu']));
?>


    <div id="content book">
        <!-- cop report -->
        <div class="page">
            <div class="title mt-2 text-center">
                <h3 style="font-size:50px">SLIP Gaji</h3>
            </div>
            <div class="dinas" style="margin-left:50px">
                
                <h5>DPK3 BANJARBARU</h5>
                <h5>Pembayaran : Gaji Bulan <?=$tgl?> 2022</h5>
            </div>
            <div class="pegawai" style="margin-left:50px">
                <h5>Pegawai : <?=$data['nama']?> (<?=$data['nik']?>)</h5>
            </div>
            <div class="table-responsive mt-4" style="margin: 0 100px">

                <table class="table table-striped w-75">
                    <tr>
                        <th colspan="3" class="text-center table-info">PENGHASILAN</th>
                    </tr>
                    <tr>
                                <th>Gaji Pokok</th>
                                <td>:</td>
                                <td>Rp <?=number_format($data['gaji_pokok'],0,',','.')?></td>
                            </tr>
                    <tr>
                        <th>Tun Istri/Suami</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_istri_suami'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tun Anak</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_anak'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tun Umum</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_umum'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tun Struktur</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_struktur'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tun Fungsi</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_fungsi'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tun Lain</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_lain'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tun Bulat</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_bulat'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tun Beras</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_beras'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tun Pajak</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['t_pajak'],0,',','.')?></td>
                    </tr>
                    <tr style="border-top:2px solid black;">
                        <th colspan="2">Jumlah Kotor</th>
                        <td>Rp <?=number_format($data['jml_kotor'],0,',','.')?></td>
                    </tr>
                </table>

                <table class="table table-striped w-75">
                    <tr>
                        <th colspan="3" class="text-center table-info">POTONGAN</th>
                    </tr>
                    <tr>
                        <th>Potongan Beras</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['pot_beras'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>iwp</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['iwp'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Potongan Pph</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['pot_pph'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Sewa Rumah</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['sewa_rumah'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Tunggakan</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['tunggakan'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Utang</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['utang'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Potongan Lain</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['pot_lain'],0,',','.')?></td>
                    </tr>
                    <tr>
                        <th>Taperum</th>
                        <td>:</td>
                        <td>Rp <?=number_format($data['taperum'],0,',','.')?></td>
                    </tr>
                    <tr style="border-top:1px solid black;">
                        <td colspan="2">Jumlah Potongan</td>
                        <td>Rp <?=number_format($data['jml_pot'],0,',','.')?></td>
                    </tr>
                    <tr style="border-top:2px solid black;border-bottom:2px solid black">
                        <td colspan="2">Jumlah Bersih</td>
                        <td>Rp <?=number_format($data['jml_bersih'],0,',','.')?></td>
                    </tr>

                </table>

            </div>
        </div>
    </div>


</body>

</html>