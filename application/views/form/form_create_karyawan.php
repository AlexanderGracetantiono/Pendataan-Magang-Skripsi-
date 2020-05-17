<body class="bg-dark">
    <div class="content-wrapper">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Form Pembuatan Akun Karyawan</div>
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('create/karyawan/', 'role="form"'); ?>

                <div class="form-group">
                    <label for="exampleInputName">Nama Karyawan</label>
                    <input class="form-control" name="nama" type="text" aria-describedby="nameHelp" placeholder="Masukan Nama Karyawan">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">NIK</label>
                    <input class="form-control" name="nik" type="text" aria-describedby="nameHelp" placeholder="Masukan NIK Karyawan">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Status</label>
                    <select name="status" class="form-control">
                        <option value="">Pilih Status Pekerjaan</option>
                        <option value="BAAK">BAAK</option>
                        <option value="Kaprogdi">Kaprogdi</option>
                        <option value="BKMK">BKMK</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Nomor Telepon</label>
                    <input class="form-control" name="telp" type="text" aria-describedby="nameHelp" placeholder="Masukan Nomor Telepon Karyawan">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Kata Sandi</label>
                    <p style="font-size:12px;color:red">Kata sandi default tidak bisa diganti</p>
                    <input disabled class="form-control" type="text" aria-describedby="nameHelp" value="Karyawan*123" placeholder="Masukan kata sandi Karyawan">
                    <input hidden class="form-control" name="pass" type="text" aria-describedby="nameHelp" value="Karyawan*123" placeholder="Masukan kata sandi Karyawan">
                </div>
                <!-- <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleConfirmPassword">Confirm password</label>
                                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
                            </div>
                        </div>
                    </div> -->
                <!-- <?php echo anchor('create/karyawan', "<span class='btn btn-primary btn-block'>Tambahkan User</span>"); ?> -->
                <button type="submit" class="btn btn-primary btn-block">Tambahkan User</button>
                <?php echo form_close(); ?>
                <!-- <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div> -->
            </div>
        </div>
    </div>