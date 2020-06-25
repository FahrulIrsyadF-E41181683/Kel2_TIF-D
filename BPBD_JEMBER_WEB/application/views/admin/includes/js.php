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