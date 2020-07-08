<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>

        <form action="<?= base_url('menu/absen'); ?>" method="POST" class="col-md-12 text-right pb-3">
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Class</a>
        </form>
        <div class=" text-left pb-3">
            <a href="<?= base_url('menu/rekap/semester'); ?>" class="btn btn-warning"><i class="fa fa-file"></i>Rekap Absen<br /> Semester</a>
        </div>
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">id_class</th>
                    <th scope="col">class</th>
                    <th scope="col">thun</th>
                    <th scope="col">jumlah mahasiswa</th>
                    <th scope="col">aksi</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($class as $a) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $a['id'] ?></td>
                        <td><?= $a['name'] ?></td>
                        <td><?= $a['thn'] ?></td>
                        <td><?= $a['jmlh_mhs'] ?></td>
                        <td>
                            <a href="<?= base_url() . 'menu/aksi_btn/edit_class/' . $a['id']; ?>" class="btn btn-warning mb-2">edit</a>
                            <a href="<?= base_url() . 'menu/aksi_btn/hapus_class/' . $a['id']; ?>" class="btn btn-danger mb-2">hapus</a>
                            <a href="<?= base_url() . 'menu/aksi_btn/detai_class/' . $a['id']; ?>" class="btn btn-success ">detail class</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <div class="modal fade-mb-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('menu/sub_menu/class'); ?>" method="POST">

                    <div class="modal-body ">
                        <div class="form-group mb-0">
                            <input type="text" class="form-control" id="name" name="name" placeholder="name">
                        </div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group mb-0">
                            <input type="number" class="form-control" id="thn" name="thn" placeholder="thn">
                        </div>
                    </div>

                    <div class="modal-body mt-0">
                        <div class="form-group mb-0">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="jumlah">
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->