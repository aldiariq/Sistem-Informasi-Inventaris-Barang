
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
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href="<?php echo base_url('barangkeluar')?>" >Halaman Notifikasi</a></h5>
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
                                <div class="card-body">
                                    <a href="<?php echo base_url('notif') ?>"><button class="btn btn-success col-12">Refresh</button></a>
                                </div>
                                    <div class="form-group">
                                        <select required name="lokasigudang" class="custom-select mr-sm-2" id="lokasigudang" onchange="ambilnamagudang()">
                                            <option value="">Pilih Asal Stok</option>
                                            <?php foreach ($gudang as $datagudang): ?>
                                                <option value="<?php echo $datagudang->namagudang ?>"><?php echo $datagudang->namagudang ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <script>
                                        function ambilnamagudang() {
                                            var t = document.getElementById("lokasigudang");
                                            var selectedText = t.options[t.selectedIndex].text;

                                            let dropdown, table, rows, cells, data, filter;
                                            dropdown = document.getElementById("lokasigudang");
                                            table = document.getElementById("zero_config");
                                            rows = table.getElementsByTagName("tr");
                                            filter = dropdown.value;

                                            for (let row of rows) {
                                                cells = row.getElementsByTagName("td");
                                                data = cells[2] || null;
                                                if (!data || (filter === data.textContent)) {
                                                    row.style.display = "";
                                                }else {
                                                    row.style.display = "none";
                                                }
                                            }
                                        }
                                    </script>
                                    <script>
                                    </script>
                                    <div class="table-responsive">
                                        
                                            <table data-display-length='-1' id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Tanggal Gunakan</th>
                                                <th>Asal Stok</th>
                                                <th>Lokasi Tujuan</th>
                                                <th>Peminjam</th>
                                                <th>SN</th>
                                                <th>Nama Barang</th>
                                                <th>Keterangan</th>
                                                <th>Keterangan Gunakan</th>
                                                <?php if ($dataakun->akses == 'USER'): ?>
                                                    <th>Aksi</th>
                                                <?php endif ?>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($notif as $datanotif): ?>
                                                <tr>
                                                    <td><?php echo $datanotif->tanggal ?></td>
                                                    <td><?php echo $datanotif->tanggalpakai ?></td>
                                                    <td><?php echo $datanotif->asalstok ?></td>
                                                    <td><?php echo $datanotif->lokasitujuan ?></td>
                                                    <td><?php echo $datanotif->peminjam ?></td>
                                                    <td><?php echo $datanotif->snbarang ?></td>
                                                    <td><?php echo $datanotif->namabarang ?></td>
                                                    <td><?php echo $datanotif->keterangan ?></td>
                                                    <td><?php echo $datanotif->keteranganpakai ?></td>
                                                    <?php if ($dataakun->akses == 'USER'): ?>
                                                        <td>
                                                            <a href="<?php echo base_url('konfirnotif/').$datanotif->id ?>"><button class="btn btn-warning">Konfirmasi</button></a>
                                                        </td>
                                                    <?php endif ?>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Tanggal Gunakan</th>
                                                <th>Asal Stok</th>
                                                <th>Lokasi Tujuan</th>
                                                <th>Peminjam</th>
                                                <th>SN</th>
                                                <th>Nama Barang</th>
                                                <th>Keterangan</th>
                                                <th>Keterangan Gunakan</th>
                                                <?php if ($dataakun->akses == 'USER'): ?>
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
