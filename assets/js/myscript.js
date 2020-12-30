const flashData = $('.flash-data').data('flashdata');

if( flashData ){
    Swal({
        title: 'Data Mahasiswa' + flashData,
        text: 'berhasil',
        type: 'success'
    });
}

$('.tombol-hapus').on('click', function(e){


    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Apakah anda yakin?',
        text: 'Data Mahasiswa akan dihapus',
        type: 'warning',
        showCencelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.value) {
           document.location.href = href;
        }
    })

});