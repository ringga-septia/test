<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('/assets/style/sb_admin/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('/assets/style/sb_admin/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body style="font-family: 'Times New Roman', Times, serif">
    <h1 class="text-center p-5">Rekap Absen Semester</h1>

    <?php
    $class = $this->db->query("SELECT * FROM `class`")->result_array();
    ?>

    <?php foreach ($class as $c) : ?>
        <div class="sidebar-heading pl-3 ">
            Code :(<?= $c['name']; ?>)
            <br />
            Tahum :(<?= $c['thn']; ?>)
            <br />
            Jumlah Mahasiswa :(<?= $c['jmlh_mhs']; ?>)
        </div>

        <?php
        $id = $c['id'];
        $RekapMhs = $this->db->query("SELECT `mhs`.`name`,`rekap`.* FROM `rekap`,`mhs` WHERE `rekap`.`nim`=`mhs`.`nim` AND `rekap`.`id_class` = $id ORDER BY `rekap`.`nim`")->result_array();
        ?>
        <table class="table table-hover">
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

</body>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('/assets/style/sb_admin/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('/assets/style/sb_admin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('/assets/style/sb_admin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('/assets/style/sb_admin/'); ?>js/sb-admin-2.min.js"></script>

</html>