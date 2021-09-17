                    <!-- basic table -->
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><span class="opacity-7 text-muted"><i class=" fas fa-database"></i> </span>Stok Paling Sedikit di <?php echo $namagudang ?></h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr class="bg-info text-light">
                                                <th >Kategori</th>
                                                <th >Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody class="mb-0 font-17 text-dark font-weight-medium">
                                            <?php foreach ($stoksedikit as $datastoksedikit): ?>
                                                <tr>
                                                    <td><?php echo $datastoksedikit->kategori ?></td>
                                                    <td><?php echo $datastoksedikit->jumlah ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kategori</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- order table -->