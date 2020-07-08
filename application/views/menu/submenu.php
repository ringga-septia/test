<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= validation_errors(); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg">

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#submenu">Add sub Menu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">menu</th>
                        <th scope="col">title</th>
                        <th scope="col">url</th>
                        <th scope="col">icon</th>
                        <th scope="col">aktif</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $sm['title'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td><?= $sm['is_aktif'] ?></td>
                            <td>
                                <a href="" class="badge badge-danger">edit</a>
                                <a href="" class="badge badge-success">delete</a>
                            </td>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="submenu" tabindex="-1" role="dialog" aria-labelledby="submenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submenu">Add sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('data/menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="Title" name="title" placeholder="title">
                    </div>

                    <div class="from-group mb-3">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">select menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="url">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="icon">
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input checked type="checkbox" aria-label="Checkbox for following text input" value="1" name="is_aktif" id="is_aktif">
                            <label for="is_aktif" class="from-check-label">Aktif !!</label>
                        </div>
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
<!-- End of Main Content -->