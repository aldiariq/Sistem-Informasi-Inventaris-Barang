                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><span class="opacity-7 text-muted"><i class=" fas fa-sticky-note"></i> </span>Rincian Stok di <?php echo $namagudang ?></h4>
                                <?php foreach ($rincianstok as $datarincianstok): ?>
                                    <div class="row mb-12 align-items-center mt-1 mt-4">
                                        <div class="col-3 text-left">
                                            <span class="mb-0 font-17 text-dark font-weight-medium"><?php echo $datarincianstok->kategori ?></span>
                                        </div>
                                        <div class="col-7">
                                            <div class="progress" style="height: 20px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $datarincianstok->jumlah ?>%"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="col-2 text-right">
                                            <span class="mb-0 font-17 text-dark font-weight-medium"><?php echo $datarincianstok->jumlah ?></span>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>