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
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href=# >Halaman Laporan <?php echo $namagudang ?></a></h5>
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
            
            <script type="text/javascript">
                window.onload=function(){
                    $(document).ready(function() {
                        var table = $('#zero_config').DataTable();
                        var table2 = $('#zero_config'). DataTable();
                        $('#min, #max').on("keyup change", function () {
                            table.draw();
                        } );
                        $('#min2, #max2').on("keyup change", function () {
                            table2.draw();
                        } );
                    } );

                    $.fn.dataTable.ext.search = [];
                    $.fn.dataTable.ext.search.push(
                        function( settings, data, dataIndex ) {
                            var input1 = document.getElementById("min").value;
                            var dateEntered1 = new Date(input1);

                            var input2 = document.getElementById("max").value;
                            var dateEntered2 = new Date(input2);

                            var min = dateEntered1;
                            var max = dateEntered2;
                            var age = new Date(data[1]);

                            if ( ( isNaN( min ) && isNaN( max ) ) || ( isNaN( min ) && age <= max ) || ( min <= age   && isNaN( max ) ) || ( min <= age   && age <= max ) )
                            {
                                return true;
                            }
                            return false;
                        }
                        );
                }
            </script>
            <div class="container-fluid">
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Silahkan Klik Tombol Cetak Laporan</h4>
                                <form action="<?php echo base_url('cetaklaporanstok') ?>" method="POST" class="mt-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" id="min" name="min" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="date" id="max" name="max" class="form-control">
                                            </div>
                                        </div>
                                        <form action="<?php echo base_url('cetaklaporanstok') ?>" method="POST" accept-charset="utf-8">
                                        </div>
                                        <div class="table-responsive">
                                            <table data-display-length='-1' id="zero_config" class="table table-striped table-bordered no-wrap">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Petugas IT</th>
                                                        <th>Tanggal</th>
                                                        <th>Tanggal Penggunaan</th>
                                                        <th>Nama Pengguna</th>
                                                        <th>Nama Lokasi Tujuan</th>
                                                        <th>Keterangan</th>
                                                        <th>No Pengajuan</th>
                                                        <th>SN Barang</th>
                                                        <th>Nama Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($barangkeluar as $databarangkeluar): ?>
                                                        <tr>
                                                            <td><?php echo $databarangkeluar->namapetugas ?></td>
                                                            <td><?php echo $databarangkeluar->tanggal ?></td>
                                                            <td><?php echo $databarangkeluar->tanggalpakai ?></td>
                                                            <td><?php echo $databarangkeluar->peminjam ?></td>
                                                            <td><?php echo $databarangkeluar->namalokasitujuan ?></td>
                                                            <td><?php echo $databarangkeluar->keterangan ?></td>
                                                            <td><?php echo $databarangkeluar->np ?></td>
                                                            <td><?php echo $databarangkeluar->snbarang ?></td>
                                                            <td><?php echo $databarangkeluar->namabarang ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Nama Petugas IT</th>
                                                        <th>Tanggal</th>
                                                        <th>Tanggal Penggunaan</th>
                                                        <th>Nama Pengguna</th>
                                                        <th>Nama Lokasi Tujuan</th>
                                                        <th>Keterangan</th>
                                                        <th>No Pengajuan</th>
                                                        <th>SN Barang</th>
                                                        <th>Nama Barang</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
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
            