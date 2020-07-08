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
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Mata Kuliah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="mata_kuliah" id="mata_kuliah" value="<?= $edit['mata_kuliah']; ?>">
                    <?= form_error('makul', '<small class"text-danger pl-4">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Prodi</label>
                <div class="col-sm-10">
                    <select type="text" class="form-control" name="prodi" id="prodi">
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?= $j; ?>"><?= $j; ?></option>
                        <?php endforeach; ?>
                    </select>
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