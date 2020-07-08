<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('menu/sub_menu') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">profile<sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- query menu -->
    <?php
    $role_id = $this->session->userdata('role_id');

    $queryMenu = "SELECT `user_menu`.`id`, `menu` 
    FROM `user_menu` 
    JOIN `user_akses_menu` 
    ON `user_menu`.`id` = `user_akses_menu`.`menu_id` 
    WHERE `user_akses_menu`.`role_id` = 1 
    ORDER BY `user_akses_menu`.`menu_id` 
    ASC";
    $menu = $this->db->query($queryMenu)->result_array();


    ?>

    <!-- loping menu-->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading ">
            <?= $m['menu']; ?>
        </div>
        <!-- siapkan sub menu -->
        <?php
        $menuid = $m['id'];
        $querySubMenu = "SELECT *
            FROM `user_sub_menu` JOIN `user_menu` 
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
           WHERE `user_sub_menu`.`menu_id` = $menuid 
           AND `user_sub_menu`.`is_aktif` = 1
            ";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link my-0 pb-0 " href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title']; ?></span></a>
            </li>

        <?php endforeach; ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
    <?php endforeach; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline my-2">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->