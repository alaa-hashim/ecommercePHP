<?php 
function style(){ ?>
        <meta charset="utf-8" />
        <title>Dashboard | Qovex - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- jquery.vectormap css -->
        <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet"
            type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style"  rel="stylesheet" type="text/css" />

<?php }

function headerbar(){ ?> <div class="container-fluid">
                        <div class="float-end">

                            <div class="dropdown d-inline-block d-lg-none ms-2">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-search-dropdown">

                                    <form class="p-3">
                                        <div class="m-0">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search ..."
                                                    aria-label="Recipient's username">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit"><i
                                                            class="mdi mdi-magnify"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="dropdown d-none d-sm-inline-block">
                                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img class="" src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span
                                            class="align-middle">Spanish</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span
                                            class="align-middle">German</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span
                                            class="align-middle">Italian</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span
                                            class="align-middle">Russian</span>
                                    </a>
                                </div>
                            </div>

                            <div class="dropdown d-none d-lg-inline-block ms-1">
                                <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                    <i class="mdi mdi-fullscreen"></i>
                                </button>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item noti-icon waves-effect"
                                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="mdi mdi-bell-outline"></i>
                                    <span class="badge rounded-pill bg-danger ">3</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                    aria-labelledby="page-header-notifications-dropdown">
                                    <div class="p-3">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h6 class="m-0"> Notifications </h6>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#!" class="small"> View All</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-simplebar style="max-height: 230px;">
                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                        <i class="bx bx-cart"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">Your order is placed</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs"
                                                    alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">James Lemire</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">It will seem like simplified English.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar-xs me-3">
                                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">Your item is shipped</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        <a href="" class="text-reset notification-item">
                                            <div class="d-flex align-items-start">
                                                <img src="assets/images/users/avatar-4.jpg" class="me-3 rounded-circle avatar-xs"
                                                    alt="user-pic">
                                                <div class="flex-1">
                                                    <h6 class="mt-0 mb-1">Salena Layfield</h6>
                                                    <div class="font-size-12 text-muted">
                                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="p-2 border-top d-grid">
                                        <a class="btn btn-sm btn-link font-size-14 " href="javascript:void(0)">
                                            <i class="mdi mdi-arrow-right-circle me-1"></i> View More..
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-2.jpg"
                                        alt="Header Avatar">
                                    <span class="d-none d-xl-inline-block ms-1">Patrick</span>
                                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#"><i class="bx bx-user font-size-16 align-middle me-1"></i>
                                        Profile</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-wallet font-size-16 align-middle me-1"></i> My
                                        Wallet</a>
                                    <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end">11</span><i
                                            class="bx bx-wrench font-size-16 align-middle me-1"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="bx bx-lock-open font-size-16 align-middle me-1"></i>
                                        Lock screen</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="#"><i
                                            class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                                </div>
                            </div>

                            <div class="dropdown d-inline-block">
                                <button  type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                    <i class="mdi mdi-settings-outline"></i>
                                </button>
                            </div>

                        </div>
                        <div>
                            <!-- LOGO -->
                            <div class="navbar-brand-box">
                                <a href="index.html" class="logo logo-dark">
                                    <span class="logo-sm">
                                        <img src="assets/images/logo-sm.png" alt="" height="20">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-dark.png" alt="" height="17">
                                    </span>
                                </a>

                                <a href="index.html" class="logo logo-light">
                                    <span class="logo-sm">
                                        <img src="assets/images/logo-sm.png" alt="" height="20">
                                    </span>
                                    <span class="logo-lg">
                                        <img src="assets/images/logo-light.png" alt="" height="19">
                                    </span>
                                </a>
                            </div>

                            <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                                id="vertical-menu-btn">
                                <i class="fa fa-fw fa-bars"></i>
                            </button>

                            <!-- App Search-->
                            <form class="app-search d-none d-lg-inline-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="bx bx-search-alt"></span>
                                </div>
                            </form>

                            <div class="dropdown dropdown-mega d-none d-lg-inline-block ms-2">
                                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                                    aria-haspopup="false" aria-expanded="false">
                                    Mega Menu
                                    <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu dropdown-megamenu">
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5 class="font-size-14 mt-0">UI Components</h5>
                                                    <ul class="list-unstyled megamenu-list text-muted">
                                                        <li>
                                                            <a href="javascript:void(0);">Lightbox</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Range Slider</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Sweet Alert</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Rating</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Forms</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Tables</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Charts</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5 class="font-size-14 mt-0">Applications</h5>
                                                    <ul class="list-unstyled megamenu-list">
                                                        <li>
                                                            <a href="javascript:void(0);">Ecommerce</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Calendar</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Email</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Projects</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Tasks</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Contacts</a>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="col-md-4">
                                                    <h5 class="font-size-14 mt-0">Extra Pages</h5>
                                                    <ul class="list-unstyled megamenu-list">
                                                        <li>
                                                            <a href="javascript:void(0);">Light Sidebar</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Compact Sidebar</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Horizontal layout</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Maintenance</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Coming Soon</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">Timeline</a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:void(0);">FAQs</a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h5 class="font-size-14 mt-0">Components</h5>
                                                    <div class="px-lg-2">
                                                        <div class="row g-0">
                                                            <div class="col">
                                                                <a class="dropdown-icon-item" href="#">
                                                                    <img src="assets/images/brands/github.png" alt="Github">
                                                                    <span>GitHub</span>
                                                                </a>
                                                            </div>
                                                            <div class="col">
                                                                <a class="dropdown-icon-item" href="#">
                                                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                                    <span>Bitbucket</span>
                                                                </a>
                                                            </div>
                                                            <div class="col">
                                                                <a class="dropdown-icon-item" href="#">
                                                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                                    <span>Dribbble</span>
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <div class="row g-0">
                                                            <div class="col">
                                                                <a class="dropdown-icon-item" href="#">
                                                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                                    <span>Dropbox</span>
                                                                </a>
                                                            </div>
                                                            <div class="col">
                                                                <a class="dropdown-icon-item" href="#">
                                                                    <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                                                    <span>Mail Chimp</span>
                                                                </a>
                                                            </div>
                                                            <div class="col">
                                                                <a class="dropdown-icon-item" href="#">
                                                                    <img src="assets/images/brands/slack.png" alt="slack">
                                                                    <span>Slack</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div>
                                                        <div class="card text-white mb-0 overflow-hidden text-white-50"
                                                            style="background-image: url('assets/images/megamenu-img.png');background-size: cover;">
                                                            <div class="card-img-overlay"></div>
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <h4 class="text-white mb-3">Sale</h4>

                                                                        <h5 class="text-white-50">Up to <span
                                                                                class="font-size-24 text-white">50 %</span> Off</h5>
                                                                        <p>At vero eos accusamus et iusto odio.</p>
                                                                        <div class="mb-4">
                                                                            <a href="#" class="btn btn-success btn-sm">View more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

<?php }

function sidebar(){ ?>
<ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span class="badge rounded-pill bg-info float-end">2</span>
                        <span>Dashboard</span>
                    </a>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-flip-horizontal"></i>
                        <span>Layouts</span>
                    </a>
                   

                </li>

                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="mdi mdi-calendar-text"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-inbox-full"></i>
                        <span>Email</span>
                    </a>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="">
                        <i class="mdi mdi-calendar-check"></i>
                        <span>Tasks</span>
                    </a>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Pages</span>
                    </a>
                    
                </li>

                <li class="menu-title">Components</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                        <span>UI Elements</span>
                    </a>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <i class="mdi mdi-newspaper"></i>
                        <span class="badge rounded-pill bg-danger float-end">6</span>
                        <span>Forms</span>
                    </a>
                    

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>Tables</span>
                    </a>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-chart-donut"></i>
                        <span>Charts</span>
                    </a>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-emoticon-happy-outline"></i>
                        <span>Icons</span>
                    </a>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-map-marker-outline"></i>
                        <span>Maps</span>
                    </a>
                    
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-tree"></i>
                        <span>Multi Level</span>
                    </a>
                    
                </li>

            </ul>
<?php }

function mobileMenu(){ ?>

           <div class="mobile-menu-active clickalbe-sidebar-wrapper-style-1">
            <div class="clickalbe-sidebar-wrap">
                <a class="sidebar-close"><i class="icofont-close-line"></i></a>
                <div class="mobile-menu-content-area sidebar-content-100-percent">
                    <div class="mobile-search">
                        <form class="search-form" action="#">
                            <input type="text" placeholder="Search here…">
                            <button class="button-search"><i class="icofont-search-1"></i></button>
                        </form>
                    </div>
                    <div class="clickable-mainmenu-wrap clickable-mainmenu-style1">
                        <nav>
                            <ul>
                                <li class="has-sub-menu"><a href="index.php">Home</a>
                                    <ul class="sub-menu-2">
                                        <li class="has-sub-menu"><a href="#">Demo Group #01</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="index.php">Home Multipurpose</a></li>
                                                <li><a href="index-megashop.php">Home Mega Shop</a></li>
                                                <li><a href="index-fashion.php">Home Fashion</a></li>
                                                <li><a href="index-fashion-2.php">Home Fashion 2 </a></li>
                                                <li><a href="index-automobile.php">Home Automobile</a></li>
                                                <li><a href="index-furniture.php">Home Furniture</a></li>
                                                <li><a href="index-electric.php">Home Electric</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Demo Group #02</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="index-electric-2.php">Home Electric 2</a></li>
                                                <li><a href="index-handcraft.php">Home Hand Craft</a></li>
                                                <li><a href="index-book.php">Home Book</a></li>
                                                <li><a href="index-book-2.php">Home Book 2</a></li>
                                                <li><a href="index-cake.php">Home cake</a></li>
                                                <li><a href="index-organic.php">Home Organic</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Demo Group #03</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="index-flower.php">Home Flower</a></li>
                                                <li><a href="index-treeplant.php">Home Tree plant</a></li>
                                                <li><a href="index-pet-food.php">Home Pet Food</a></li>
                                                <li><a href="index-kids.php">Home Kids</a></li>
                                                <li><a href="index-kids-2.php">Home Kids 2</a></li>
                                                <li><a href="index-kids-3.php">Home Kids 3</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub-menu"><a href="#">shop</a>
                                    <ul class="sub-menu-2">
                                        <li class="has-sub-menu"><a href="#">Shop Layout</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="shop.php">Shop Grid Style 1</a></li>
                                                <li><a href="shop-2.php">Shop Grid Style 2</a></li>
                                                <li><a href="shop-3.php">Shop Grid Style 3</a></li>
                                                <li><a href="shop-4.php">Shop Grid Style 4</a></li>
                                                <li><a href="shop-5.php">Shop Grid Style 5</a></li>
                                                <li><a href="shop-6.php">Shop Grid Style 6</a></li>
                                                <li><a href="shop-list.php">Shop List Style 1</a></li>
                                                <li><a href="shop-list-no-sidebar.php">Shop List Style 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Product Layout</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="product-details.php">Product Layout 1</a></li>
                                                <li><a href="product-details-2.php">Product Layout 2</a></li>
                                                <li><a href="product-details-3.php">Product Layout 3</a></li>
                                                <li><a href="product-details-4.php">Product Layout 4</a></li>
                                                <li><a href="product-details-5.php">Product Layout 5</a></li>
                                                <li><a href="product-details-6.php">Product Layout 6</a></li>
                                                <li><a href="product-details-7.php">Product Layout 7</a></li>
                                                <li><a href="product-details-8.php">Product Layout 8</a></li>
                                                <li><a href="product-details-9.php">Product Layout 9</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-sub-menu"><a href="#">Shop Page</a>
                                            <ul class="sub-menu-2">
                                                <li><a href="my-account.php">My Account</a></li>
                                                <li><a href="checkout.php">Check Out</a></li>
                                                <li><a href="cart.php">Shopping Cart</a></li>
                                                <li><a href="wishlist.php">Wishlist</a></li>
                                                <li><a href="order-tracking.php">Order Tracking</a></li>
                                                <li><a href="compare.php">Compare</a></li>
                                                <li><a href="store.php">Store</a></li>
                                                <li><a href="empty-cart.php">Empty Cart</a></li>
                                                <li><a href="login-register.php">login / register</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-sub-menu"><a href="#">Pages</a>
                                    <ul class="sub-menu-2">
                                        <li><a href="about-us.php">About Us</a></li>
                                        <li><a href="contact-us.php">Contact Us</a></li>
                                        <li><a href="contact-us-2.php">Contact Us 2</a></li>
                                        <li><a href="404.php">404 Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop.php">Collections</a></li>
                                <li class="has-sub-menu"><a href="#">Blog</a>
                                    <ul class="sub-menu-2">
                                        <li><a href="blog.php">Blog Page</a></li>
                                        <li><a href="blog-no-sidebar.php">Blog No sidebar</a></li>
                                        <li><a href="blog-right-sidebar.php">Blog Right Sidebar</a></li>
                                        <li><a href="blog-details.php">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-curr-lang-wrap">
                        <div class="single-mobile-curr-lang">
                            <a class="mobile-language-active" href="#">Language <i class="icofont-simple-down"></i></a>
                            <div class="lang-curr-dropdown lang-dropdown-active">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Spanish</a></li>
                                    <li><a href="#">Hindi </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="aside-contact-info">
                        <ul>
                            <li><i class="icofont-clock-time"></i>Monday - Friday: 9:00 - 19:00</li>
                            <li><i class="icofont-envelope"></i>Info@example.com</li>
                            <li><i class="icofont-stock-mobile"></i>(+55) 254. 254. 254</li>
                            <li><i class="icofont-home"></i>Helios Tower 75 Tam Trinh Hoang - Ha Noi - Viet Nam</li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>

<?php }

function footer(){ ?>
    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Qovex.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>

<?php }
function scripts() { ?>   <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <script src="assets/js/app.js"></script>


<?php }

function getAllData1($table, $where = null, $values = null, )
{
    global $con;
    $data = array();
    if ($where == null) {
        $stmt = $con->prepare("SELECT  * FROM $table   ");
    } else {
        $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    }
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    
        if ($count > 0) {
             print_r( $data);
        } else {
            echo json_encode(array("status" => "failure"));
        }
        return $count;
     
}

?>