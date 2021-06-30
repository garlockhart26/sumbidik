<?php $this->load->view('layout/v_header'); ?>
<?php $this->load->view('layout/v_topbar'); ?>
<?php $this->load->view('layout/v_sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">

    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if (($this->session->flashdata('create')) or ($this->session->flashdata('update')) or ($this->session->flashdata('delete'))) : ?>

                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-check"></i>
                        <?php echo $this->session->flashdata('create'); ?>
                        <?php echo $this->session->flashdata('update'); ?>
                        <?php echo $this->session->flashdata('delete'); ?>
                    </div>

                <?php endif ?>

                <?php foreach ($months as $c) : ?><?php endforeach; ?>

                <div class="box box-primary">
                    <div class="box-header">
                        <?php foreach ($student as $a) : ?>
                            <div class="col-sm-2">
                                <img src="<?php echo base_url(); ?><?php echo $a->image_files; ?>" width="150" height="150" class="img-thumbnail rounded-pill">
                            </div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>NISN</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: <?php echo $a->nisn ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>NIS</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: <?php echo $a->nis ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Nama</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: <?php echo $a->full_name ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Kelas</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: <?php echo $a->class_name ?> - <?php echo $a->skill_competence ?></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Alamat</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: <?php echo $a->address ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Nomor Telpon</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: <?php echo $a->mobile_phone ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Tahun Pelajaran</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: <?php echo $a->year ?>/<?php echo $a->year + 1 ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Total Tunggakan</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: Rp. <?php echo number_format($a->total, 0, ',', '.') ?>,-</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p>Sisa Tunggakan</p>
                                    </div>
                                    <div class="col-sm-10">
                                        <p>: Rp. <?php echo number_format(($a->total / 12) * (12 - $c->total_month), 0, ',', '.'); ?>,-</p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>


                    <div class="box-body">
                        <table id="#example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td style="text-align: center;">No</td>
                                    <td style="text-align: center;">Bulan</td>
                                    <td style="text-align: center;">Tahun</td>
                                    <td style="text-align: center;">Nominal</td>
                                    <td style="text-align: center;">Keterangan</td>
                                    <td style="text-align: center;">Opsi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($month as $d) :
                                ?>
                                    <tr align="center">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d->month ?></td>
                                        <td>
                                            <?php
                                            if ($d->month_id <= 6) : ?>
                                                <?php echo $a->year; ?>
                                            <?php elseif ($d->month_id > 6) : ?>
                                                <?php echo $a->year + 1 ?>
                                            <?php endif; ?>
                                        </td>
                                        <td>Rp. <?php echo number_format($a->nominal, 0, ',', '.') ?>,-</td>
                                        <td>
                                            <?php
                                            if ($d->month_id <= $c->total_month) : ?>
                                                Lunas
                                            <?php elseif ($d->month_id > $c->total_month) : ?>
                                                Belum Lunas
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($d->month_id <= $c->total_month) : ?>
                                                -
                                            <?php elseif ($d->month_id == $c->total_month + 1) : ?>
                                                <a href="<?php echo base_url('menu/Transaction/action?nisn=' . $a->nisn . ''); ?>" class="btn btn-primary payment">Bayar</a>
                                            <?php elseif ($d->month_id > $c->total_month + 1) : ?>
                                                <a href="#" class="btn btn-primary warning-payment">Bayar</a>
                                            <?php endif ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('layout/v_footer'); ?>