
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
                                <form action="<?php echo base_url('fungsitambahakun') ?>" method="POST" class="mt-3">
                                    <div class="form-group">
                                        <input name="username" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" id="nametext" aria-describedby="name" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="password2" type="password" class="form-control" id="nametext" aria-describedby="name" placeholder="Ulangi Password" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <select name="akses" class="custom-select mr-sm-2" id="akses" required onchange="cekAkses()">
                                            <option value="" selected>Akses Akun</option>
                                            <option value="USER">User</option>
											<option value="MANAGER">Manager</option>
                                        </select>
                                    </div>
                                    
                                        <div class="form-group mb-4">
                                            <select name="kd_gudang" class="custom-select mr-sm-2" id="kd_gudang" required disabled >
                                                <option value="" selected>Lokasi Stok</option>
                                                <?php foreach ($gudang as $datagudang): ?>
                                                    <option value="<?php echo $datagudang->id ?>"><?php echo $datagudang->namagudang ?></option>
                                                <?php endforeach ?>
                                            </select>
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
            <script>
                                        function cekAkses() {
                                            var e = document.getElementById("akses");
                                            var akses = e.options[e.selectedIndex].value;

                                            if (akses == 'USER') {
                                                var f = document.getElementById("kd_gudang").disabled = false;
                                            }else {
                                                var f = document.getElementById("kd_gudang").selectedIndex = "0";
                                                var f = document.getElementById("kd_gudang").disabled = true;
                                            }
                                        }
                                    </script>