<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>
            <form action="<?= base_url('menu/sub_menu/ganti_pass'); ?>" method="POST">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="old_pass" id="old_pass">
                        <?= form_error('old_pass', '<small class"text-warning pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="new_pass1" id="new_pass1">
                        <?= form_error('new_pass1', '<small class"text-warning pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Verifikasi Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="new_pass2" id="new_pass2">
                        <?= form_error('new_pass2', '<small class"text-warning pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary col-sm-2">edit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->