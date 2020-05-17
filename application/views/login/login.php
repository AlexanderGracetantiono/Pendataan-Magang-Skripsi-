<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('bootstrap/ico/favicon.ico'); ?>">
    <title><?php echo $this->lang->line('title_login'); ?></title>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('bootstrap/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('bootstrap/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('bootstrap/css/sb-admin.css'); ?>" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="mx-auto mt-4">
                <img src=" <?php echo base_url('res/logo_ksb.png'); ?>" width="200">
            </div>
            <div class="card-body">
                <?php if (isset($login_fail)) : ?>
                    <div class="alert alert-danger"><?php echo $fail_text; ?></div>
                <?php endif; ?>
                <?php echo validation_errors(); ?>
                <?php echo form_open('login/', 'role="form"'); ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Induk</label>
                    <input class="form-control" name="id" type="id" aria-describedby="emailHelp" placeholder="Masukan NIM/NIK">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" name="password" type="password" placeholder="Masukan Password">
                </div>
                <button class="btn btn-primary btn-block" type="submit">Login</button>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('bootstrap/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('bootstrap/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
</body>

</html>