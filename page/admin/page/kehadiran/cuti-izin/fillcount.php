<?php

    $awal = $_GET['awal'];
    $akhir = $_GET['akhir'];


    function selisih($awal, $akhir){
        $set = 0;
        $period = new DatePeriod(new DateTime($awal), 
                  new DateInterval('P1D'),
                  new DateTime(date('Y-m-d', strtotime('+1 day', strtotime($akhir)))));
    
        foreach($period as $period){
            $date = $period->format('Ymd');
            $array = json_decode(file_get_contents("../../../../calendar.json"),true);

            if(isset($array[$date])) {
                //jika tanggal merah berdasarkan libur nasional
            } else if(date("D",strtotime($date))==="Sun") {
                //jika Hari Minggu
            }	else if(date("D",strtotime($date))==="Sat") {
                //jika Hari Sabtu
            } else {
                //jika Bukan Tanggal Merah dan Libur Nasional
                $set++;
            }
        }

        return $set;
    }
    $arr = array(
        'selisih' => selisih($awal, $akhir),
    );

    echo json_encode($arr);
    
?>