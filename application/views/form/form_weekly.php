<body class="bg-dark">
    <div class="content-wrapper">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Form Laporan Harian</div>
            <div class="card-body">
                <?php echo validation_errors(); ?>
                <?php echo form_open('weekly/', 'role="form"'); ?>

                <div class="form-group">
                    <label for="exampleInputName">Kode Magang</label>
                    <input disabled class="form-control" type="text" value="<?php echo $this->session->userdata('kode_magang') ?>">
                    <input hidden class="form-control" name="kode_magang" type="text" value="<?php echo $this->session->userdata('kode_magang') ?>">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">Minggu ke-</label>
                            <input class="form-control" name="minggu" type="text" value="">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">Tanggal Magang</label>
                            <input disable class="form-control" type="date" value="<?php echo date("Y-m-d") ?>">
                            <input hidden class="form-control" name="tgl" type="text" value="<?php echo date("Y-m-d") ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputName">Komentar</label>
                    <textarea class="form-control" name="comment" type="textbox"></textarea>
                </div>



                <button type="submit" class="btn btn-primary btn-block">Tambahkan Laporan</button>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>