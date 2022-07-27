<?php
  include 'layouts/header.php';

    
    if(empty($_SESSION) OR $_SESSION['level'] != 'Pegawai'){
      session_destroy();
        echo "
      <script>
      alert('Anda Tidak Punya Akses');
      document.location = '../../login_logout/login_view.php';
      </script>
      ";
      
    }
?>
<!-- <marquee id="marquee" style="padding:5px 0;color:black" behavior="scroll" direction="left" scrollamount="12">Selamat Datang Di Aplikasi Absensi 
Dinas Ketahanan Pangan,Pertanian Dan Perikanan Kota Banjarbaru </marquee> -->
<body class="d-flex flex-column h-100">
	<?php
      if(isset($_GET['page'])){
        $page = $_GET['page'];
        switch($page){

            case 'dashboard';
            include 'dashboard.php';
            break;

            case 'absen-qrcode';
            include 'absen/absen-qrcode.php';
            break;
            case 'absensi=qrcek-absen';
            include 'absen/cek.php';
            break;
            case 'absen-pegawai';
            include 'absen/absen-trigger.php';
            break;

             // absen
            case 'absen';
            include 'absen/index.php';
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

            // 
            case 'slip-gaji';
            include 'slip-gaji/index.php';
            break;
            case 'slip-gaji=show';
            include 'slip-gaji/show.php';
            break;


            // report
            case 'rekap';
            include 'rekap/rekap.php';
            break;

            default :
            include '404.php';

            
        }
      }
  ?>
	<!--Footer-->
	<hr size="7">
	<?php
  include 'layouts/footer.php';
  ?>

	<!--Popper Bootstrap JS-->
	<script type="text/stylesheet" src="../assets/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
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

  <script type="text/javascript" src="../../resource/absen/js/qrcodelib.js"></script>
  <script type="text/javascript" src="../../resource/absen/js/webcodecamjquery.js"></script>
  <script type="text/javascript">
          var arg = {
              resultFunction: function(result) {
                  var redirect =  '?page=absensi=qrcek-absen';
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
						"order": [
						[0, "desc"]
						],
						"iDisplayLength": 5,
					});
				});
    </script>

    <script src="../../assets/vendor/ckeditor/ckeditor5/ckeditor.js"></script>
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
</body>
</html>



<!--warning=orange, info=biru muda, danger=merah, primary=biru, secondary=abu-abu, succes=hijau-->