<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <?= $this->session->flashdata('message'); ?>
                </div>
            </div>

            <?= form_open_multipart(); ?>
            <input type="hidden" name="id" value="<?= $edit['id']; ?>">

            <div class="form-group row pl-8">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="<?= base_url('assets/gambar_profil/') . $edit['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" value="<?= $edit['email']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" value="<?= $edit['name']; ?>">
                    <?= form_error('name', '<small class"text-danger pl-4">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nim</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="nim" id="nim" value="<?= $edit['nim']; ?>">
                    <?= form_error('nim', '<small class"text-danger pl-4">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                    <select type="text" class="form-control" name="prodi" id="prodi">
                        <?php foreach ($jurusan as $j) : ?>
                            <?php if ($j == $edit['prodi']) : ?>
                                <option value="<?= $j; ?>" selected><?= $j; ?></option>
                            <?php else : ?>
                                <option value="<?= $j; ?>"><?= $j; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="pass" id="pass" value="<?= $edit['pass']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Semester</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="semester" id="semester" value="<?= $edit['semester']; ?>">
                    <?= form_error('semester', '<small class"text-danger pl-4">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="thn" id="thn" value="<?= $edit['thn']; ?>">
                    <?= form_error('thn', '<small class"text-danger pl-4">', '</small>'); ?>
                </div>
            </div>


            <div class="form-group row text-lg-right">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-danger">Edit Data</button>
                </div>
            </div>

            </form>


            <!-- End of Main Content -->

        </div>
    </div>
</div>
</div>