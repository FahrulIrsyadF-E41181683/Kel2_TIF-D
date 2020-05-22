// sweetalert
const flashData = $('.flash-data').data('flashdata');
if (flashData) {
  Swal.fire({
    title: 'Data Berita',
    text: 'Berhasil' + flasData,
    type: 'success'
  });
}

// upload gambar
$('.custom-file-input').on('change',function(){

    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("custom-file").html(fileName);
  });

  // merubah view berita
  $("#inputFile").change(function(event) {  
    fadeInAdd();
    getURL(this);    
  });

  $("#inputFile").on('click',function(event){
    fadeInAdd();
  });

  function getURL(input) {    
    if (input.files && input.files[0]) {   
      var reader = new FileReader();
      var filename = $("#inputFile").val();
      filename = filename.substring(filename.lastIndexOf('\\')+1);
      reader.onload = function(e) {
        debugger;      
        $('#imgView').attr('src', e.target.result);
        $('#imgView').hide();
        $('#imgView').fadeIn(500);      
        $('.custom-file-label').text(filename);             
      }
      reader.readAsDataURL(input.files[0]);    
    }
    $(".alert").removeClass("loadAnimate").hide();
  }

  function fadeInAdd(){
    fadeInAlert();  
  }
  function fadeInAlert(text){
    $(".alert").text(text).addClass("loadAnimate");  
  }

  // 
  $('.tombol_hapus').on('click', function (e){
    e.preventDefault();
  });