<body class="bg-dark">
    <div class="content-wrapper">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Form Import Daftar Mahasiswa</div>
            <div class="card-body">
                <form method="POST" action="<?php echo base_url() ?>u/mhs/" enctype="multipart/form-data">

                    <div class="form-group row">
                        <!-- <label for="example-text-input" class="col-md-2 col-form-label"></label>
                        <span class="float-right col-form-label"></span> -->
                        <div class="col-md-12">
                            <div class="dropzone-wrapper">
                                <div class="form-group">
                                    <div class="preview-zone hidden">
                                        <div class="box box-solid">
                                            <div class="box-header with-border">
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-danger btn-xs remove-preview">
                                                        <i class="fa fa-times"></i> Reset
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="box-body"></div>
                                        </div>
                                    </div>
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <div>Choose an excel file or drag it here.</div>
                                    </div>
                                    <input type="file" name="userfile" id="1" class="dropzone" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Tambahkan Mahasiswa</button>
                    <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Induk</label>
                    <input type="file" name="userfile" class="form-control">
                </div>
               
                <button type="submit" class="btn btn-primary btn-block">Tambahkan Mahasiswa</button> -->
                </form>

            </div>
        </div>
    </div>
    