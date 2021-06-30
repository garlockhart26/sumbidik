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
                        <?php echo $this->session->flashdata('create'); ?>
                        <?php echo $this->session->flashdata('update'); ?>
                        <?php echo $this->session->flashdata('delete'); ?>
                    </div>
                <?php elseif (($this->session->flashdata('failed'))) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('failed'); ?>
                    </div>
                <?php endif ?>

                <div class="box box-primary">
                    <div class="box-header">
                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create"><i class="fa fa-plus"></i>&nbsp; Create</a>
                    </div>

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Profile</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Username</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($users as $r) :
                                ?>
                                    <tr>
                                        <th class="text-center" width="50px"><?php echo $no++; ?></th>
                                        <th class="text-center"><img src="<?php echo base_url($r->image_files); ?>" class="img-circle" alt="User Image" width="40"></th>
                                        <th class="text-center"><?php echo $r->full_name; ?></th>
                                        <th class="text-center"><?php echo $r->username; ?></th>
                                        <th class="text-center"><?php echo $r->name_role; ?></th>
                                        <th class="text-center">
                                            <?php if ($r->is_active == 'Y') : ?>
                                                <span class="label label-success">Active</span>
                                            <?php else : ?>
                                                <span class="label label-danger">Non Active</span>
                                            <?php endif ?>
                                        </th>
                                        <th class="text-center" width="375px">
                                            <?php if ($r->role_id == '1') : ?>
                                               -
                                            <?php else : ?>
                                                <?php if ($r->is_active == 'Y') : ?>
                                                    <a href="<?php echo base_url('menu/User/update_is_active/') . $r->user_id . '/' . $r->is_active ?>" class="btn btn-sm btn-danger is-non-active">Non Active</a>
                                                <?php else : ?>
                                                    <a href="<?php echo base_url('menu/User/update_is_active/') . $r->user_id . '/' . $r->is_active ?>" class="btn btn-sm btn-success is-active">Active</a>
                                                <?php endif ?>
                                                <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update<?php echo $r->user_id; ?>"><i class="fa fa-edit"></i>&nbsp; Update</a>
                                                <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#update_password<?php echo $r->user_id; ?>"><i class="fa fa-key"></i>&nbsp; Update Password</a>
                                                <a href="<?php echo base_url('menu/User/delete/' . $r->user_id); ?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i>&nbsp; Delete</a>
                                                <?php endif ?>
                                        </th>
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

<!-- Modal Create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <form method="post" action="<?php echo base_url('menu/User/create'); ?>" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Create <?php echo $title ?></h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="user_id" name="user_id" class="form-control" value="<?php echo $code; ?>">

                    <div class="form-group">
                        <label class="control-label">Nama Lengkap</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Example : Lexianus Razoric" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Exanple : lexianus26" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Role</label>
                        <select id="role_id" name="role_id" class="form-control">
                            <?php foreach ($role as $c) : ?>
                                <option value="<?php echo $c->role_id  ?>"><?php echo $c->name_role; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Profile Petugas</label>
                        <input type="file" id="image" name="image" class="dropify" data-height="150" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End of Modal Create -->

<!-- Modal Update -->
<?php foreach ($users as $r) : ?>
    <div class="modal fade" id="update<?php echo $r->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <form method="post" action="<?php echo base_url('menu/User/update'); ?>">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Update <?php echo $title ?></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="user_id" class="form-control" value="<?php echo $r->user_id; ?>">

                        <div class="form-group">
                            <label class="control-label">Nama Lengkap</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" value="<?php echo $r->full_name; ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" value="<?php echo $r->username; ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Role</label>
                            <select id="role_id" name="role_id" class="form-control">
                                <?php foreach ($role as $r_role) : ?>
                                    <?php if ($r_role->role_id == $r->role_id) : ?>
                                        <option value="<?php echo $r_role->role_id ?>" selected><?php echo $r_role->name_role; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $r_role->role_id ?>"><?php echo $r_role->name_role; ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php endforeach; ?>
<!-- End of Modal Update -->

<!-- Modal Update Password -->
<?php foreach ($users as $r) : ?>
    <div class="modal fade" id="update_password<?php echo $r->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <form method="post" action="<?php echo base_url('menu/User/update_password'); ?>">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Update Password <?php echo $title ?></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $r->user_id; ?>">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Repeat Password</label>
                            <input type="password" id="repeat_password" name="repeat_password" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php endforeach; ?>
<!-- End of Modal Update Password -->

<?php $this->load->view('layout/v_footer'); ?>