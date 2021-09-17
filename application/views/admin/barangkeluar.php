
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
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href="<?php echo base_url('barangkeluar')?>" >Halaman Stok Barang Keluar</a></h5>
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
                                	<form id="frm" action="<?php echo base_url('fungsibarangkeluar') ?>" method="POST" class="mt-3">

                                    <div class="form-group">
                                        <select required name="lokasigudang" class="custom-select mr-sm-2" id="lokasigudang" onchange="ambilnamagudang()">
                                            <option value="">Pilih Lokasi Stok</option>
                                            <?php foreach ($gudang as $datagudang): ?>
                                                <option value="<?php echo $datagudang->namagudang ?>"><?php echo $datagudang->namagudang ?></option>
                                            <?php endforeach ?>
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
                                                data = cells[5] || null;
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
                                                <th>No Pengajuan</th>
                                                <th>Kategori</th>
                                                <th>Merek</th>
                                                <th>Nama</th>
                                                <th>SN</th>
                                                <th>Lokasi Stok</th>
                                                <th>Pilih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $serial = 0 ?>
                                            <?php foreach ($barang as $databarang): ?>
                                                <tr>
                                                    <td><?php echo $databarang->np ?></td>
                                                    <td><?php echo $databarang->kategori ?></td>
                                                    <td><?php echo $databarang->merek ?></td>
                                                    <td><?php echo $databarang->nama ?></td>
                                                    <td><?php echo $databarang->sn ?></td>
                                                    <td><?php echo $databarang->lokasibarang ?></td>
                                                    <td>
                                                        <!-- <input type="radio" name="radio" id="<?php echo $databarang->sn ?>" onclick="f<?php echo $databarang->sn ?>()" required> -->
                                                        <script>
                                                            function f<?php echo $databarang->sn ?>() {
                                                                <?php
                                                                $serial = $databarang->sn;
                                                                $namabarang = $databarang->nama;
                                                                $np = $databarang->np;
                                                                ?>
                                                                
                                                                var element1 = document.createElement("input");
                                                                element1.type = "hidden";
                                                                element1.value = "<?php echo $serial ?>";
                                                                element1.name = "sn";
                                                                document.getElementById("frm").appendChild(element1);

                                                                var element2 = document.createElement("input");
                                                                element2.type = "hidden";
                                                                element2.value = "<?php echo $namabarang ?>";
                                                                element2.name = "namabarang";
                                                                document.getElementById("frm").appendChild(element2);

                                                                var element3 = document.createElement("input");
                                                                element3.type = "hidden";
                                                                element3.value = "<?php echo $np ?>";
                                                                element3.name = "np";
                                                                document.getElementById("frm").appendChild(element3);
                                                            }
                                                        </script>
                                                        <button onclick="<?php echo 'f'.$databarang->sn.'()' ?>" type="submit" class="btn btn-success col-12">Gunakan</button>
                                                    </td>
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
                                                <th>Lokasi Stok</th>
                                                <th>Pilih</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
