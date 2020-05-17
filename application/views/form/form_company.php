<body class="bg-dark">
    <div class="content-wrapper">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Form Data Magang</div>
            <?php if (($this->session->userdata('status') == 'Belum Magang') || ($this->session->userdata('status') == 'Ditolak')) { ?>
                <div class="card-body">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('company/', 'role="form"'); ?>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-8">
                                <label for="exampleInputLastName">Nama</label>
                                <input disabled name="nama" class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" value="<?php echo $this->session->userdata('nama') ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">NIM</label>
                                <input disabled name="nim" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('id') ?>">
                                <input hidden name="nim" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('id') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputName">Industri Perusahaan</label>
                                <input name="industri" class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Masukan Industri Perusahaan">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputLastName">Kode KIS</label>
                                <input name="kis" class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Masukan Kode KIS">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Perusahaan</label>
                        <input name="company_name" class="form-control" placeholder="Masukan Nama Perusahaan">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat Perusahaan</label>
                        <input name="alamat" class="form-control" placeholder="Masukan Alamat Perusahaan">
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">No Telepon</label>
                                <input name="company_number" class="form-control" id="exampleInputPassword1" type="text" placeholder="Contact Perusahaan">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleConfirmPassword">Alamat Email</label>
                                <input name="company_email" class="form-control" id="exampleConfirmPassword" type="text" placeholder="Email Perusahaan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Nama Supervisor</label>
                                <input name="super_name" class="form-control" id="exampleInputPassword1" type="text" placeholder="Nama Supervisor">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleConfirmPassword">Jabatan Supervisor</label>
                                <input name="super_jabatan" class="form-control" id="exampleConfirmPassword" type="text" placeholder="Jabatan Supervisor">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Departemen</label>
                        <input name="departemen" class="form-control" placeholder="Masukan Nama Departemen">
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Tanggal Mulai Magang</label>
                                <input name="tgl" class="form-control" id="exampleInputPassword1" type="date" placeholder="Nama Supervisor">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleConfirmPassword">Jumlah Hari Masuk per Minggu</label>
                                <input name="hari" class="form-control" id="exampleConfirmPassword" type="text" placeholder="Jumlah hari masuk per minggu">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit">Simpan Data</button>
                    <?php echo form_close(); ?>
                    <!-- <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div> -->
                </div>
            <?php } else { ?>
                <div class="card-body">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-8">
                                <label for="exampleInputLastName">Nama</label>
                                <input disabled name="nama" class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" value="<?php echo $this->session->userdata('nama') ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputEmail1">NIM</label>
                                <input disabled name="nim" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('id') ?>">
                                <input hidden name="nim" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" value="<?php echo $this->session->userdata('id') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Status Proposal Magang</label>
                        <input disabled class="form-control" value="<?php echo $this->session->userdata('status') ?>">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>