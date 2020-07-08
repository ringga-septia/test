<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <form action="<?= base_url('menu/absen'); ?>" method="POST" class="col-md-12 text-right pb-4">
        <div class="btn-group row">
            <label for="email" class="col-form-label">nim</label>
            <div class="col-sm">
                <input type="text" class="form-control" name="nim" id="nim" value="<?= set_value('nim'); ?>">
            </div>
        </div>

        <div class="btn-group">
            <select class="btn btn-danger dropdown-toggle dropdown-toggle-split" type="button" id="prodi" name="prodi" aria-haspopup="true" aria-expanded="false">
                <option value="">Prodi</option>
                <option value="Tif">teknik informatika</option>
                <option value="tps">Teknik pengolahan sawit</option>
                <option value="ppm">Perbaikan & perawatan Mesin</option>

            </select>
        </div>
        <div class="btn-group">
            <select class="btn btn-danger dropdown-toggle dropdown-toggle-split" type="button" id="keterangan" name="keterangan" aria-haspopup="true" aria-expanded="false">
                <option value="">Status</option>
                <option value="telat">terlambat</option>
                <option value="masuk">masuk</option>
            </select>
        </div>

        <div class="btn-group">
            <input type="date" name="tgl" max="3000-12-31" min="1000-01-01" class="btn btn-success" placeholder="tanggal">
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-success">edit</button>
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
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->