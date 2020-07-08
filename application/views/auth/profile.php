<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card mb-8" style="max-width: 1000px;">
        <div class="row no-gutters">
            <div class="col-md-6">
                <img src="<?= base_url('assets/gambar_profil/') . $user['image']; ?>" class="card-img">
            </div>
            <div class="col-md-6 ">
                <div class="card-body">
                    <h5 class="card-title">Name : <?= $user['name']; ?></h5>
                    <p class="card-text">Email :<?= $user['email']; ?></p>
                    <p class="card-text">Akses Sebagai :<?= $user['akses']; ?></p>

                    <!-- <small class="card-text"><small class="text-muted">member since </small></p> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->