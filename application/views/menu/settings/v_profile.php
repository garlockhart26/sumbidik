<?php $this->load->view('layout/v_header'); ?>
<?php $this->load->view('layout/v_topbar'); ?>
<?php $this->load->view('layout/v_sidebar'); ?>

<?php
$where = array(
    'role_id' => $this->session->userdata('role_id'),
);

$session = $this->db->get_where('user', $where)->row();
?>


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
                    <form method="post" action="<?php echo base_url('menu/SettingsProfile') ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-7">
                                    <div class="form-group">
                                        <label for="class_id" class="col-form-label">Kode Petugas*</label>
                                        <input type="text" class="form-control" value="<?php echo $session->user_id; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_id" class="col-form-label">Nama Lengkap*</label>
                                        <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo $session->full_name; ?>">
                                        <?php echo form_error('full_name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_id" class="col-form-label">Username*</label>
                                        <input type="text" id="username" name="username" class="form-control" value="<?php echo $session->username; ?>">
                                        <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-xs-5">
                                    <div class="row">
                                        <div class="col-xs-3"></div>
                                        <div class="col-xs-6">
                                            <img src="<?php echo base_url(); ?><?php echo $session->image_files; ?>" width="200" height="200" class="img-thumbnail rounded-pill">
                                        </div>
                                        <div class="col-xs-3"></div>
                                    </div>

                                    <p class="text-center"><b>Foto Profil (1x1)*</b></p>
                                    <p class="text-center">Format gambar (jpeg dan jpg) dengan ukuran maksimal 500KB.</p>
                                    <input type="file" id="image" name="image" class="form-control">
                                </div>
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