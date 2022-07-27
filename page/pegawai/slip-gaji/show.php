<?php

    $id = $_SESSION['id'];
    $nik = $_SESSION['nik'];
    $nama = $_SESSION['nama'];
    $level = $_SESSION['level'];
   

    $ambldt = mysqli_query($koneksi,"SELECT * FROM data_pegawai
    INNER JOIN gaji ON data_pegawai.gaji = gaji.id_gaji
    WHERE nik='$nik'");
    $data = mysqli_fetch_assoc($ambldt);
    $id_peggawaidt = $data['id_pegawai'];
    $idd = $data['id_divisi'];

    $ambluser = mysqli_query($koneksi,"SELECT * FROM users
    WHERE id_user='$id'");
    $data1 = mysqli_fetch_assoc($ambluser);
?>
<div class="container rounded bg-white">
    <div class="row justify-content-center">
        <div class="col-md-10 col-12">
            <div class="p-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Detail Gaji</h4>
                    <div class="cetak">
                        <a href="../../cetak_data/cetak_slip_gaji.php?id=<?=$data['id_gaji']?>" target="_blank"
                            class="btn btn-primary btn-sm">Cetak Slip Gaji</a>
                    </div>
                </div>

                <div class="row">
                    <table class="table table-borderless">
                        <tr>
                            <th style="width:25%">ID Pegawai</th>
                            <td style="width:1%">:</td>
                            <td><?=$data['id_pegawai']?></td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?=$data['nama']?></td>
                        </tr>
                        <tr>
                            <th>Waktu Pengajian</th>
                            <td>:</td>
                            <td><?=date('d-m-Y', strtotime($data['waktu']))?></td>
                        </tr>
                    </table>
                    <div class="col-md-6 col-12">

                        <table class="table table-striped">
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
                            <tr class="bg-primary text-white">
                                <td colspan="2">Jumlah Kotor</td>
                                <td>Rp <?=number_format($data['jml_kotor'],0,',','.')?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6 col-12">
                        <table class="table table-striped">
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
                            <tr class="bg-primary text-white">
                                <td colspan="2">Jumlah Potongan</td>
                                <td>Rp <?=number_format($data['jml_pot'],0,',','.')?></td>
                            </tr>
                            <tr class="bg-dark text-white">
                                <td colspan="2">Jumlah Bersih</td>
                                <td>Rp <?=number_format($data['jml_bersih'],0,',','.')?></td>
                            </tr>

                        </table>
                    </div>
                </div>


                <div class="mt-5 text-center">
                    <a href="?page=dashboard" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>


?>