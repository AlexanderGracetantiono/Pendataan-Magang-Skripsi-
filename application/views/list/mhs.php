<body class="bg-dark">
    <div class="content-wrapper">
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Daftar Mahasiswa Jurusan <?php echo $title ?>
                <span style="position:absolute;right:50px ">
                    <?php echo anchor( current_url()."/download", "<span class='btn btn-primary'>Download This Page</span>"); ?>
                    <!-- <a href=".\download" class="btn btn-primary" type="submit">Download This Page</a> -->
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <!-- <th>Jurusan</th> -->
                                <th>Angkatan</th>
                                <th>Status</th>
                                <th>Kode Magang</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>NIM</th>
                                <th>Nama</th>
                                <!-- <th>Jurusan</th> -->
                                <th>Angkatan</th>
                                <th>Status</th>
                                <th>Kode Magang</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if ($list_mhs->num_rows() > 0) : ?>
                                <?php foreach ($list_mhs->result() as $row) : ?>
                                    <tr>
                                        <td><?php echo $row->NIM; ?></td>
                                        <td><?php echo $row->NamaMahasiswa; ?></td>
                                        <!-- <td><?php echo $row->Jurusan; ?></td> -->
                                        <td><?php echo $row->Angkatan; ?></td>
                                        <td><?php echo $row->Status; ?></td>
                                        <td><?php
                                            if ($row->KodeMagang == null) {
                                                echo "Belum Ada";
                                            } else {
                                                echo $row->KodeMagang;
                                            }
                                            ?></td>
                                        <?php
                                        echo "<td>";
                                        echo  anchor('detail/mahasiswa/' . $row->NIM, "<span class='btn btn-primary '><i class='fa fa-eye'></i> Detail") . '</span>';
                                        echo "</td>"
                                        ?>
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