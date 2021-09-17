
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
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href=# >Halaman <?php echo $namagudang ?></a></h5>
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
                                <h4 class="card-title">Stok Barang <?php echo $namagudang ?></h4>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>No Pengajuan</th>
                                                <th>Kategori</th>
                                                <th>Merek</th>
                                                <th>Nama</th>
                                                <th>SN</th>
                                                <th>No Inventaris</th>
                                                <th>Keterangan</th>
                                                <?php if ($this->session->userdata('akses') == 'ADMIN'): ?>
                                                    <th>Aksi</th>
                                                <?php endif ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($barang as $databarang): ?>
                                                <tr>
                                                    <td><?php echo $databarang->np ?></td>
                                                    <td><?php echo $databarang->kategori ?></td>
                                                    <td><?php echo $databarang->merek ?></td>
                                                    <td><?php echo $databarang->nama ?></td>
                                                    <td><?php echo $databarang->sn ?></td>
                                                    <td><?php echo $databarang->noinventaris ?></td>
                                                    <td><?php echo $databarang->keterangan ?></td>
                                                    <?php if ($this->session->userdata('akses') == 'ADMIN'): ?>
                                                        <td>
                                                            <a href="<?php echo base_url('fungsihapusbarang/').$namagudang.'/'.$databarang->id ?>"><button class="btn btn-danger">Hapus</button></a>
                                                            <a href="<?php echo base_url('editstok/').$namagudang.'/'.$databarang->id ?>"><button class="btn btn-danger">Edit</button></a>
                                                        </td>
                                                    <?php endif ?>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No Pengajuan</th>
                                                <th>Kategori</th>
                                                <th>Merek</th>
                                                <th>Nama</th>
                                                <th>SN</th>
                                                <th>No Inventaris</th>
                                                <th>Keterangan</th>
                                                <?php if ($this->session->userdata('akses') == 'ADMIN'): ?>
                                                    <th>Aksi</th>
                                                <?php endif ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
