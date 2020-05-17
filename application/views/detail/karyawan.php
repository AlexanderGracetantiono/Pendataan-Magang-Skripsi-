<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-fire"></i>
                        </div>
                        <div class="mr-5"><?php echo $count_mhs ?> Mahasiswa Belum Magang</div>
                    </div>
                    <!-- <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a> -->
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5"><?php echo $count_tolak ?> Proposal Ditolak</div>
                    </div>
                    <!-- <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Detail</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a> -->
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-fire"></i>
                        </div>
                        <div class="mr-5"><?php echo $count_verif ?> Proposal Belum Terverifikasi</div>
                    </div>
                    <!-- <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a> -->
                </div>
            </div>
            <!-- <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-support"></i>
                        </div>
                        <div class="mr-5">13 New Tickets!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div> -->
        </div>
        <!-- Profile -->
        <?php if ($karyawan->num_rows() > 0) : ?>
            <?php foreach ($karyawan->result() as $row) : ?>
                <!-- Card Columns Example Social Feed-->
                <div class="mb-0 mt-4">
                    <i class="fa fa-user-circle fa-lg" style="font-size:8em"></i>
                    <span style="font-size: 5em;margin-left:50px;"><?php echo $row->Nama ?></span>
                </div>
                <hr class="mt-2">
                <div class="card-body">
                    <!-- profile -->
                    <div class="mb-0 mt-4">
                        <span style="font-size: 32px;">Profile</span>
                    </div>
                    <hr class="mt-2">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <label for="exampleInputName">NIK</label>
                                <input disabled class="form-control" value="<?php echo $row->NIK ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputName">Status</label>
                                <input disabled class="form-control" value="<?php echo $row->StatusKerja ?>">
                            </div>
                            <div class="col-md-4">
                                <label for="exampleInputName">Contact</label>
                                <input disabled class="form-control" value="<?php echo $row->Telepon ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="mb-0 mt-4">
                <span style="font-size: 20px;">Profile Karyawan Tidak Ditemukan</span>
            </div>
        <?php endif; ?>


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