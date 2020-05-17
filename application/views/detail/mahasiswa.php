<div class="content-wrapper">
    <div class="container-fluid">
        <?php if ($mahasiswa->num_rows() > 0) : ?>
            <?php foreach ($mahasiswa->result() as $row) : ?>
                <!-- Card Columns Example Social Feed-->
                <div class="mb-0 mt-4">
                    <i class="fa fa-user-circle fa-lg" style="font-size:8em"></i>
                    <span style="font-size: 5em;margin-left:50px;"><?php echo $row->NamaMahasiswa ?></span>
                </div>
                <hr class="mt-2">
                <div class="card-body">
                    <!-- profile -->
                    <div class="mb-0 mt-4">
                        <span style="font-size: 32px;">Data Mahasiswa</span>
                    </div>
                    <hr class="mt-2">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="exampleInputName">NIM</label>
                                <input disabled class="form-control" value="<?php echo $row->NIM ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputName">Jurusan</label>
                                <input disabled class="form-control" value="<?php echo $row->Jurusan ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputName">Angkatan</label>
                                <input disabled class="form-control" value="<?php echo $row->Angkatan ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputName">Status Magang</label>
                                <input disabled class="form-control" value="<?php echo $row->Status ?>">
                            </div>
                            <?php if ($row->Status != 'Belum Magang') { ?>
                                <div class="col-md-6">
                                    <label for="exampleInputName">Kode Magang</label>
                                    <input disabled class="form-control" value="<?php echo $row->KodeMagang ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="mb-0 mt-4">
                <span style="font-size: 20px;">Data Mahasiswa Tidak Ditemukan</span>
            </div>
        <?php endif; ?>

        <!-- Data Magang -->
        <?php if ($kode != '') : ?>
            <hr class="mt-2">
            <div class="card-body">
                <div class="mb-0 mt-4">
                    <span style="font-size: 32px;">Data Magang Mahasiswa</span>
                </div>
                <?php if ($data_magang->num_rows() > 0) : ?>
                    <?php foreach ($data_magang->result() as $row) : ?>
                        <hr class="mt-2">
                        <div class="form-group">
                            <label for="exampleInputName">Nama Perusahaan</label>
                            <input disabled class="form-control" value="<?php echo $row->NamaPerusahaan ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Alamat Perusahaan</label>
                            <input disabled class="form-control" value="<?php echo $row->AlamatPerusahaan ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Departemen</label>
                            <input disabled class="form-control" value="<?php echo $row->Departemen ?>">
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputName">Contact Perusahaan</label>
                                    <input disabled class="form-control" value="<?php echo $row->Telepon ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputName">Email Perusahaan</label>
                                    <input disabled class="form-control" value="<?php echo $row->Email ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="exampleInputName">Nama Supervisor</label>
                                    <input disabled class="form-control" value="<?php echo $row->Supervisor ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputName">Jabatan Supervisor</label>
                                    <input disabled class="form-control" value="<?php echo $row->JabatanSupervisor ?>">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="mb-0 mt-4">
                        <span style="font-size: 20px;">Data Magang Tidak Ditemukan</span>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <!-- Data Mingguan -->
            <?php if ($kode != '') : ?>
                <hr class="mt-2">
                <div class="card-body">
                    <div class="mb-0 mt-4">
                        <span style="font-size: 32px;">Data Harian Mahasiswa</span>
                    </div>
                    <?php if ($data_week->num_rows() > 0) : ?>
                        <?php foreach ($data_week->result() as $row) : ?>
                            <hr class="mt-2">
                            <div style="background-color:lightgray ">
                                <label for="exampleInputName">Minggu ke-<?php echo $row->Minggu ?></label><br>
                                <label for="exampleInputName">Tanggal : <?php echo $row->Tanggal ?></label><br>
                                <div class="form-group">
                                    <label for="exampleInputName">Komentar:</label>
                                    <textarea disabled class="form-control"><?php echo $row->Comment ?></textarea>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="mb-0 mt-4">
                            <span style="font-size: 20px;">Data Harian Mahasiswa Tidak Ditemukan</span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                </div>

            </div>
            <!-- /.container-fluid-->
            <!-- /.content-wrapper-->
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © Your Website 2017</small>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>