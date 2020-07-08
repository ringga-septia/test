<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <form action="<?= base_url('menu/absen'); ?>" method="POST" class="col-md-12 text-right pb-4">
        <div class="btn-group">
            <a class="btn btn-outline-warning " href="<?= base_url('menu/sub_menu/absen_mhs'); ?>" role="button">all</a>
        </div>

        <div class="btn-group">
            <div class="col-sm">
                <input type="number" class="form-control " placeholder="Masukkan NIM" name="nim" id="nim" value="<?= set_value('nim'); ?>">
            </div>
        </div>


        <div class="btn-group">
            <input type="date" name="tgl" max="3000-12-31" min="1000-01-01" class="btn btn-danger" placeholder="tanggal" value="<?= set_value('tgl'); ?>">
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-outline-success">Cari Absen</button>
        </div>

    </form>


    <div class="row">
        <table class="table table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nim</th>
                    <th scope="col">prodi</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">jam</th>
                    <th scope="col">keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($absen as $a) : ?>

                    <tr>
                        <th scope="row"><?= $i; ?></th>
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->