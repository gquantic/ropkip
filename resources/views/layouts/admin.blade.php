<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>@yield('title', 'Админ панель') | {{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body data-sidebar="dark">

<!-- <body data-layout="horizontal" data-topbar="dark"> -->

<!-- Begin page -->
<div id="layout-wrapper">


    <header id="page-topbar">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box text-center">
                    <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="/assets/images/logo-sm.png" alt="logo-sm-dark" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="/assets/images/logo-dark.png" alt="logo-dark" height="24">
                                </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="/assets/images/logo-sm.png" alt="logo-sm-light" height="22">
                                </span>
                        <span class="logo-lg">
                                    <img src="/assets/images/logo-light.png" alt="logo-light" height="24">
                                </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                    <i class="ri-menu-2-line align-middle"></i>
                </button>

                <!-- App Search-->
                <form class="app-search d-none d-lg-block">
                    <div class="position-relative">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="ri-search-line"></span>
                    </div>
                </form>
            </div>

            <div class="d-flex">

                <div class="dropdown d-inline-block d-lg-none ms-2">
                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ri-search-line"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                         aria-labelledby="page-header-search-dropdown">

                        <form class="p-3">
                            <div class="mb-3 m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit"><i class="ri-search-line"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

{{--                <div class="dropdown d-none d-sm-inline-block">--}}
{{--                    <button type="button" class="btn header-item waves-effect"--}}
{{--                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <img class="" src="/assets/images/flags/us.jpg" alt="Header Language" height="16">--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu dropdown-menu-end">--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <img src="/assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <img src="/assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <img src="/assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>--}}
{{--                        </a>--}}

{{--                        <!-- item-->--}}
{{--                        <a href="javascript:void(0);" class="dropdown-item notify-item">--}}
{{--                            <img src="/assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="dropdown d-none d-lg-inline-block ms-1">--}}
{{--                    <button type="button" class="btn header-item noti-icon waves-effect"--}}
{{--                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <i class="ri-apps-2-line"></i>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">--}}
{{--                        <div class="px-lg-2">--}}
{{--                            <div class="row g-0">--}}
{{--                                <div class="col">--}}
{{--                                    <a class="dropdown-icon-item" href="#">--}}
{{--                                        <img src="/assets/images/brands/github.png" alt="Github">--}}
{{--                                        <span>GitHub</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <a class="dropdown-icon-item" href="#">--}}
{{--                                        <img src="/assets/images/brands/bitbucket.png" alt="bitbucket">--}}
{{--                                        <span>Bitbucket</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <a class="dropdown-icon-item" href="#">--}}
{{--                                        <img src="/assets/images/brands/dribbble.png" alt="dribbble">--}}
{{--                                        <span>Dribbble</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row g-0">--}}
{{--                                <div class="col">--}}
{{--                                    <a class="dropdown-icon-item" href="#">--}}
{{--                                        <img src="/assets/images/brands/dropbox.png" alt="dropbox">--}}
{{--                                        <span>Dropbox</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <a class="dropdown-icon-item" href="#">--}}
{{--                                        <img src="/assets/images/brands/mail_chimp.png" alt="mail_chimp">--}}
{{--                                        <span>Mail Chimp</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <a class="dropdown-icon-item" href="#">--}}
{{--                                        <img src="/assets/images/brands/slack.png" alt="slack">--}}
{{--                                        <span>Slack</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="dropdown d-none d-lg-inline-block ms-1">--}}
{{--                    <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">--}}
{{--                        <i class="ri-fullscreen-line"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <div class="dropdown d-inline-block">--}}
{{--                    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"--}}
{{--                            data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        <i class="ri-notification-3-line"></i>--}}
{{--                        <span class="noti-dot"></span>--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"--}}
{{--                         aria-labelledby="page-header-notifications-dropdown">--}}
{{--                        <div class="p-3">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col">--}}
{{--                                    <h6 class="m-0"> Notifications </h6>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <a href="#!" class="small"> View All</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div data-simplebar style="max-height: 230px;">--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="flex-shrink-0 me-3">--}}
{{--                                        <div class="avatar-xs">--}}
{{--                                                    <span class="avatar-title bg-primary rounded-circle font-size-16">--}}
{{--                                                        <i class="ri-shopping-cart-line"></i>--}}
{{--                                                    </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">--}}
{{--                                        <h6 class="mb-1">Your order is placed</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">If several languages coalesce the grammar</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="flex-shrink-0 me-3">--}}
{{--                                        <img src="/assets/images/users/avatar-3.jpg" class="rounded-circle avatar-xs" alt="user-pic">--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">--}}
{{--                                        <h6 class="mb-1">James Lemire</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">It will seem like simplified English.</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="flex-shrink-0 me-3">--}}
{{--                                        <div class="avatar-xs">--}}
{{--                                                    <span class="avatar-title bg-success rounded-circle font-size-16">--}}
{{--                                                        <i class="ri-checkbox-circle-line"></i>--}}
{{--                                                    </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">--}}
{{--                                        <h6 class="mb-1">Your item is shipped</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">If several languages coalesce the grammar</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 3 min ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}

{{--                            <a href="" class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="flex-shrink-0 me-3">--}}
{{--                                        <img src="/assets/images/users/avatar-4.jpg" class="rounded-circle avatar-xs" alt="user-pic">--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">--}}
{{--                                        <h6 class="mb-1">Salena Layfield</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>--}}
{{--                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> 1 hours ago</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="p-2 border-top">--}}
{{--                            <div class="d-grid">--}}
{{--                                <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">--}}
{{--                                    <i class="mdi mdi-arrow-right-circle me-1"></i> View More..--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="dropdown d-inline-block user-dropdown">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="/assets/images/users/avatar-2.jpg"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ms-1">Kevin</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="ri-wallet-2-line align-middle me-1"></i> My Wallet</a>
                        <a class="dropdown-item d-block" href="#"><span class="badge bg-success float-end mt-1">11</span><i class="ri-settings-2-line align-middle me-1"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                    </div>
                </div>

                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-cog"></i>
                    </button>
                </div>

            </div>
        </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <ul id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title">Menu</li>

                    <li>
                        <a href="/admin" class="waves-effect">
                            <i class="mdi mdi-home-variant-outline"></i><span
                                class="badge rounded-pill bg-primary float-end">3</span>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/calendar" class=" waves-effect">
                            <i class="mdi mdi-calendar-outline"></i>
                            <span>Календарь</span>
                        </a>
                    </li>

                    <li>
                        <a href="/admin/users/" class="waves-effect">
                            <i class="mdi mdi-account-circle-outline"></i>
                            <span>Пользователи</span>
                        </a>
{{--                        <ul class="sub-menu" aria-expanded="false">--}}
{{--                            <li><a href="email-inbox.html">Inbox</a></li>--}}
{{--                            <li><a href="email-read.html">Read Email</a></li>--}}
{{--                            <li><a href="email-compose.html">Email Compose</a></li>--}}
{{--                        </ul>--}}
                    </li>

                    <li class="menu-title">Данные</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-email-outline"></i>
                            <span>Почтовая база</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="auth-login.html">Отправить письмо</a></li>
                            <li><a href="auth-login.html">Рассылка</a></li>
                            <li><a href="auth-register.html">Все почтовые адреса</a></li>
                            <li><a href="auth-recoverpw.html">История рассылок</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-format-page-break"></i>
                            <span>Документы</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="pages-starter.html">Создать документ</a></li>
                            <li><a href="pages-maintenance.html">На печати</a></li>
                            <li><a href="pages-404.html">Запросы на ожидании</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Курсы</li>

                    <li>
                        <a href="{{ route('a_category.index') }}" class="waves-effect">
                            <i class="mdi mdi-cube"></i>
                            <span>Категории @if(\App\Models\Category::query()->count() == 0) <b class="badge badge-soft-danger">Для начала создайте категории!</b> @endif</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('courses.index') }}" class="waves-effect">
                            <i class="mdi mdi-book"></i>
                            <span>Курсы</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-book-education"></i>
                            <span>Тесты</span>
                        </a>

                        <ul class="sub-menu" aria-expanded="false">
                                <li><a href="pages-404.html">Тесты</a></li>
                                <li><a href="pages-404.html">Вопросы</a></li>
                        </ul>
                    </li>

                    <li class="menu-title">Продажи</li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-book-account"></i>
                            <span>Продажи курсов</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="mdi mdi-file-document"></i>
                            <span>Заказы документов</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">@yield('title', 'Администраторская панель')</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="/admin/">Панель</a></li>
                                    <li class="breadcrumb-item active">@yield('title', 'Администраторская панель')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @yield('content')
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>document.write(new Date().getFullYear())</script> © Upzet.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">
        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Settings</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Choose Layouts</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="/assets/images/layouts/layout-1.png" class="img-thumbnail" alt="layout-1">
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="light-mode-switch" checked>
                <label class="form-check-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="/assets/images/layouts/layout-2.png" class="img-thumbnail" alt="layout-2">
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input theme-choice" type="checkbox" id="dark-mode-switch" data-bsStyle="/assets/css/bootstrap-dark.min.css" data-appStyle="/assets/css/app-dark.min.css">
                <label class="form-check-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="/assets/images/layouts/layout-3.png" class="img-thumbnail" alt="layout-3">
            </div>
            <div class="form-check form-switch mb-5">
                <input class="form-check-input theme-choice" type="checkbox" id="rtl-mode-switch" data-appStyle="/assets/css/app-rtl.min.css">
                <label class="form-check-label" for="rtl-mode-switch">RTL Mode</label>
            </div>


        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>

        @stack('scripts')
</body>
</html>
