<!DOCTYPE html>
<html lang="en">
<?php include '../../configuracoes.php'; 
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Cemiterio Virtual</title>
    <link href="../assets/node_modules/horizontal-timeline/css/horizontal-timeline.css" rel="stylesheet">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link href="../dist/css/pages/timeline-vertical-horizontal.css" rel="stylesheet">

</head>
<!-- Footable -->
<script src="../assets/node_modules/footable/js/footable.all.min.js"></script>
    <!--FooTable init-->
    <script src="../dist/js/pages/footable-init.js"></script>
<body class="skin-default fixed-layout" id="bodyPrincipal">
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
            <input id="logado" value="1">
        </div>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                    <b>
                    <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>
                        <!--End Logo icon -->
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="d-none d-md-block d-lg-block">
                            <a href="javascript:void(0)" class="p-l-15">
                                <!--This is logo text-->
                                <img src="../assets/images/logo-light-text.png" alt="home" class="light-logo" alt="home" />
                            </a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="user-img"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                                <div class="mail-contnet">
                                                    <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                            </a>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down">Mark &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="login.php" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light" href="javascript:void(0)"><i class="ti-arrow-right ti-arrow-left"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="side-mini-panel">
            <ul class="mini-nav">
                <div class="togglediv"><a href="javascript:void(0)" id="togglebtn"><i class="ti-menu"></i></a></div>
                <!-- .Dashboard -->
                <li>
                    <a href="javascript:void(0)"><i class="icon-speedometer"></i></a>
                    <div class="sidebarmenu">
                        <!-- Left navbar-header -->
                        <h3 class="menu-title">Dashboard</h3>
                        <div class="searchable-menu">
                            <form role="search" class="menu-search">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </div>
                        <ul class="sidebar-menu">
                            <li><a href="index.php">Minimal </a></li>
                            <li><a href="index2.php">Analytical</a></li>
                            <li><a href="index3.php">Demographical</a></li>
                            <li><a href="index4.php">Modern</a></li>
                        </ul>
                        <!-- Left navbar-header end -->
                    </div>
                </li>
                <!-- /.Dashboard -->
                <!-- .Apps -->
                <li class=""><a href="javascript:void(0)" title="Album"><i class="fa fa-camera"></i></a>
                    <div class="sidebarmenu">
                        <!-- Left navbar-header -->
                        <h3 class="menu-title">Administrador</h3>
                        <div class="searchable-menu">
                            <form role="search" class="menu-search">
                                <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> 
                            </form>
                        </div>
                        <ul class="sidebar-menu">
                            <li><a href="javascript:void(0)">Album <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul class="sub-menu">
                                    <li><a href="../album/index.php?status=cadastrar">Cadastrar</a></li>
                                    <li><a href="../album/modificar.php?status=editar">Editar/Remover</a></li>
                                </ul>
                            </li>   
                            <li><a href="javascript:void(0)">Status <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul class="sub-menu">
                                    <li><a href="../status/index.php?status=cadastrar">Cadastrar</a></li>
                                    <li><a href="../status/modificar.php?status=editar">Editar/Remover</a></li>
                                </ul>
                            </li> 
                            <li><a href="javascript:void(0)">Categoria Animal <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul class="sub-menu">
                                    <li><a href="../categoriaAnimal/index.php?status=cadastrar">Cadastrar</a></li>
                                    <li><a href="../categoriaAnimal/modificar.php?status=editar">Editar/Remover</a></li>
                                </ul>
                            </li> 
                            <li><a href="javascript:void(0)">Categoria Usuário <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul class="sub-menu">
                                    <li><a href="../categoriaUsuario/index.php?status=cadastrar">Cadastrar</a></li>
                                    <li><a href="../categoriaUsuario/modificar.php?status=editar">Editar/Remover</a></li>
                                </ul>
                            </li>  
                            <li><a href="javascript:void(0)">Usuário <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul class="sub-menu">
                                    <li><a href="../usuario/index.php?status=cadastrar">Cadastrar</a></li>
                                    <li><a href="../usuario/modificar.php?status=editar">Editar/Remover</a></li>
                                    <li><a href="../usuario/listarMensalidades.php">Listar Usuários com Mensalidade em Dia</a></li>
                                    <li><a href="../usuario/listarPlanos.php">Listar Usuários com Melhores Planos</a></li>
                                </ul>
                            </li>   
                            <li><a href="javascript:void(0)">Pets <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul class="sub-menu">
                                    <li><a href="../pets/index.php?status=cadastrar">Cadastrar</a></li>
                                    <li><a href="../pets/modificar.php?status=editar">Editar/Remover</a></li>
                                </ul>
                            </li> 
                            <li><a href="javascript:void(0)">Porte Fisico <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul class="sub-menu">
                                    <li><a href="../porteFisico/index.php?status=cadastrar">Cadastrar</a></li>
                                    <li><a href="../porteFisico/modificar.php?status=editar">Editar/Remover</a></li>
                                </ul>
                            </li>   
                            <li><a href="javascript:void(0)">Raça Animal <span class="badge badge-pill badge-success pull-right">6</span></a>
                                <ul class="sub-menu">
                                    <li><a href="../racaAnimal/index.php?status=cadastrar">Cadastrar</a></li>
                                    <li><a href="../racaAnimal/modificar.php?status=editar">Editar/Remover</a></li>
                                </ul>
                            </li>                         
                        </ul>
                    </div>
                </li>


            </ul>
        </div>
        <div class="page-wrapper">
            <div class="container-fluid">