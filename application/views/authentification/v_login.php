<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $title; ?></title>
    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/plugins/iCheck/square/blue.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <p><b>SPP</b></p>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>
            <?php echo $this->session->flashdata('message') ?>

            <form action="<?php echo base_url('Authentification'); ?>" method="post">
                <div class="form-group has-feedback">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?php echo form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php echo form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
                </div>
            </form>
        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url('assets/'); ?>vendor/AdminLTE-2.4.13/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%'
            });
        });
    </script>
</body>

</html>