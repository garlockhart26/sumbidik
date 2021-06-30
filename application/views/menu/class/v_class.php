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
                                    <th class="text-center">Kode Kelas</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Kompetensi Keahlian</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($class as $r) :
                                ?>
                                    <tr>
                                        <th class="text-center" width="50px"><?php echo $no++; ?></th>
                                        <th class="text-center"><?php echo $r->class_id; ?></th>
                                        <th class="text-center"><?php echo $r->class_name; ?></th>
                                        <th class="text-center"><?php echo $r->skill_competence; ?></th>
                                        <th class="text-center" width="150px">
                                            <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update<?php echo $r->class_id; ?>"><i class="fa fa-edit"></i>&nbsp; Update</a>
                                            <a href="<?php echo base_url('menu/Classs/delete/' . $r->class_id); ?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i>&nbsp; Delete</a>
                                        </th>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
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
    <form method="post" action="<?php echo base_url('menu/Classs/create'); ?>">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Create <?php echo $title ?></h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="class_id" class="col-form-label">Kode Kelas</label>
                        <input type="text" id="class_id" name="class_id" class="form-control" value="<?php echo $code ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="class_name" class="col-form-label">Kelas</label>
                        <select id="class_name" name="class_name" class="form-control">
                            <option>X</option>
                            <option>XI</option>
                            <option>XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="skill_competence" class="col-form-label">Kompetensi Keahlian</label>
                        <input type="text" id="skill_competence" name="skill_competence" class="form-control" placeholder="Example : Rekayasa Perangkat Lunak" required>
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
<?php foreach ($class as $r) : ?>
    <div class="modal fade" id="update<?php echo $r->class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <form method="post" action="<?php echo base_url('menu/Classs/update'); ?>">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Update <?php echo $title ?></h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="class_id" class="col-form-label">Kode Kelas</label>
                            <input type="text" id="class_id" name="class_id" class="form-control" value="<?php echo $r->class_id ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="class_name" class="col-form-label">Kelas</label>
                            <select id="class_name" name="class_name" class="form-control">
                                <?php if ($r->class_name == 'X') : ?>
                                    <option value="X" selected>X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII">XII</option>
                                <?php elseif ($r->class_name == 'XI') : ?>
                                    <option value="X">X</option>
                                    <option value="XI" selected>XI</option>
                                    <option value="XII">XII</option>
                                <?php else : ?>
                                    <option value="X">X</option>
                                    <option value="XI">XI</option>
                                    <option value="XII" selected>XII</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="skill_competence" class="col-form-label">Kompetensi Keahlian</label>
                            <input type="text" id="skill_competence" name="skill_competence" class="form-control" placeholder="Example : Rekayasa Perangkat Lunak" value="<?php echo $r->skill_competence ?>" required>
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

<?php $this->load->view('layout/v_footer'); ?>