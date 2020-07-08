<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?= validation_errors(); ?>
            <?= $this->session->flashdata('message'); ?>

            <form action="<?= base_url('menu/absen/cari_mhs'); ?>" method="get" class="col-md-12 text-right pb-3">
                <div class="btn-group">
                    <a class="btn btn-outline-warning " href="<?= base_url('menu/sub_menu/data_mhs'); ?>" role="button">all</a>
                </div>

                <div class="btn-group">
                    <div class="col-sm">
                        <input type="number" class="form-control " placeholder="Masukkan Tahun Ajaran" name="thn" id="thn" value="<?= set_value('thn'); ?>">
                    </div>
                </div>
                <div class="btn-group">
                    <div class="col-sm">
                        <input type="text" class="form-control " placeholder="Masukkan Nama" name="name" id="name" value="<?= set_value('name'); ?>">
                    </div>
                </div>
                <div class="btn-group">
                    <select class="btn btn-danger dropdown-toggle dropdown-toggle" type="button" id="prodi" name="prodi" aria-haspopup="true" aria-expanded="false" value="<?= set_value('prodi'); ?>">
                        <?php foreach ($jurusan as $j) : ?>
                            <option value="<?= $j; ?>"><?= $j; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="btn-group">
                    <button type="submit" class="btn btn-outline-success">Cari Mahasiswa</button>
                </div>
            </form>
            <table class="table table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Prodi</th>
                        <th scope="col">Tahun Ajaran</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $m) : ?>
                        <tr>
                            <th><?= $i; ?></th>
                            <td>
                                <img src="<?= base_url('assets/gambar_profil/') . $m['image']; ?>" class="img-thumbnail" width="100px">
                            </td>
                            <td><?= $m['email'] ?></td>
                            <td><?= $m['name'] ?></td>
                            <td><?= $m['semester'] ?></td>
                            <td><?= $m['prodi'] ?></td>
                            <td><?= $m['thn'] ?></td>
                            <td>
                                <a href="<?= base_url() . 'menu/aksi_btn/edit/' . $m['id']; ?>" class="btn btn-warning mb-2">edit</a>
                                <a href="<?= base_url() . 'menu/aksi_btn/hapus/' . $m['id']; ?>" class="btn btn-danger mb-2">hapus</a>
                                <a href="<?= base_url() . 'menu/aksi_btn/detai_user/' . $m['id']; ?>" class="btn btn-success ">detail user</a>
                            </td>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
</div>
<!-- End of Main Content -->