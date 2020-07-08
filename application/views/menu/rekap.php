<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
        <div class="col-lg">
            <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <form action="<?= base_url('menu/rekap/semester'); ?>" method="POST" class="col-md-12 text-right pb-3">
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Data Tabel Rekap</a>
            </form>

            <?php
            $class = $this->db->query("SELECT * FROM `class`")->result_array();
            ?>

            <?php foreach ($class as $c) : ?>
                <div class="sidebar-heading pl-4 text-dark">
                    Code :(<?= $c['name']; ?>)
                    <br />
                    Tahun :(<?= $c['thn']; ?>)
                    <br />
                    Jumlah Mahasiswa :(<?= $c['jmlh_mhs']; ?>)
                </div>

                <?php
                $id = $c['id'];
                $RekapMhs = $this->db->query("SELECT `mhs`.`name`,`rekap`.* FROM `rekap`,`mhs` WHERE `rekap`.`nim`=`mhs`.`nim` AND `rekap`.`id_class` = $id ORDER BY `rekap`.`nim`")->result_array();
                ?>

                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Nim</th>
                            <th scope="col">Izin</th>
                            <th scope="col">Hadir</th>
                            <th scope="col">Tidak Hadir</th>
                            <th scope="col">Id class</th>
                            <th scope="col">Mata kululiah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($RekapMhs as $d) : ?>
                            <tr>
                                <th><?= $i; ?></th>
                                <td><?= $d['name'] ?></td>
                                <td><?= $d['nim'] ?></td>
                                <td><?= $d['i'] ?></td>
                                <td><?= $d['h'] ?></td>
                                <td><?= $d['pertemuan'] ?></td>
                                <td><?= $d['id_class'] ?></td>
                                <td><?= $d['makul'] ?></td>

                                <?php $i++ ?>
                            <?php endforeach; ?>
                            </tr>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- End of Main Content -->
    <!-- Modal -->
    <div class="modal fade-mb-0" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('menu/sub_menu/isi_pertemuan'); ?>" method="POST">

                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <select type="text" class="form-control" name="class" id="class">
                                <?php foreach ($class as $j) : ?>
                                    <option value="<?= $j['id']; ?>"><?= $j['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <select type="text" class="form-control" name="makul" id="makul">
                                <?php foreach ($makul as $m) : ?>
                                    <option value="<?= $m['mata_kuliah']; ?>"><?= $m['mata_kuliah']; ?>, Prodi : <?= $m['prodi']; ?> </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-body mt-0">
                        <div class="form-group mb-0">
                            <input type="number" class="form-control" id="pertemuan" name="pertemuan" placeholder="pertemuan">
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