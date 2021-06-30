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
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Nominal</th>
                                    <th class="text-center">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($spp as $r) :
                                ?>
                                    <tr>
                                        <th class="text-center"  width="50px"><?php echo $no++; ?></th>
                                        <th class="text-center" ><?php echo $r->year; ?></th>
                                        <th class="text-center" >Rp. <?php echo number_format($r->nominal, 0, ',', '.') ?>,-</th>
                                        <th class="text-center" width="150px">
                                            <a href="" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#update<?php echo $r->spp_id; ?>"><i class="fa fa-edit"></i>&nbsp; Update</a>
                                            <a href="<?php echo base_url('menu/SPP/delete/' . $r->spp_id); ?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i>&nbsp; Delete</a>
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
    <form method="post" action="<?php echo base_url('menu/SPP/create'); ?>">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold">Create <?php echo $title; ?></h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="year" class="col-form-label">Tahun</label>
                        <input type="text" id="year" name="year" class="form-control" placeholder="Example : 2021" onkeypress="return hanyaAngka(event)" required>
                    </div>
                    <div class="form-group">
                        <label for="nominal" class="col-form-label">Nominal</label>
                        <input type="text" id="nominal" name="nominal" class="form-control" placeholder="Example : 150000" onkeypress="return hanyaAngka(event)" required>
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
<?php foreach ($spp as $r) : ?>
    <div class="modal fade" id="update<?php echo $r->spp_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <form method="post" action="<?php echo base_url('menu/SPP/update'); ?>">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title font-weight-bold">Update <?php echo $title; ?></h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="spp_id" name="spp_id" value="<?php echo $r->spp_id ?>">
                        <div class="form-group">
                            <label for="year" class="col-form-label">Tahun</label>
                            <input type="text" id="year" name="year" class="form-control" placeholder="Example : 2021" onkeypress="return hanyaAngka(event)" value="<?php echo $r->year ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nominal" class="col-form-label">Nominal</label>
                            <input type="text" id="nominal" name="nominal" class="form-control" placeholder="Example : 150000" onkeypress="return hanyaAngka(event)" value="<?php echo $r->nominal ?>" required>
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