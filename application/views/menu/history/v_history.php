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

                <div class="box box-primary">
                    <div class="box-header">

                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td style="text-align: center;">No</td>
                                    <td style="text-align: center;">NISN</td>
                                    <td style="text-align: center;">NIS</td>
                                    <td style="text-align: center;">Nama</td>
                                    <td style="text-align: center;">Kelas</td>
                                    <td style="text-align: center;">Total Tunggakan</td>
                                    <td style="text-align: center;">Sisa Tunggakan</td>
                                    <td style="text-align: center;">Keterangan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($transactions as $r) :
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo $no++ ?></td>
                                        <td style="text-align: center;"><?php echo $r->nisn ?></td>
                                        <td style="text-align: center;"><?php echo $r->nis ?></td>
                                        <td style="text-align: center;"><?php echo $r->full_name ?></td>
                                        <td style="text-align: center;"><?php echo $r->class_name ?> - <?php echo $r->skill_competence ?></td>
                                        <td style="text-align: center;">Rp. <?php echo number_format($r->total, 0, ',', '.') ?>,-</td>
                                        <td style="text-align: center;">
                                            Rp. <?php
                                            if ($r->total_month < 1) {
                                                echo "0";
                                            } elseif ($r->total_month >= 1) {
                                                echo number_format(($r->total / 12) * (12 - $r->total_month), 0, ',', '.');
                                            }
                                            ?>,-

                                        </td>
                                        <td style="text-align: center;">
                                            <?php
                                            if ($r->total_month == 12) {
                                                echo "<mark>Lunas</mark>";
                                            } elseif ($r->total_month < 12) {
                                                echo "Belum Lunas";
                                            } else {
                                                echo "-";
                                            }
                                            ?>
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