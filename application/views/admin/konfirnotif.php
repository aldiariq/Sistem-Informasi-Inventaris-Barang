
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <?php foreach ($akun as $dataakun): ?>
                            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Datang <?php echo $dataakun->username ?></h3>
                        <?php endforeach ?>
                        
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href=# >Halaman Tambah Akun</a></h5>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <?php foreach ($notif as $datanotif): ?>
                                        <form action="<?php echo base_url('fungsikonfirnotif/').$datanotif->id ?>" method="POST" class="mt-3">


                                    <div class="form-group">
                                        <div class="form-group">
                                        <input name="tanggalpakai" type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="namapemakai" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Nama Pemakai" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="keteranganpakai" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Keterangan Pakai" required>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">Konfirmasi</button>
                                        </div>
                                    </div>
                                </form>
                                <?php endforeach ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- order table -->

                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->