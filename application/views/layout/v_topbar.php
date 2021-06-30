<!-- Ambil data dari database supaya tidak crash saat session ganda -->
<?php
$where = array(
    'role_id' => $this->session->userdata('role_id'),
);

$session = $this->db->get_where('user', $where)->row();
?>

<div class="wrapper">

    <header class="main-header">
        <a href="" class="logo">
            <span class="logo-lg"><b>SPP</b></span>
        </a>

        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url(); ?><?php echo $session->image_files; ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?php echo $session->full_name; ?></span>
                        </a>
                        <ul class="dropdown-menu">

                            <li class="user-header">
                                <img src="<?php echo base_url(); ?><?php echo $session->image_files; ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $session->full_name; ?>
                                    <small><?php echo $session->user_id; ?></small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url('menu/settings') ?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url('auth/auth_user/logout') ?>" class="btn btn-default btn-flat logout">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>