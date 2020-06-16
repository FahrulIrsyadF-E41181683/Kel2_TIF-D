<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>
<script>
  inputBox = document.getElementById("FOTO_KTP"); // Mengambil elemen tempat Input gambar

  inputBox.addEventListener('change', function(input) { // Jika tempat Input Gambar berubah

    var box = document.getElementById("prev_foto1"); // mengambil elemen box
    var img = input.target.files; // mengambil gambar

    var reader = new FileReader(); // memanggil pembaca file/gambar
    reader.onload = function(e) { // ketika sudah ada
      box.setAttribute('src', e.target.result); // membuat alamat gambar
    }
    reader.readAsDataURL(img[0]); // menampilkan gambar
  });
</script>
<script>
  inputBox = document.getElementById("FOTO_ORG"); // Mengambil elemen tempat Input gambar

  inputBox.addEventListener('change', function(input) { // Jika tempat Input Gambar berubah

    var box = document.getElementById("prev_foto2"); // mengambil elemen box
    var img = input.target.files; // mengambil gambar

    var reader = new FileReader(); // memanggil pembaca file/gambar
    reader.onload = function(e) { // ketika sudah ada
      box.setAttribute('src', e.target.result); // membuat alamat gambar
    }
    reader.readAsDataURL(img[0]); // menampilkan gambar
  });
</script>
<script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-migrate-3.0.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.easing.1.3.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.waypoints.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.stellar.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/aos.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.animateNumber.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/scrollax.min.js') ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?php echo base_url('assets/js/google-map.js') ?>"></script>
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
<script src="<?php echo base_url('assets/js/myscrip.js') ?>"></script>
<script>
$('#nav a').click(function() {
    $('#nav a.active').removeClass('active');
    $(this).addClass('active');
    $('html, body').scrollTo($(this).attr('href'), 1000);
    return false;
});
</script>