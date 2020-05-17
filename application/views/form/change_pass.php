<body class="bg-dark">
    <div class="content-wrapper">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Ubah Password</div>
            <div class="card-body">
                <?php if (isset($login_fail)) : ?>
                    <div class="alert alert-danger"><?php echo $fail_text; ?></div>
                <?php endif; ?>
                <?php echo validation_errors(); ?>
                <?php echo form_open('profile/c/pass', 'role="form"'); ?>

                <div class="form-group">
                    <label for="exampleInputName">Password Lama</label>
                    <input class="form-control" name="opass" type="text" aria-describedby="nameHelp" placeholder="Masukan Password Lama">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Password Baru</label>
                    <input class="form-control" name="npass" type="text" aria-describedby="nameHelp" placeholder="Masukan Password Baru">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Konfirmasi Password Baru</label>
                    <input class="form-control" name="cpass" type="text" aria-describedby="nameHelp" placeholder="Masukan Konfirmasi Password Baru">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>