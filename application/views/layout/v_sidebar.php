<!-- Ambil data dari database supaya tidak crash saat session ganda -->
<?php
$where = array(
    'role_id' => $this->session->userdata('role_id'),
);

$session = $this->db->get_where('user', $where)->row();
?>


<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <?php
            $role_id = $session->role_id;
            $queryMenu = "SELECT menu.menu_id, name_menu
                    FROM menu
                    JOIN user_access
                    ON menu.menu_id = user_access.menu_id
                    WHERE user_access.role_id = $role_id
                    ORDER BY user_access.menu_id ASC
                ";
            $menu = $this->db->query($queryMenu)->result_array();

            ?>

            <?php foreach ($menu as $m) : ?>
                <li class="header">
                    <?php echo $m['name_menu'] ?>
                </li>

                <!-- Siapkan Sub Menu sesuai Menu -->
                <?php
                $menuId = $m['menu_id'];
                $querySubMenu = "SELECT *
                    FROM sub_menu
                    JOIN menu
                    ON  sub_menu.menu_id = menu.menu_id
                    WHERE sub_menu.menu_id = $menuId
                    AND sub_menu.is_active = 1
                    ";

                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php foreach ($subMenu as $sm) : ?>
                    <li>
                        <a href="<?php echo base_url($sm['url']); ?>">
                            <i class="<?php echo $sm['icon']; ?>"></i> <span><?php echo $sm['title']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>

            <?php endforeach; ?>
        </ul>
    </section>
</aside>