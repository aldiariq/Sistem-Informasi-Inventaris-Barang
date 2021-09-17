<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>/assets/images/logo_kai.png">
    <title>Sistem Inventaris Barang Unit Sistem Inventory DIVRE III Palembang</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>/dist/css/style.min.css" rel="stylesheet">
    
    <link href="<?php echo base_url() ?>/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/css/stylewarna.css" rel="stylesheet">
    <style type="text/css">

        .scroll-sidebar .ps-scrollbar-y {
            background-color: white;
        }
        .carousel-caption h3 {
            background:rgba(255, 255, 255, 0.8); 
            box-shadow: (0, 0,0, 0.2);
            color:#468;
            width: 220px;
            text-align: justify;
        }
        .carousel-caption h4{
            background:rgba(255, 255, 255, 0.8); 
            box-shadow: (0, 0,0, 0.2);
            color:#468;
            width: 200px;
            text-align: justify;
        }
        .marq{
            font-weight: bold;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href=<?php echo base_url('admin') ?>
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="<?php echo base_url() ?>/assets/images/logo_kai.jpg" alt="homepage" class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="<?php echo base_url() ?>/assets/images/logo_kai.jpg" alt="homepage" class="light-logo" />
                            </b>
                            <!--End Logo icon -->
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav float-left">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <?php foreach ($akun as $dataakun): ?>
                            <?php if ($dataakun->akses == 'ADMIN'): ?>
                               <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="<?php echo base_url('notif') ?>">
                                    <span><i data-feather="bell" class="text-light svg-icon"></i></span>
                                    <span class="badge badge-primary notify-no rounded-circle"><?php echo $this->ModelAdmin->fungsihitungNotifadmin()?></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            
                        </li>
                            <?php endif ?>
                        <?php endforeach ?>

                        <?php foreach ($akun as $dataakun): ?>
                            <?php if ($dataakun->akses == 'USER'): ?>
                               <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="<?php echo base_url('notif') ?>">
                                    <span><i data-feather="bell" class="text-light svg-icon"></i></span>
                                    <span class="badge badge-primary notify-no rounded-circle"><?php echo $this->ModelAdmin->fungsihitungNotifuser($dataakun->kd_gudang)?></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            
                        </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <marquee direction="right"><ul class="navbar-nav float-left mr-auto ml-3 pl-1">

                       <h2><span class="navbar-item text-light" style="font-weight: bold">Sistem Inventaris Barang Unit Sistem Informasi DIVRE III Palembang</span></h2>
                    </ul></marquee>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo base_url() ?>/assets/images/users/images.png" alt="user" class="rounded-circle"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block">
                                    <?php foreach ($akun as $dataakun): ?>
                                        <span class="text-light"><?php echo $dataakun->username ?></span><i data-feather="chevron-down"class="svg-icon"></i>
                                    <?php endforeach ?>
                                    </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="<?php echo base_url('logout') ?>"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->