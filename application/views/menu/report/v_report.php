<?php $this->load->view('layout/v_header'); ?>
<?php $this->load->view('layout/v_topbar'); ?>
<?php $this->load->view('layout/v_sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="pull-right">
                            <b><?php echo $keterangan; ?></b>
                        </div>
                    </div>
                    <div class="box-body">
                        <form method="get" action="">
                            <div class="row form-group">
                                <label class="col-sm-3 control-label">Filter Berdasarkan</label>
                                <div class="col-sm-9">
                                    <select name="filter" id="filter" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="1">Per Tanggal</option>
                                        <option value="2">Per Bulan</option>
                                        <option value="3">Per Tahun</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group" id="form-tanggal">
                                <label class="col-sm-3 control-label">Tanggal</label>
                                <div class="col-sm-9">
                                    <input type="date" name="tanggal" class="form-control">
                                </div>
                            </div>

                            <div class="row form-group" id="form-bulan">
                                <label class="col-sm-3 control-label">Bulan</label>
                                <div class="col-sm-9">
                                    <select name="bulan" class="form-control">
                                        <option value="">Pilih</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group" id="form-tahun">
                                <label class="col-sm-3 control-label">Tahun</label>
                                <div class="col-sm-9">
                                    <select name="tahun" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php
                                        foreach ($option_year as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                            echo '<option value="' . $data->year . '">' . $data->year . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="pull-right">
                                <button type="submit" class="btn btn-sm btn-primary">Tampilkan</button>
                                <a href="<?php echo base_url('menu/Report'); ?>" class="btn btn-sm btn-danger">Reset Filter</a>
                            </div>
                        </form>


                        <br />
                        <hr />
                        <a href="<?php echo $url_cetak; ?>" class="btn btn-sm btn-primary">
                            <i class="fa fa-download"></i> Generate PDF
                        </a>

                        <!-- <a href="<?php echo $url_cetak; ?>">CETAK PDF</a><br /><br /> -->



                        <table id="example2" class="table table-bordered table-striped">
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
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<?php $this->load->view('layout/v_footer'); ?>