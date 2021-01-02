const flashData = $('.flash-data').data('flashdata');

if( flashData ){
    Swal.fire({
        icon: 'success',
        title: 'Data' + flashData,
        text: 'Coba di cek biar lebih pasti..',
        footer: ''
    });
}

$('.tombol-hapus').on('click', function(e){


    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apa kamu yakin?',
        text: 'Datanya akan dihapus lho..',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus dong!'
      }).then((result) => {
        if (result.value) {
        //   
            document.location.href = href;
        }
      })

});