const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        'Pelaporan Bencana',
        'Berhasil ' + flashData,
        'success'
    })
}