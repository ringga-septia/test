<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <form action="<?= base_url('menu/sub_menu/absen_saya'); ?>" method="POST" class="col-md-12 text-right pb-4">
        <div class="btn-group col-4">
            <select class="btn btn-danger dropdown-toggle dropdown-toggle" type="button" id="keterangan" name="keterangan" aria-haspopup="true" aria-expanded="false" value="<?= set_value('keterangan'); ?>">
                <option value="">semua</option>
                <option value="telat">terlambat</option>
                <option value="masuk">masuk</option>
            </select>
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Cari Absen</button>
        </div>
    </form>

    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nim</th>
                <th scope="col">Prodi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($absen as $a) : ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?= $a['nim'] ?></td>
                    <td><?= $a['prodi'] ?></td>
                    <td><?= $a['tgl'] ?></td>
                    <td><?= $a['jam'] ?></td>
                    <td><?= $a['keterangan'] ?></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->