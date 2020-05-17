<body class="bg-dark">
    <div class="content-wrapper">
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Data Table Example</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Nomor Telepon</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Nomor Telepon</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if ($list_karyawan->num_rows() > 0) : ?>
                                <?php foreach ($list_karyawan->result() as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->NIK; ?></td>
                                        <td><?php echo $row->Nama; ?></td>
                                        <td><?php echo $row->StatusKerja; ?></td>
                                        <td><?php echo $row->Telepon; ?></td>
                                        <!-- <td><?php echo $row->Status; ?></td>
                                        <td><?php
                                            if ($row->KodeMagang == null) {
                                                echo "Belum Ada";
                                            } else {
                                                echo $row->KodeMagang;
                                            }
                                            ?></td> -->
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5" class="info">Tidak ada data!</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>
    </div>
    </div>
    </div>