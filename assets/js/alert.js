$('.logout').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Pilih tombol "Keluar" di bawah, jika Anda yakin untuk mengakhiri sesi Anda saat ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Keluar',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        }
    })
})

$('.delete').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Pilih tombol "Hapus Data" di bawah, jika Anda yakin untuk menghapus data ini!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        }
    })
})

$('.is-active').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Pilih tombol "Active!" di bawah, jika Anda yakin untuk mengaktifkan Akun!',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Active!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        }
    })
})

$('.is-non-active').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Pilih tombol "Non Active!" di bawah, jika Anda yakin untuk mengnonaktifkan Akun!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Non Active!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        }
    })
})

$('.payment').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: 'Pilih tombol "Ya!" di bawah, jika Anda yakin untuk membayar SPP!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        }
    })
})

$('.warning-payment').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        text: 'Mohon Bayar Bulan sebelumnya terlebih dahulu!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oke',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value == true) {
            document.location.href = href;
        }
    })
})