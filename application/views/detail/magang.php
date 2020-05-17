<body class="bg-dark">
    <div class="content-wrapper">
        <div class="card card-register mx-auto mt-5">
            <?php if ($detail_magang->num_rows() > 0) : ?>
                <?php foreach ($detail_magang->result() as $row) : ?>
                    <div class="card-header"><span>Detail Magang</span><br><span>Kode Magang: <?php echo $row->KodeMagang ?></span></div>
                    <div class="card-body">
                        <?php echo form_open('verif/', 'role="form"'); ?>
                        <!-- Tolak -->
                        <div class="modal fade" id="tolakverif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <input hidden class="form-control" name="nim" value="<?php echo $row->NIM ?>">
                                <input hidden class="form-control" name="kode_magang" value="<?php echo $row->KodeMagang ?>">
                                <input hidden class="form-control" name="verif" value="2">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tolak Magang?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin ingin menolak perusahaan dan proposal magang?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-danger" type="submit">Tolak Magang</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <?php echo form_open('verif/', 'role="form"'); ?>
                        <div class="modal fade" id="hapusverif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <input hidden class="form-control" name="nim" value="<?php echo $row->NIM ?>">
                                <input hidden class="form-control" name="kode_magang" value="<?php echo $row->KodeMagang ?>">
                                <input hidden class="form-control" name="verif" value="0">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Batalkan Verifikasi Magang?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin ingin membatalkan verifikasi perusahaan dan proposal magang?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-danger" type="submit">Hapus Verifikasi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                        <?php echo form_open('verif/', 'role="form"'); ?>
                        <!--Modal Confirm Verif-->
                        <input hidden class="form-control" name="verif" value="1">
                        <div class="modal fade" id="verif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Setujui Perusahaan?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin ingin menyetujui perusahaan dan proposal magang?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Setujui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nomor Induk Mahasiswa</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->NIM ?>">
                            <!-- <input class="form-control" name="nim" type="text" value="<?php echo $row->NIM ?>"> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Industri Perusahaan</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->NamaIndustri ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Kode Perusahaan Berdasarkan KIS</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->Kode ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama Perusahaan</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->NamaPerusahaan ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Alamat Perusahaan</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->AlamatPerusahaan ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nomor Telepon Perusahaan</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->Telepon ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Email Perusahaan</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->Email ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Nama Supervisor</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->Supervisor ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Jabatan Supervisor</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->JabatanSupervisor ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Departemen</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->Departemen ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Tanggal Mulai Magang</label>
                            <input disabled class="form-control" type="text" value="<?php echo $row->TanggalMagang ?>">

                            <input hidden class="form-control" name="nim" value="<?php echo $row->NIM ?>">
                            <input hidden class="form-control" name="kode_magang" value="<?php echo $row->KodeMagang ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Verifikasi</label>
                            <input disabled class="form-control" type="text" value="<?php
                                                                                    if ($row->Verifikasi == 1) {
                                                                                        echo "Disetujui";
                                                                                    } else if ($row->Verifikasi == 2) {
                                                                                        echo "Ditolak";
                                                                                    } else {
                                                                                        echo "Tidak Disetujui";
                                                                                    } ?>">
                        </div>
                        <?php if ($this->session->userdata('access_level') > 2) {
                            if ($row->Verifikasi == 0) { ?>
                                <button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#verif">Verifikasi Perusahaan</button>
                            <?php } else { ?>
                                <button class="btn btn-danger btn-block" type="button" data-toggle="modal" data-target="#hapusverif">Hapus Verifikasi</button>
                            <?php } ?>
                            <button class="btn btn-danger btn-block" type="button" data-toggle="modal" data-target="#tolakverif">Tolak Magang</button>
                        <?php } ?>
                        <br>
                                <?php echo anchor('list/internship', "<span class='btn btn-secondary btn-block'>Kembali</span>"); ?>
                        <?php echo form_close(); ?>

                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="info">Tidak ada data!</td>
                    </tr>
                <?php endif; ?>

                    </div>
        </div>
    </div>