
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
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href="<?php echo base_url('barangkeluar') ?>" >Halaman Stok Barang Keluar</a></h5>
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
                        		<h4 class="card-title">Mohon Lengkapi Semua Atribut</h4>
                                	<form id="frm" action="<?php echo base_url('fungsibarangkeluar2') ?>" method="POST" class="mt-3">
                                        <?php foreach ($petugas as $datapetugas): ?>
                                            <div class="form-group">
                                                <input name="namapetugas" type="text" class="form-control" id="nametext" aria-describedby="name" value="<?php echo $datapetugas->namapetugas ?>" readonly>
                                            </div>
                                        <?php endforeach ?>
                                    
                                    
                                    <div class="form-group">
                                        <div class="form-group">
                                        <input name="tanggal" type="date" class="form-control" value="<?php echo date("Y-m-d") ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <select name="gudangtujuan" class="custom-select mr-sm-2" required>
                                            <option value="-">Pilih Lokasi Stok</option>
                                            <?php foreach ($gudang as $datagudang): ?>
                                                <option value="<?php echo $datagudang->namagudang ?>"><?php echo $datagudang->namagudang ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <select required name="lokasitujuan" class="custom-select mr-sm-2">
                                            <option value="-">Pilih Lokasi Tujuan</option>
                                            <?php foreach ($wilayah as $datawilayah): ?>
                                                <option value=""><?php echo $datawilayah->wilayah ?></option>
                                                <?php foreach ($lokasi as $datalokasi): ?>
                                                    <?php if ($datalokasi->wilayah == $datawilayah->wilayah): ?>
                                                       <option value="<?php echo $datalokasi->namalokasi ?>">&emsp;<?php echo $datalokasi->namalokasi ?></option>
                                                   <?php endif ?>
                                               <?php endforeach ?>
                                           <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input name="peminjam" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Nama Petugas IT" required>
                                    </div>

                                    <div class="form-group">
                                        <textarea name="keterangan" class="form-control" rows="3" placeholder="Keterangan" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-success col-12">Gunakan</button>
                                </form>

                                
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
