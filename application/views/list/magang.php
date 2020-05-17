                    <body class="bg-dark">
                        <div class="content-wrapper">
                            <!-- Example DataTables Card-->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fa fa-table"></i> Internship Data Table</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Kode Magang</th>
                                                    <th>NIM</th>
                                                    <!-- <th>Kode KIS</th> -->
                                                    <th>Nama Perusahaan</th>
                                                    <!-- <th>Alamat</th> -->
                                                    <th>Departemen</th>
                                                    <th>Tanggal Magang</th>
                                                    <th>Verifikasi</th>

                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Kode Magang</th>
                                                    <th>NIM</th>
                                                    <!-- <th>Kode KIS</th> -->
                                                    <th>Nama Perusahaan</th>
                                                    <!-- <th>Alamat</th> -->
                                                    <th>Departemen</th>
                                                    <th>Tanggal Magang</th>
                                                    <th>Verifikasi</th>

                                                    <th>Opsi</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php if ($list_magang->num_rows() > 0) : ?>
                                                    <?php foreach ($list_magang->result() as $row) : ?>
                                                        <tr>
                                                            <td><?php echo $row->KodeMagang; ?></td>
                                                            <td><?php echo $row->NIM; ?></td>
                                                            <!-- <td><?php echo $row->Kode; ?></td> -->
                                                            <td><?php echo $row->NamaPerusahaan; ?></td>
                                                            <!-- <td><?php echo $row->AlamatPerusahaan; ?></td> -->
                                                            <td><?php echo $row->Departemen; ?></td>
                                                            <td><?php echo $row->TanggalMagang; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($row->Verifikasi == 1) {
                                                                    echo 'Disetujui';
                                                                ?>
                                                                    <span class="badge badge-success"><i class="fa fa-check"></i></span>
                                                                <?php
                                                                } else if ($row->Verifikasi == 2) {
                                                                    echo 'Ditolak';
                                                                ?>
                                                                    <span class="badge badge-danger">X</span>
                                                                <?php
                                                                } else {
                                                                    echo 'Belum Disetujui';
                                                                ?>
                                                                    <span class="badge badge-warning">O</span>
                                                                <?php
                                                                } ?>
                                                            </td>
                                                            <?php
                                                            echo "<td>";
                                                            // echo  anchor('detail/magang/' . $row->KodeMagang, "<span class='btn btn-primary '><i class='fa fa-eye'></i> Detail") . '</span>'
                                                            //     . ' ' .
                                                            //     anchor('edit/magang/' . $row->KodeMagang, "<span class='btn btn-primary'><i class='fa fa-pencil'></i> Edit") . '</span>'
                                                            //     . ' ' .
                                                            //     anchor('delete/magang/' . $row->KodeMagang, "<span class='btn btn-primary'><i class='fa fa-red fa-trash'></i> Delete") . '</span>';
                                                            echo  anchor('detail/magang/' . $row->KodeMagang, "<span class='btn btn-primary '><i class='fa fa-eye'></i> Detail") . '</span>';
                                                            echo "</td>"
                                                            // echo $row->Verifikasi;
                                                            ?>
                                                            <!-- <td style="background-color: green"><?php echo $row->TanggalMagang; ?></td> -->
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