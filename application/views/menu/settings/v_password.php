<?php $this->load->view('layout/v_header'); ?>
<?php $this->load->view('layout/v_topbar'); ?>
<?php $this->load->view('layout/v_sidebar'); ?>

<div class="content-wrapper">
    <section class="content-header">
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php if (($this->session->flashdata('update'))) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fa fa-check"></i>
                        <?php echo $this->session->flashdata('update'); ?>
                    </div>
                <?php elseif (($this->session->flashdata('error'))) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif ?>

                <div class="box box-primary">
                    <form method="post" action="<?php echo base_url('menu/SettingsPassword') ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label class="col-form-label">Password Lama</label>
                                <input type="password" id="old_password" name="old_password" placeholder="Password Lama" class="form-control">
                                <?php echo form_error('old_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="col-form-label">Password Baru</label>
                                <input type="password" id="new_password" name="new_password" placeholder="Password Baru" class="form-control">
                                <?php echo form_error('new_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" id="repeat_password" name="repeat_password" placeholder="Konfirmasi Password" class="form-control">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('layout/v_footer'); ?>