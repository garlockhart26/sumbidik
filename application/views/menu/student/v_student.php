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
                                    <th class="text-center">NISN</th>
                                    <th class="text-center">NIS</th>
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($student as $r) :
                                ?>
                                    <tr>
                                        <th class="text-center" width="50px"><?php echo $no++; ?></th>
                                        <th class="text-center"><?php echo $r->nisn; ?></th>
                                        <th class="text-center"><?php echo $r->nis; ?></th>
                                        <th class="text-center"><?php echo $r->full_name; ?></th>
                                        <th class="text-center"><?php echo $r->class_name; ?> - <?php echo $r->skill_competence; ?></th>
                                        <th class="text-center" width="150px">
                                            <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update<?php echo $r->nisn; ?>"><i class="fa fa-edit"></i>&nbsp; Update</a>
                                            <a href="<?php echo base_url('menu/Student/delete/' . $r->student_id); ?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i>&nbsp; Delete</a>
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
    <form method="post" action="<?php echo base_url('menu/Student/create'); ?>" enctype="multipart/form-data">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Create <?php echo $title ?></h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="student_id" name="student_id" class="form-control" value="<?php echo $code ?>">
                    <div class="form-group">
                        <label class="control-label">NISN</label>
                        <input type="text" id="nisn" name="nisn" class="form-control" onkeypress="return hanyaAngka(event)" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">NIS</label>
                        <input type="text" id="nis" name="nis" class="form-control" onkeypress="return hanyaAngka(event)" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nama Lengkap</label>
                        <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Lexianus Razoric" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Kelas</label>
                        <select id="class_id" name="class_id" class="form-control">
                            <?php foreach ($class as $r) : ?>
                                <option value="<?php echo $r->class_id; ?>"><?php echo $r->class_name; ?> - <?php echo $r->skill_competence; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <textarea id="address" name="address" rows="3" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nomor Handphone</label>
                        <input type="text" id="mobile_phone" name="mobile_phone" class="form-control" placeholder="Example : 081234567890" onkeypress="return hanyaAngka(event)" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label">SPP Tahun</label>
                        <select id="spp_id" name="spp_id" class="form-control">
                            <?php foreach ($spp as $r) : ?>
                                <option value="<?php echo $r->spp_id; ?>"><?php echo $r->year; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Foto</label>
                        <input type="file" id="image" name="image" class="dropify" data-height="150" required>
                        <p>Catatan : Format gambar (JPEG, JPG & PNG) dengan ukuran maksimal 500KB</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-success ">Save</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End of Modal Create -->

<!-- Modal Update -->
<?php foreach ($student as $r) : ?>
    <div class="modal fade" id="update<?php echo $r->nisn; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <form method="post" action="<?php echo base_url('menu/Student/update'); ?>" enctype="multipart/form-data">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Update <?php echo $title ?></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="student_id" name="student_id" class="form-control" value="<?php echo $r->student_id ?>">
                        <div class="form-group">
                            <label class="control-label">NISN</label>
                            <input type="text" id="nisn" name="nisn" class="form-control" onkeypress="return hanyaAngka(event)" value="<?php echo $r->nisn ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">NIS</label>
                            <input type="text" id="nis" name="nis" class="form-control" onkeypress="return hanyaAngka(event)" value="<?php echo $r->nis ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nama Lengkap</label>
                            <input type="text" id="full_name" name="full_name" class="form-control" placeholder="Example : Lexianus Razoric" value="<?php echo $r->full_name ?>" equired>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Kelas</label>
                            <select id="class_id" name="class_id" class="form-control">
                                <?php foreach ($class as $_class) : ?>
                                    <?php if ($_class->class_id == $r->class_id) : ?>
                                        <option value="<?php echo $_class->class_id ?>" selected><?php echo $_class->class_name; ?> - <?php echo $_class->skill_competence; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $_class->class_id ?>"><?php echo $_class->class_name; ?> - <?php echo $_class->skill_competence; ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <textarea id="address" name="address" rows="3" class="form-control" required><?php echo $r->address ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Nomor Handphone</label>
                            <input type="text" id="mobile_phone" name="mobile_phone" class="form-control" placeholder="Example : 081234567890" onkeypress="return hanyaAngka(event)" value="<?php echo $r->mobile_phone ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label">SPP Tahun</label>
                            <select id="spp_id" name="spp_id" class="form-control">
                                <?php foreach ($spp as $_spp) : ?>
                                    <?php if ($_spp->spp_id == $r->spp_id) : ?>
                                        <option value="<?php echo $_spp->spp_id ?>" selected><?php echo $_spp->year; ?></option>
                                    <?php else : ?>
                                        <option value="<?php echo $_spp->spp_id ?>"><?php echo $_spp->year; ?></option>
                                    <?php endif ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Foto</label>
                            <input type="file" id="image" name="image" class="dropify" data-height="150" required>
                            <p>Catatan : Format gambar (JPEG, JPG & PNG) dengan ukuran maksimal 500KB</p>
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