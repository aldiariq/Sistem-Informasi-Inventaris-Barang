
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
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href="<?php echo base_url('barangmasuk')?>" >Halaman Barang Masuk</a></h5>
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
                                <form action="<?php echo base_url('fungsibarangmasuk') ?>" method="POST" class="mt-3">
                                    <div class="form-group">
                                        <input name="np" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="No Pengajuan" required>
                                    </div>

                                    <div class="form-group">
                                        <input name="kategori" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Kategori" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <input name="merek" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Merek" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="nama" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Nama Barang" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="sn" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="SN" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="noinventaris" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="No Inventaris">
                                    </div>
                                    <div class="form-group mb-4">
                                        <select name="lokasigudang" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            <option selected>Lokasi Stok</option>
                                            <?php foreach ($gudang as $datagudang): ?>
                                                <option value="<?php echo $datagudang->namagudang ?>"><?php echo $datagudang->namagudang ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input name="keterangan" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Keterangan">
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-success">Tambah</button>
                                        </div>
                                    </div>
                                </form>
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
