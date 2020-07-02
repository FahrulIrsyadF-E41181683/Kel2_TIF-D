<!--   Core JS Files   -->
<script src="<?php echo base_url('assets/js/core/jquery.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/core/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/datepicker/js/bootstrap-datepicker.js') ?>"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="<?php echo base_url('assets/js/plugins/chartjs.min.js') ?>"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js') ?>"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?php echo base_url('assets/js/paper-dashboard.min.js?v=2.0.0') ?>" type="text/javascript"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url('assets/demo/demo.js') ?>"></script>
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
</script>
<!-- Ckeditor -->
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>" type="text/javascript"></script>
<script>
  var ckeditor = CKEDITOR.replace('ckeditor');

  CKEDITOR.disableAutoInline = true;
  CKEDITOR.inline('editable');
</script>
<script type="text/javascript">
  $(function() {
    CKEDITOR.replace('ckeditor');
  });
</script>
<script>
  $(function() {
    $('#datepicker').datepicker({
      autoclose: true
    });
  });
</script>

<!--     Script untuk aktivasi data tables data tables     -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function() {
    $('#DatTable').DataTable();
  });
</script>

<!-- Sweetalert -->
<script src="<?php echo base_url('assets/js/sweetalert2.all.min.js') ?>"></script>
<!-- scrip js -->
<script src="<?php echo base_url('assets/js/scrip.js') ?>"></script>

<script>
  $(document).ready(function() {
    $('.notif').click(function() {
      var id_laporan = $(this).data('id_laporan')
      // $('.countnotif').empty();
      $.ajax({
        url: "<?= base_url('admin/dashboard/readNotif') ?>",
        type: 'POST',
        data: {
          id_laporan: id_laporan
        },
        success: function(result) {
          console.log(result)
        },
        error: function(e) {
          console.log('gagal')
        }
      })
    })
  })
</script>

<script src="<?= base_url('assets/js/plugins/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/tes.js'); ?>"></script>
<script>
  $('#btn-detail').click(function() {
    var lat = $(this).data('lat');
    var lng = $(this).data('lng');
    console.log(lat, lng)
    var mymap = L.map('mapid').setView([lat, lng], 14);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1IjoiZGFueWloemEiLCJhIjoiY2tiemIwYXd2MTd0cDJycDdhc21maHhoYiJ9.SSegn2rWaPHVDggnqFK9_Q'
    }).addTo(mymap);

    L.marker([lat, lng]).addTo(mymap)

  })
  // .bindPopup("<b>Hello world!</b><br />I am a popup.").openPopup();

  // L.circle([51.508, -0.11], 500, {
  //   color: 'red',
  //   fillColor: '#f03',
  //   fillOpacity: 0.5
  // }).addTo(mymap).bindPopup("I am a circle.");

  // L.polygon([
  //   [51.509, -0.08],
  //   [51.503, -0.06],
  //   [51.51, -0.047]
  // ]).addTo(mymap).bindPopup("I am a polygon.");


  // var popup = L.popup();

  // function onMapClick(e) {
  //   popup
  //     .setLatLng(e.latlng)
  //     .setContent("You clicked the map at " + e.latlng.toString())
  //     .openOn(mymap);
  // }

  // mymap.on('click', onMapClick);
</script>
<?php if ($this->session->flashdata('password_changed')) : ?>
  <script>
    Swal.fire({
      title: 'Sukses',
      text: 'Password berhasil diubah',
      icon: 'success'
    })
  </script>
<?php endif; ?>