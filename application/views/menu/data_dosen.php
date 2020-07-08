<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <form action="<?= base_url('menu/absen'); ?>" method="POST" class="col-md-12 text-right pb-3">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New User</a>
                <div class="btn-group ">
                    <a class="btn btn-outline-warning " href="<?= base_url('menu/absen/cari_mhs'); ?>" role="button">Cari Mahasiswa</a>
                </div>
            </form>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama</th>
                        <th scope="col">nidn</th>
                        <th scope="col">nrp</th>
                        <th scope="col">jabatan</th>
                        <th scope="col">aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($dosen as $d) : ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td>
                                <img src="<?= base_url('assets/gambar_profil/') . $d['image']; ?>" class="img-thumbnail" width="100px">
                            </td>
                            <td><?= $d['email'] ?></td>
                            <td><?= $d['nama'] ?></td>
                            <td><?= $d['nidn'] ?></td>
                            <td><?= $d['nrp'] ?></td>
                            <td><?= $d['jabatan'] ?></td>
                            <td>
                                <a href="<?= base_url() . 'menu/aksi_btn/edit_dosen/' . $d['id']; ?>" class="btn btn-warning mb-2">edit</a>
                                <a href="<?= base_url() . 'menu/aksi_btn/hapus_dosen/' . $d['id']; ?>" class="btn btn-danger mb-2">hapus</a>
                                <a href="<?= base_url() . 'menu/aksi_btn/detai_dosen/' . $d['id']; ?>" class="btn btn-success ">detail user</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Dosen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('menu/sub_menu/data_dosen'); ?>" method="POST">

                    <div class="modal-body ">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="nama">
                        </div>
                    </div>
                    <div class="modal-body ">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="email" name="email" placeholder="email">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-0">
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="pass">
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="nidn" name="nidn" placeholder="nidn">
                        </div>
                    </div>
                    <div class="modal-body mt-0">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="nrp" name="nrp" placeholder="nrp">
                        </div>
                    </div>
                    <div class="modal-body mt-0">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="jabatan">
                        </div>
                    </div>
                    <div class="modal-body mt-0">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
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