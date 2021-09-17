        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item text-light"> 
                            <a class="sidebar-link sidebar-link text-light" href="<?php echo base_url('admin') ?>"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                class="hide-menu text-light">Dashboard</span></a></li>
                                <?php if ($this->session->userdata('akses') == 'USER'): ?>
                                    <li class="list-divider"></li>
                                    <li class="nav-small-cap text-light"><span class="hide-menu text-light">Transaksi</span></li>
                                    <li class="sidebar-item text-light">
                                        <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                        class="hide-menu text-light">Transaksi</span></a>
                                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                            <li class="sidebar-item text-light"><a href="<?php echo base_url('barangmasuk') ?>" class="sidebar-link"><span
                                                class="hide-menu text-light"> Barang Masuk</span></a>
                                            </li>
                                            <li class="sidebar-item text-light"><a href="<?php echo base_url('barangkeluar') ?>" class="sidebar-link"><span
                                                class="hide-menu text-light"> Barang Keluar</span></a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="list-divider"></li>
                        <li class="nav-small-cap text-light"><span class="hide-menu text-light">Stok</span></li>
                        <li class="sidebar-item text-light"> <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu text-light">Stok </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <?php foreach ($gudang as $datagudang): ?>
                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('lihatstok/'.$datagudang->namagudang) ?>" class="sidebar-link"><span
                                        class="hide-menu text-light"> <?php echo $datagudang->namagudang ?>
                                    </span></a>
                                </li>
                                <?php endforeach ?>

                                <?php foreach ($wilayah as $datawilayah): ?>
                                    <li class="sidebar-item text-light"><a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                        aria-expanded="false"><span
                                        class="hide-menu text-light"><?php echo $datawilayah->wilayah ?></span></a>
                                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                            <?php foreach ($lokasi as $datalokasi): ?>
                                                <?php if ($datalokasi->wilayah == $datawilayah->wilayah): ?>
                                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('lihatstok/'.$datalokasi->namalokasi) ?>" class="sidebar-link"><span
                                                        class="hide-menu text-light"> <?php echo $datalokasi->namalokasi ?>
                                                    </span></a>
                                                </li>
                                                <?php endif ?>
                                        <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                        </ul>
                    </li>

                                <li class="list-divider"></li>
                                <li class="nav-small-cap text-light"><span class="hide-menu text-light">Lap Barang Keluar</span></li>
                                <li class="sidebar-item text-light"> <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                    aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                    class="hide-menu text-light">Lap Barang Keluar</span></a>
                                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                        <?php foreach ($gudang as $datagudang): ?>
                                            <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanstok/'.$datagudang->namagudang) ?>" class="sidebar-link"><span
                                                class="hide-menu text-light"> <?php echo $datagudang->namagudang ?>
                                            </span></a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </li>

                            <li class="list-divider"></li>
                    <li class="nav-small-cap text-light"><span class="hide-menu text-light">Lap Stok Barang</span></li>
                    <li class="sidebar-item text-light"> <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                        class="hide-menu text-light">Lap Stok Barang</span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <?php foreach ($gudang as $datagudang): ?>
                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanbarang/'.$datagudang->namagudang) ?>" class="sidebar-link"><span
                                        class="hide-menu text-light"> <?php echo $datagudang->namagudang ?>
                                    </span></a>
                                </li>
                                <?php endforeach ?>

                                <?php foreach ($wilayah as $datawilayah): ?>
                                    <li class="sidebar-item text-light"><a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                        aria-expanded="false"><span
                                        class="hide-menu text-light"><?php echo $datawilayah->wilayah ?></span></a>
                                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                            <?php foreach ($lokasi as $datalokasi): ?>
                                                <?php if ($datalokasi->wilayah == $datawilayah->wilayah): ?>
                                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanbarang/'.$datalokasi->namalokasi) ?>" class="sidebar-link"><span
                                                        class="hide-menu text-light"> <?php echo $datalokasi->namalokasi ?>
                                                    </span></a>
                                                </li>
                                                <?php endif ?>
                                        <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                    </ul>
                </li>
                        <?php endif ?>

                        <?php if ($this->session->userdata('akses') == 'MANAGER'): ?>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap text-light"><span class="hide-menu text-light">Lap Barang Keluar</span></li>
                            <li class="sidebar-item text-light"> <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                class="hide-menu text-light">Lap Barang Keluar</span></a>
                                <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                    <?php foreach ($gudang as $datagudang): ?>
                                        <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanstok/'.$datagudang->namagudang) ?>" class="sidebar-link"><span
                                            class="hide-menu text-light"> <?php echo $datagudang->namagudang ?>
                                        </span></a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </li>

                        <li class="list-divider"></li>
                    <li class="nav-small-cap text-light"><span class="hide-menu text-light">Lap Stok Barang</span></li>
                    <li class="sidebar-item text-light"> <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                        class="hide-menu text-light">Lap Stok Barang</span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <?php foreach ($gudang as $datagudang): ?>
                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanbarang/'.$datagudang->namagudang) ?>" class="sidebar-link"><span
                                        class="hide-menu text-light"> <?php echo $datagudang->namagudang ?>
                                    </span></a>
                                </li>
                                <?php endforeach ?>

                                <?php foreach ($wilayah as $datawilayah): ?>
                                    <li class="sidebar-item text-light"><a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                        aria-expanded="false"><span
                                        class="hide-menu text-light"><?php echo $datawilayah->wilayah ?></span></a>
                                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                            <?php foreach ($lokasi as $datalokasi): ?>
                                                <?php if ($datalokasi->wilayah == $datawilayah->wilayah): ?>
                                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanbarang/'.$datalokasi->namalokasi) ?>" class="sidebar-link"><span
                                                        class="hide-menu text-light"> <?php echo $datalokasi->namalokasi ?>
                                                    </span></a>
                                                </li>
                                                <?php endif ?>
                                        <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                    </ul>
                </li>
                    <?php endif ?>

                    <?php if ($this->session->userdata('akses') == 'ADMIN'): ?>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap text-light"><span class="hide-menu text-light">Transaksi</span></li>
                        <li class="sidebar-item text-light">
                            <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                            class="hide-menu text-light">Transaksi</span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <li class="sidebar-item text-light"><a href="<?php echo base_url('barangmasuk') ?>" class="sidebar-link"><span
                                    class="hide-menu text-light"> Barang Masuk</span></a>
                                </li>
                                <li class="sidebar-item text-light"><a href="<?php echo base_url('barangkeluar') ?>" class="sidebar-link"><span
                                    class="hide-menu text-light"> Barang Keluar</span></a>
                                </li>
                            </ul>
                        </li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap text-light"><span class="hide-menu text-light">Stok</span></li>
                        <li class="sidebar-item text-light"> <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                            aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu text-light">Stok </span></a>
                            <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                <?php foreach ($gudang as $datagudang): ?>
                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('lihatstok/'.$datagudang->namagudang) ?>" class="sidebar-link"><span
                                        class="hide-menu text-light"> <?php echo $datagudang->namagudang ?>
                                    </span></a>
                                </li>
                                <?php endforeach ?>

                                <?php foreach ($wilayah as $datawilayah): ?>
                                    <li class="sidebar-item text-light"><a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                        aria-expanded="false"><span
                                        class="hide-menu text-light"><?php echo $datawilayah->wilayah ?></span></a>
                                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                            <?php foreach ($lokasi as $datalokasi): ?>
                                                <?php if ($datalokasi->wilayah == $datawilayah->wilayah): ?>
                                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('lihatstok/'.$datalokasi->namalokasi) ?>" class="sidebar-link"><span
                                                        class="hide-menu text-light"> <?php echo $datalokasi->namalokasi ?>
                                                    </span></a>
                                                </li>
                                                <?php endif ?>
                                        <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                        </ul>
                    </li>

                    <li class="list-divider"></li>
                    <li class="nav-small-cap text-light"><span class="hide-menu text-light">Lap Stok Barang</span></li>
                    <li class="sidebar-item text-light"> <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                        class="hide-menu text-light">Lap Stok Barang</span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <?php foreach ($gudang as $datagudang): ?>
                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanbarang/'.$datagudang->namagudang) ?>" class="sidebar-link"><span
                                        class="hide-menu text-light"> <?php echo $datagudang->namagudang ?>
                                    </span></a>
                                </li>
                                <?php endforeach ?>

                                <?php foreach ($wilayah as $datawilayah): ?>
                                    <li class="sidebar-item text-light"><a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                        aria-expanded="false"><span
                                        class="hide-menu text-light"><?php echo $datawilayah->wilayah ?></span></a>
                                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                            <?php foreach ($lokasi as $datalokasi): ?>
                                                <?php if ($datalokasi->wilayah == $datawilayah->wilayah): ?>
                                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanbarang/'.$datalokasi->namalokasi) ?>" class="sidebar-link"><span
                                                        class="hide-menu text-light"> <?php echo $datalokasi->namalokasi ?>
                                                    </span></a>
                                                </li>
                                                <?php endif ?>
                                        <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                    </ul>
                </li>

                    <li class="list-divider"></li>
                    <li class="nav-small-cap text-light"><span class="hide-menu text-light">Lap Barang Keluar</span></li>
                    <li class="sidebar-item text-light"> <a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                        class="hide-menu text-light">Lap Barang Keluar</span></a>
                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                            <?php foreach ($gudang as $datagudang): ?>
                                <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanstok/'.$datagudang->namagudang) ?>" class="sidebar-link"><span
                                    class="hide-menu text-light"> <?php echo $datagudang->namagudang ?>
                                </span></a>
                            </li>
                        <?php endforeach ?>

                        <?php foreach ($wilayah as $datawilayah): ?>
                                    <li class="sidebar-item text-light"><a class="sidebar-link has-arrow text-light" href="javascript:void(0)"
                                        aria-expanded="false"><span
                                        class="hide-menu text-light"><?php echo $datawilayah->wilayah ?></span></a>
                                        <ul aria-expanded="false" class="collapse  first-level base-level-line">
                                            <?php foreach ($lokasi as $datalokasi): ?>
                                                <?php if ($datalokasi->wilayah == $datawilayah->wilayah): ?>
                                                    <li class="sidebar-item text-light"><a href="<?php echo base_url('laporanstok/'.$datalokasi->namalokasi) ?>" class="sidebar-link"><span
                                                        class="hide-menu text-light"> <?php echo $datalokasi->namalokasi ?>
                                                    </span></a>
                                                </li>
                                                <?php endif ?>
                                        <?php endforeach ?>
                                        </ul>
                                    </li>
                                <?php endforeach ?>
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap text-light"><span class="hide-menu text-light">Kelola Akun</span></li>
                <li class="sidebar-item text-light"> <a class="sidebar-link sidebar-link text-light" href="<?php echo base_url('kelolaakun') ?>"
                    aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                    class="hide-menu text-light">Kelola Akun</span></a></li>

                    <li class="list-divider"></li>
                    <li class="nav-small-cap text-light"><span class="hide-menu text-light">Kelola Lokasi Stok</span></li>
                    <li class="sidebar-item text-light"> <a class="sidebar-link sidebar-link text-light" href="<?php echo base_url('kelolagudang') ?>"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                        class="hide-menu text-light">Kelola Lokasi Stok</span></a></li>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap text-light"><span class="hide-menu text-light">Kelola Lokasi</span></li>
                        <li class="sidebar-item text-light"> <a class="sidebar-link sidebar-link text-light" href="<?php echo base_url('kelolalokasi') ?>"
                            aria-expanded="false"><i data-feather="map" class="feather-icon"></i><span
                            class="hide-menu text-light">Kelola Lokasi</span></a></li>

                            <li class="list-divider"></li>
                        <li class="nav-small-cap text-light"><span class="hide-menu text-light">Kelola Petugas</span></li>
                        <li class="sidebar-item text-light"> <a class="sidebar-link sidebar-link text-light" href="<?php echo base_url('kelolapetugas') ?>"
                            aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                            class="hide-menu text-light">Kelola Petugas</span></a></li>
                    <?php endif ?>
                    

                    <li class="list-divider"></li>
                    <li class="nav-small-cap text-light"><span class="hide-menu text-light">Ubah Password</span></li>
                    <li class="sidebar-item text-light"> <a class="sidebar-link sidebar-link text-light" href="<?php echo base_url('ubahpasswordakun') ?>"
                        aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                        class="hide-menu text-light">Ubah Password
                    </span></a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap text-light"><span class="hide-menu text-light">Log Out</span></li>
                <li class="sidebar-item text-light"> <a class="sidebar-link sidebar-link text-light" href="<?php echo base_url('logout') ?>"
                    aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                    class="hide-menu text-light">Logout</span></a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->