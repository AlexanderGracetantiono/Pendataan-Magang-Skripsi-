<body class="bg-dark">
    <div class="content-wrapper">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Form Pembuatan Akun Mahasiswa</div>
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('create/mahasiswa/', 'role="form"'); ?>

                <div class="form-group">
                    <label for="exampleInputName">Nama Mahasiswa</label>
                    <input class="form-control" name="nama" type="text" aria-describedby="nameHelp" placeholder="Masukan Nama Mahasiswa">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">NIM</label>
                    <input class="form-control" name="nim" type="text" aria-describedby="nameHelp" placeholder="Masukan NIM">
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Jurusan</label>
                    <select name="jurusan" class="form-control">
                        <option value="">Pilih Jurusan</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                        <option value="Ilmu Komunikasi">Ilmu Komunikasi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Kata Sandi</label>
                    <p style="font-size:12px;color:red">Kata sandi default tidak bisa diganti</p>
                    <input disabled class="form-control" type="text" aria-describedby="nameHelp" value="Siswa*123" placeholder="Masukan kata sandi">
                    <input hidden class="form-control" name="pass" type="text" aria-describedby="nameHelp" value="Siswa*123" placeholder="Masukan kata sandi">
                    <input hidden class="form-control" name="status" type="text" aria-describedby="nameHelp" value="Belum Magang">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Tambahkan Mahasiswa</button>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>