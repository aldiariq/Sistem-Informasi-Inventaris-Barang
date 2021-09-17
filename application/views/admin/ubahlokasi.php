
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
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href=# >Halaman Ubah Lokasi</a></h5>
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
                        <?php foreach ($lokasitujuan as $datalokasitujuan): ?>
                            <form action="<?php echo base_url('fungsiubahlokasi/').$datalokasitujuan->id ?>" method="POST" class="mt-3">
                                <div class="form-group">
                                    <input name="namalokasi" value="<?php echo $datalokasitujuan->namalokasi ?>" type="text" class="form-control" aria-describedby="name" placeholder="Nama Lokasi" required>
                                </div>
                                <div class="form-group">
                                    <input name="wilayah" value="<?php echo $datalokasitujuan->wilayah ?>" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Wilayah" required>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success">Simpan</button>
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
