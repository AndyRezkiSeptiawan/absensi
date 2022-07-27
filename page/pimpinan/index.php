
<?php
    session_start();
    include 'layouts/header.php';

    if(empty($_SESSION) OR $_SESSION['level'] != 'Pimpinan'){
      session_destroy();
        echo "
      <script>
      alert('Anda Tidak Punya Akses');
      document.location = '../../login_logout/login_view.php';
      </script>
      ";
      
    }
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
        include 'layouts/sidebar.php';
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
        include 'layouts/topbar.php';
        ?>
        <!-- End of Topbar -->

        <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            switch($page){
                
                // dashboard
                case 'dashboard';
                include 'dashboard.php';
                break;


                // scan
                case 'scan-qrcode';
                include 'scan.php';
                break;



                // kehadiran

                // absen masuk
                case 'absensi';
                include 'absensi/index.php';
                break;
                case 'absensi=tambahdata';
                include 'absensi/tambah.php';
                break;
                case 'absensi=prosestambah';
                include 'absensi/prosestambah.php';
                break;
                case 'absensi=editdata';
                include 'absensi/edit.php';
                break;
                case 'absensi=prosesedit';
                include 'absensi/prosesedit.php';
                break;
                case 'absensi=hapus';
                include 'absensi/hapus.php';
                break;
                case 'absensi=qrcek-absen';
                include 'absensi/cek.php';
                break;
                case 'absen';
                include 'absensi/absen-trigger.php';
                break;

                // cuti
                case 'cuti';
                include 'cuti-izin/index.php';
                break;
                case 'cuti-add';
                include 'cuti-izin/tambah.php';
                break;
                case 'cuti-prosesadd';
                include 'cuti-izin/prosestambah.php';
                break;
                case 'cuti-edit';
                include 'cuti-izin/edit.php';
                break;
                case 'cuti-prosesedit';
                include 'cuti-izin/prosesedit.php';
                break;
                case 'cuti-hapus';
                include 'cuti-izin/hapus.php';
                break;
                case 'cuti-ajukan';
                include 'cuti-izin/cek-status.php';
                break;

                 // profil
                case 'profil';
                include 'profil/index.php';
                break;
                case 'buat-qrcode';
                include 'profil/qrcode.php';
                break;
                case 'unggah-foto';
                include 'profil/upload_file.php';
                break;

                // pegawai
                case 'data-pegawai';
                include 'pegawai/index.php';
                break;
                case 'data-pegawai=tambah';
                include 'pegawai/tambah.php';
                break;
                case 'data-pegawai=prosestambah';
                include 'pegawai/prosestambah.php';
                break;
                case 'data-pegawai=edit';
                include 'pegawai/edit.php';
                break;
                case 'data-pegawai=prosesedit';
                include 'pegawai/prosesedit.php';
                break;
                case 'data-pegawai=hapus';
                include 'pegawai/hapus.php';
                break;
                case 'data-pegawai=qrcode';
                include 'pegawai/qr-code.php';
                break;


                // // divisi

                // case 'divisi';
                // include 'page/divisi/index.php';
                // break;
                // case 'divisi=tambah';
                // include 'page/divisi/tambah.php';
                // break;
                // case 'divisi=prosestambah';
                // include 'page/divisi/prosestambah.php';
                // break;
                // case 'divisi=edit';
                // include 'page/divisi/edit.php';
                // break;
                // case 'divisi=prosesedit';
                // include 'page/divisi/prosesedit.php';
                // break;
                // case 'divisi=hapus';
                // include 'page/divisi/hapus.php';
                // break;

                  // // pangkat

                  // case 'pangkat';
                  // include 'page/pangkat/index.php';
                  // break;
                  // case 'pangkat=tambah';
                  // include 'page/pangkat/tambah.php';
                  // break;
                  // case 'pangkat=prosestambah';
                  // include 'page/pangkat/prosestambah.php';
                  // break;
                  // case 'pangkat=edit';
                  // include 'page/pangkat/edit.php';
                  // break;
                  // case 'pangkat=prosesedit';
                  // include 'page/pangkat/prosesedit.php';
                  // break;
                  // case 'pangkat=hapus';
                  // include 'page/pangkat/hapus.php';
                  // break;

                // // gaji pegawai
                // case 'gaji-pegawai';
                // include 'page/gaji/index.php';
                // break;
                // case 'gaji-pegawai=tambahdata';
                // include 'page/gaji/tambah.php';
                // break;
                // case 'gaji-pegawai=prosestambah';
                // include 'page/gaji/prosestambah.php';
                // break;
                // case 'gaji-pegawai=editdata';
                // include 'page/gaji/edit.php';
                // break;
                // case 'gaji-pegawai=prosesedit';
                // include 'page/gaji/prosesedit.php';
                // break;
                // case 'gaji-pegawai=hapus';
                // include 'page/gaji/hapus.php';
                // break;
                
                // // kenaikan pangkat
                // case 'kenaikan-pangkat';
                // include 'page/kenaikan-pangkat/index.php';
                // break;
                // case 'kenaikan-pangkat=tambahdata';
                // include 'page/kenaikan-pangkat/tambah.php';
                // break;
                // case 'kenaikan-pangkat=prosestambah';
                // include 'page/kenaikan-pangkat/prosestambah.php';
                // break;
                // case 'kenaikan-pangkat=editdata';
                // include 'page/kenaikan-pangkat/edit.php';
                // break;
                // case 'kenaikan-pangkat=prosesedit';
                // include 'page/kenaikan-pangkat/prosesedit.php';
                // break;
                // case 'kenaikan-pangkat=hapus';
                // include 'page/kenaikan-pangkat/hapus.php';
                // break;

                //  // akun
                //  case 'akun';
                //  include 'page/akun/index.php';
                //  break;
                //  case 'akun=tambahdata';
                //  include 'page/akun/tambah.php';
                //  break;
                //  case 'akun=prosestambah';
                //  include 'page/akun/prosestambah.php';
                //  break;
                //  case 'akun=editdata';
                //  include 'page/akun/edit.php';
                //  break;
                //  case 'akun=prosesedit';
                //  include 'page/akun/prosesedit.php';
                //  break;
                //  case 'akun=hapus';
                //  include 'page/akun/hapus.php';
                //  break;


                //  rekap
                 case 'rekap-absen';
                 include 'rekap/rekap-absen.php';
                 break;
                 case 'rekap-cuti';
                 include 'rekap/rekap-cuti.php';
                 break;
                 case 'rekap-gaji';
                 include 'rekap/rekap-gaji.php';
                 break;
                 case 'rekap-kenaikan-pangkat';
                 include 'rekap/rekap-kenaikanpangkat.php';
                 break;
                 case 'rekap-pegawai';
                 include 'rekap/rekap-pegawai.php';
                 break;

                  // gaji pegawai
                case 'riwayat-gaji';
                include 'page/riwayat-gaji/index.php';
                break;
                case 'riwayat-gaji=tambahdata';
                include 'page/riwayat-gaji/tambah.php';
                break;
                case 'riwayat-gaji=prosestambah';
                include 'page/riwayat-gaji/prosestambah.php';
                break;
                case 'riwayat-gaji=editdata';
                include 'page/riwayat-gaji/edit.php';
                break;
                case 'riwayat-gaji=prosesedit';
                include 'page/riwayat-gaji/prosesedit.php';
                break;
                case 'riwayat-gaji=hapus';
                include 'page/riwayat-gaji/hapus.php';
                break;

            }
        }
        ?>
        <!-- Begin Page Content -->
       
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php
        include 'layouts/footer.php';
        ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah Anda Yakin Ingin Keluar?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../login_logout/aksi_logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  
  <!-- Core plugin JavaScript-->
  <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../assets/vendor/chart.js/Chart.min.js"></script>
  
  <!-- calender -->
  <!-- <script src="../../assets/vendor/fullcalendar/lib/main.js"></script> -->

  <!-- Page level custom scripts -->
  <script src="../../assets/js/demo/chart-area-demo.js"></script>
  <script src="../../assets/js/demo/chart-pie-demo.js"></script>
  
  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script> -->
  <script src="../../assets/vendor/ckeditor/ckeditor5/ckeditor.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
    setInterval(runningTime, 1000);
    });
    function runningTime() {
      $.ajax({
        url: 'time.php',
        success: function(data) {
          $('#runningTime').html(data);
        },
      });
    }
  </script>
  
  <script>
          ClassicEditor
              .create(document.querySelector( '#ket'))
                .then( editor => {
                    console.log( editor );
              } )
                .catch( error => {
                    console.error( error );
              } );
    </script>
    <script>
          ClassicEditor
              .create(document.querySelector( '#alamat'))
                .then( editor => {
                    console.log( editor );
              } )
                .catch( error => {
                    console.error( error );
              } );
  </script>

  <script type="text/javascript" src="../../resource/absen/js/qrcodelib.js"></script>
  <script type="text/javascript" src="../../resource/absen/js/webcodecamjquery.js"></script>
  <script type="text/javascript">
          var arg = {
              resultFunction: function(result) {
                  var redirect =  '?page=kehadiran/absensi=qrcek-absen';
                  $.redirectPost(redirect, {idpegawai: result.code});
              }
          };

          var decoder = $("#scan").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery;
          decoder.buildSelectMenu("select");
          decoder.play();

          $('select').on('change', function(){
              decoder.stop().play();
          });

          $.extend(
              {
                  redirectPost: function(location, args)
                  {
                      var form = '';
                      $.each( args, function( key, value ){
                          form += '<input type="hidden" name="'+key+'" value="'+value+'">';
              });
              $('<form action="'+location+'" method="POST">'+form+'</form>').appendTo('body').submit();
                  }
              }
          );


  </script>

  <script type="text/javascript">
				$(document).ready(function() {
					$('#datatabel').DataTable({
						"aoColumnDefs": [
						{ "bSortable": false, "aTargets": [1,2,3,4] }, 
						{ "bSearchable": false, "aTargets": [1,2,3,4] }
						],
						"language":{
							search: "Cari : ",
							searchPlaceholder: "Cari Data..."
						},
						"lengthChange": false,
						// "order": [
						// [0, "ASC"]
						],
						"iDisplayLength": 5,
					});
				});
    </script>
        <script src="../../assets/vendor/fullcalendar/lib/main.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
    <script>

        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          selectable: true,
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,listYear'
          },

          displayEventTime: false, // don't show the time column in list view

          // THIS KEY WON'T WORK IN PRODUCTION!!!
          // To make your own Google API key, follow the directions here:
          // http://fullcalendar.io/docs/google_calendar/
          googleCalendarApiKey: 'AIzaSyABiuAc2VpmHaq6XBY6JgCiqFvp-dP53yw',
          
          // US Holidays
          events: 'en.indonesian#holiday@group.v.calendar.google.com',

          eventClick: function(arg) {
            // opens events in a popup window
            window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

            arg.jsEvent.preventDefault() // don't navigate in main tab
          },

          loading: function(bool) {
            document.getElementById('loading').style.display =
              bool ? 'block' : 'none';
          }

        });

        calendar.render();
      });

    </script>

       <!-- <script>
      document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    initialView: 'dayGridMonth',
                    events: [

                      <?php
                        require '../../settings/koneksi.php';
                        $data = mysqli_query($koneksi, "SELECT * FROM calender");

                        while($lop = mysqli_fetch_array($data)){
                          ?>
                          {
                            title: '<?= $lop['nama'];?>',
                            start: '<?= $lop['tgl'];?>',
                            color: 'yellow',
                            textColor: 'black'
                          }, <?php }
                      ?>
                    ],
                    // selectOverlap: function (event) {
                    //     return event.rendering === ';
                    // }
                });
    
                calendar.render();
            });
    </script> -->

    <script>
      function pang(){
      
        // alert('hello');
        var p = $('#pangkat').val();
        $.ajax({
          // alert(dnip);
          url : 'profil/autofill.php',
          data : 'id_p='+p,
        }).done(function(data){
          var json = data,
          jnip = JSON.parse(json);
          $('#golongan').val(jnip.gol);
          $('#gaji').val(jnip.gaji);
        });
      }
    </script>

    <script>
      function pg(){
      
        // alert('hello');
        var idp = $('#id_pegawai').val();
        $.ajax({
          // alert(dnip);
          url : 'page/gaji/autofill.php',
          data : 'idp='+idp,
        }).done(function(data){
          var json = data,
          jnip = JSON.parse(json);
          $('#pangkat').val(jnip.nama);
          $('#gaji').val(jnip.gaji);
        });
      }
    </script>

  <script>
        function kp(){
        
          // alert('hello');
          var idp = $('#id_pegawai').val();
          $.ajax({
            // alert(dnip);
            url : 'page/kenaikan-pangkat/autofill.php',
            data : 'id_p='+idp,
          }).done(function(data){
            var json = data,
            jnip = JSON.parse(json);
            $('#id').val(jnip.id);
            $('#pangkat').val(jnip.nama);
            $('#golongan').val(jnip.gol);
          });
        }
      </script>
</body>

</html>
