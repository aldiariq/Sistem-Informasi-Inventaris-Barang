
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
                                    <li class="breadcrumb-item"><h5 class="page-title text-truncate text-dark font-weight-medium mb-1"><a href="<?php echo base_url('admin') ?>" >Dashboard</a></h5>
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
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            
                               <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                                  </ol>
                                  <div class="carousel-inner">
                                    <div class="carousel-item active">
                                      <img class="d-block w-100" src="<?php echo base_url('assets/carousel/slide1.jpg') ?>" alt="First slide">
                                       <div class="carousel-caption d-none d-md-block  ">
                                        <h3>LIMA NILAI UTAMA :</h3>
                                        <h3>1. INTEGRITAS</h3>
                                       <!--  <h5>bertindak konsisten sesuai dengan nilai-nilai kebijakan organisasi dan kode etik perusahaan</h5> -->
                                         <a href="https://kai.id/corporate/about_kai/" target="_blank" class="btn btn-primary" >Read More About PT.KAI</a>
                                       </div>
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="<?php echo base_url('assets/carousel/slide2.jpg') ?>" alt="Second slide">
                                       <div class="carousel-caption d-none d-md-block  ">
                                        <h3>LIMA NILAI UTAMA :</h3>
                                        <h3>2. PROFESIONAL</h3>
                                        <!-- <h5>........</h5> -->
                                         <a href="https://kai.id/corporate/about_kai/" target="_blank" class="btn btn-primary" >Read More About PT.KAI</a>
                                       </div>
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="<?php echo base_url('assets/carousel/slide3.jpg') ?>" alt="Third slide">
                                       <div class="carousel-caption d-none d-md-block  ">
                                        <h3>LIMA NILAI UTAMA :</h3>
                                        <h3>3. KESELAMATAN</h3>
                                       <!--  <h5>...danger.....</h5> -->
                                         <a href="https://kai.id/corporate/about_kai/" target="_blank" class="btn btn-primary" >Read More About PT.KAI</a>
                                       </div>
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="<?php echo base_url('assets/carousel/slide4.jpg') ?>" alt="Four slide">
                                       <div class="carousel-caption d-none d-md-block  ">
                                        <h3>LIMA NILAI UTAMA :</h3>
                                        <h3>4. INOVASI</h3>
                                       <!--  <h5>.........</h5> -->
                                        <a href="https://kai.id/corporate/about_kai/" target="_blank" class="btn btn-primary" >Read More About PT.KAI</a>
                                       </div>
                                    </div>
                                    <div class="carousel-item">
                                      <img class="d-block w-100" src="<?php echo base_url('assets/carousel/slide5.jpg') ?>" alt="Four slide">
                                       <div class="carousel-caption d-none d-md-block  ">
                                        <h3>LIMA NILAI UTAMA :</h3>
                                        <h3>5. PELAYANAN PRIMA</h3>
                                        <a href="https://kai.id/corporate/about_kai/" target="_blank" class="btn btn-primary" >Read More About PT.KAI</a>
                                       </div>
                                    </div>
                                  </div>
                                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>
                                
                            </div>
                        
                    </div>
                </div>
                <div class="card-group">
                    <div class="card border-right ">
                        <div class="card-body bg-info">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-light mb-1 font-weight-medium"><?php echo $jumlahgudang ?></h2>
                                    </div>
                                    <h6 class="text-dark font-weight-medium mb-0 w-100 text-truncate">Jumlah Gudang</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-dark"><i class="fas fa-warehouse"></i></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body bg-info">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-light mb-1 font-weight-medium"><?php echo $jumlahlokasi ?></h2>
                                    </div>
                                    <h6 class="text-dark font-weight-medium mb-0 w-100 text-truncate">Jumlah Wilayah</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-dark"><i class="fas fa-globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body bg-info">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-light mb-1 w-100 text-truncate font-weight-medium"><?php echo $jumlahstasiun ?></h2>
                                    <h6 class="text-dark font-weight-medium mb-0 w-100 text-truncate">Jumlah Stasiun
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-dark"><i class=" fas fa-train "></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body bg-info">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-light mb-1 font-weight-medium"><?php echo $jumlahakun ?></h2>
                                    <h6 class="text-dark font-weight-medium mb-0 w-100 text-truncate">Jumlah Akun</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-dark"><i class="fas fa-user"></i></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
