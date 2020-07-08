<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <form action="<?= base_url('menu/rekap/makul'); ?>" method="POST" class="col-md-12 text-right pb-3">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Mata Kuliah</a>
            </form>
            <table class="table table-hover text-md-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">mata kuliah</th>
                        <th scope="col">prodi</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($makul as $d) : ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td><?= $d['mata_kuliah'] ?></td>
                            <td><?= $d['prodi'] ?></td>
                            <td>
                                <a href="<?= base_url() . 'menu/aksi_btn/edit_makul/' . $d['id']; ?>" class="btn btn-warning mb-2">edit</a>
                                <a href="<?= base_url() . 'menu/aksi_btn/hapus_makul/' . $d['id']; ?>" class="btn btn-danger mb-2">hapus</a>
                            </td>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <!-- Modal -->
    <div class="modal fade-mb-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('menu/rekap/makul'); ?>" method="POST">

                    <div class="modal-body ">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="makul" name="makul" placeholder="mata kuliah">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <select type="text" class="form-control" name="prodi" id="prodi">
                                <?php foreach ($jurusan as $j) : ?>
                                    <option value="<?= $j; ?>"><?= $j; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>