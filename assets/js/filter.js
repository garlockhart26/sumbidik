$(document).ready(function() { // Ketika halaman selesai di load
    $('.input-tanggal').datepicker({
        dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
    });

    $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

    $('#filter').change(function() { // Ketika user memilih filter
        if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
            $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
            $('#form-tanggal').show(); // Tampilkan form tanggal
        } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
            $('#form-tanggal').hide(); // Sembunyikan form tanggal
            $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
        } else { // Jika filternya 3 (per tahun)
            $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
            $('#form-tahun').show(); // Tampilkan form tahun
        }

        $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
    })
})