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
    <h1 class="text-center p-5">rekap absen</h1>


    <?php
    $AbsenDosen = "SELECT `absen_dosen`.`code`,`dosen`.`nama` 
    FROM `absen_dosen`,`dosen` 
    WHERE `absen_dosen`.`nrp_dosen`=`dosen`.`nrp` 
    ORDER BY `makul`";
    $dosen = $this->db->query($AbsenDosen)->result_array();
    ?>
    <?php foreach ($dosen as $d) : ?>
        <div class="sidebar-heading pl-3 ">
            Code :(<?= $d['code']; ?>)
            <br />
            Nama Dosen : <?= $d['nama']; ?>
        </div>
        <?php
        $code = $d['code'];
        $AbsenMhs = "SELECT `mhs`.`name`,`absen_mhs`.*, `mhs`.`id_class` 
                FROM `mhs`,`absen_mhs` 
                WHERE `mhs`.`nim`=`absen_mhs`.`nim` 
                AND `code` = '$code'";
        $mhs = $this->db->query($AbsenMhs)->result_array();
        ?>

        <div class="row p-3">
            <table class="table table-hover table p-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nim</th>
                        <th scope="col">nama</th>
                        <th scope="col">prodi</th>
                        <th scope="col">makul</th>
                        <th scope="col">jam</th>
                        <th scope="col">tgl</th>
                        <th scope="col">id_class</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    <?php foreach ($mhs as $a) : ?>

                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $a['nim'] ?></td>
                            <td><?= $a['name'] ?></td>
                            <td><?= $a['prodi'] ?></td>
                            <td><?= $a['makul'] ?></td>
                            <td><?= $a['jam'] ?></td>
                            <td><?= $a['tgl'] ?></td>
                            <td><?= $a['id_class'] ?></td>
                        </tr>
                        <?php $i++ ?>
                        <hr class="sidebar-divider my-0">
                    <?php endforeach; ?>


                </tbody>
            </table>
        </div>
        </div>
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