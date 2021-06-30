<!DOCTYPE html>
<html>

<head>
    <title>Cetak PDF</title>

    <link href="<?php echo base_url('assets/vendor/bootstrap-4.6.0-dist/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
</head>

<body>
    <h6 class="text-center"><?php echo $keterangan; ?></h6>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">NISN</th>
                <th style="text-align: center;">Nama</th>
                <th style="text-align: center;">Kelas</th>
                <th style="text-align: center;">Pembayaran</th>
                <th style="text-align: center;">Tanggal Bayar</th>
                <th style="text-align: center;">Nominal</th>
                <th style="text-align: center;">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($transaksi)) : ?>
                <?php
                $no = 1;
                foreach ($transaksi as $r) :
                    $date = date('d-m-Y', strtotime($r->payment_date));
                ?>
                    <tr>
                        <th style="text-align: center;"><?php echo $no++; ?></th>
                        <th style="text-align: center;"><?php echo $r->nisn; ?></th>
                        <th style="text-align: center;"><?php echo $r->full_name; ?></th>
                        <th style="text-align: center;"><?php echo $r->class_name; ?> - <?php echo $r->skill_competence; ?></th>
                        <th style="text-align: center;"><?php echo $r->month_paid; ?> Bulan</th>
                        <th style="text-align: center;"><?php echo $date; ?></th>
                        <th style="text-align: center;">Rp. <?php echo number_format($r->amount_paid, 0, ',', '.') ?>,-</th>
                        <th style="text-align: center;">Lunas</th>
                    </tr>
                <?php
                endforeach;
                ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>