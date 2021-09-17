
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
                            <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href=# >Halaman Edit Stok Barang</a></h5>
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
                        <?php foreach ($barang as $databarang): ?>
                            <form action="<?php echo base_url('fungsieditstok/').$databarang->id ?>" method="POST" class="mt-3">
                                <div class="form-group">
                                    <input name="kategori" value="<?php echo $databarang->kategori ?>" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Kategori" required>
                                </div>

                                <div class="form-group">
                                    <input name="merek" value="<?php echo $databarang->merek ?>" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Merek" required>
                                </div>
                                <div class="form-group">
                                    <input name="nama" value="<?php echo $databarang->nama ?>" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <input name="sn" value="<?php echo $databarang->sn ?>" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="SN" required>
                                </div>
                                <div class="form-group">
                                    <input name="noinventaris" value="<?php echo $databarang->noinventaris ?>" type="text" class="form-control" id="nametext" aria-describedby="name" placeholder="No Inventaris" required>
                                </div>
                                <div class="form-group mb-4">
                                    <select name="lokasigudang" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>Lokasi Gudang</option>
                                        <?php if ($databarang->namagudang != "-"): ?>
                                            <?php foreach ($gudang as $datagudang): ?>
                                                <option value="<?php echo $datagudang->namagudang ?>" <?php if ($datagudang->namagudang == urldecode($this->uri->segment(2))): ?>
                                                <?php echo 'selected' ?>
                                                <?php endif ?>><?php echo $datagudang->namagudang ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>

                                        <?php if ($databarang->namagudang == "-"): ?>
                                            <?php foreach ($lokasi as $datalokasi): ?>
                                                <option value="<?php echo $datalokasi->namalokasi ?>" <?php if ($datalokasi->namalokasi == urldecode($this->uri->segment(2))): ?>
                                                <?php echo 'selected' ?>
                                                <?php endif ?>><?php echo $datalokasi->namalokasi ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input name="keterangan" value="<?php echo $databarang->keterangan ?>" type="textarea" class="form-control" id="nametext" aria-describedby="name" placeholder="Keterangan" required>
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
