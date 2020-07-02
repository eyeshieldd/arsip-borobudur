<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex, nofollow" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=base_url('assets/favicon/favicon-32x32.png')?>">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=base_url('assets/favicon/favicon-96x96.png')?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/favicon/favicon-16x16.png')?>">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>
        <?php echo isset($SYS_TITLE) && !empty($SYS_TITLE) ? $SYS_TITLE : 'Circle Labs Control Panel' ?>
    </title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/operator/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/operator/plugins/datatables.net-bs4/css/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/operator/plugins/datatables.net-bs4/css/buttons.bootstrap4.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/global/toastr/toastr.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/global/jquery-confirm-master/dist/jquery-confirm.min.css') ?>">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/operator/css/style.css') ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url('assets/operator/css/colors/blue.css') ?>" id="theme" rel="stylesheet">
    <?php echo isset($FILE_CSS) ? $FILE_CSS : ''; ?>
</head>

<body class="fix-header card-no-border fix-sidebar">
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?= site_url('dashboard') ?>">
                        <!-- Logo icon -->
                        <b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url('assets/image/logo-icon.png') ?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url('assets/image/logo-light-icon.png') ?>" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span>
                            <!-- dark Logo text -->
                            <img src="<?= base_url('assets/image/logo-text.png') ?>" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="<?= base_url('assets/image/logo-light-text.png') ?>" class="light-logo" alt="homepage" /></span> </a>
                        </div>
                        <div class="navbar-collapse">
                            <ul class="navbar-nav mr-auto mt-md-0 ">
                                <!-- This is  -->
                                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="icon-arrow-left-circle"></i></a> </li>
                            </ul>
                            <!-- ============================================================== -->
                            <!-- User profile and search -->
                            <!-- ============================================================== -->
                            <ul class="navbar-nav my-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/image/1.jpg') ?>" alt="user" class="profile-pic" /></a>
                                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                        <ul class="dropdown-user">
                                            <li>
                                                <div class="dw-user-box">
                                                    <div class="u-img"><img src="<?= base_url('assets/image/1.jpg') ?>" alt="user"></div>
                                                    <div class="u-text">
                                                        <h4><?= $SESI['username'] ?></h4>
                                                        <p class="text-muted"><?= $SESI['email'] ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="<?= site_url('change_password') ?>"><i class="fa fa-asterisk"></i> Change Password</a></li>
                                            <li><a href="<?= site_url('auth/logout') ?>"><i class="fa fa-power-off"></i> Logout</a></li>
                                        </ul>
                                    </div>
                                </li>
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
                <aside class="left-sidebar">
                    <!-- Sidebar scroll-->
                    <div class="scroll-sidebar">
                        <!-- Sidebar navigation-->
                        <nav class="sidebar-nav">
                            <ul id="sidebarnav">
                                <?php
                                echo isset($TPL_SIDEMENU) && !empty($TPL_SIDEMENU) ? $TPL_SIDEMENU : 'Side menu belum di-load';
                                ?>
                            </ul>
                        </nav>
                        <!-- End Sidebar navigation -->
                    </div>
                    <!-- End Sidebar scroll-->
                    <!-- Bottom points-->
                    <div class="sidebar-footer">
                        <!-- item-->
                        <a href="<?=site_url('auth/logout')?>" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                    </div>
                    <!-- End Bottom points-->
                </aside>
                <div class="page-wrapper">
                    <div class="container-fluid">
                        <?php
                        isset($TPL_ISI) ? $this->load->view($TPL_ISI) : 'Index belum di-load';
                        ?>
                        <footer class="footer">
                            © 2019 Memory of The World by <a href="http://borobudurpedia.id">Balai Konservasi Borobudur</a>
                        </footer>
                    </div>
                </div>
                <script src="<?= base_url('assets/operator/plugins/jquery/jquery.min.js') ?>"></script>
                <!-- Bootstrap tether Core JavaScript -->
                <script src="<?= base_url('assets/operator/plugins/bootstrap/js/popper.min.js') ?>"></script>
                <script src="<?= base_url('assets/operator/plugins/bootstrap/js/bootstrap.min.js') ?>"></script>
                <!-- slimscrollbar scrollbar JavaScript -->
                <script src="<?= base_url('assets/operator/js/jquery.slimscroll.js') ?>"></script>
                <!--Wave Effects -->
                <script src="<?= base_url('assets/operator/js/waves.js') ?>"></script>
                <!--Menu sidebar -->
                <script src="<?= base_url('assets/operator/js/sidebarmenu.js') ?>"></script>
                <!--stickey kit -->
                <script src="<?= base_url('assets/operator/plugins/sticky-kit-master/dist/sticky-kit.min.js') ?>"></script>
                <!--Custom JavaScript -->
                <script src="<?= base_url('assets/operator/js/custom.min.js') ?>"></script>
                <script src="<?= base_url('assets/operator/js/circlelabs-custom.js') ?>"></script>
                <!-- <script src="<?= base_url('assets/operator/plugins/styleswitcher/jQuery.style.switcher.js') ?>"></script> -->
                <script src="<?= base_url('assets/operator/plugins/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
                <script src="<?= base_url('assets/operator/plugins/datatables.net/js/dataTables.buttons.min.js') ?>"></script>
                <script src="<?= base_url('assets/operator/js/jspdf.min.js') ?>"></script>
                <script src="<?= base_url('assets/global/toastr/toastr.min.js') ?>"></script>
                <script src="<?= base_url('assets/global/jquery-confirm-master/dist/jquery-confirm.min.js') ?>"></script>
                <script type="text/javascript">
                    $(document).ajaxComplete(
                        function(event, request, options) {
                            if (request.responseText == "login_required") {
                                window.location.href = "<?= site_url('auth') ?>";
                            }
                        }
                        );

                    $.ajaxSetup({
                        headers: {
                            <?= '"' . $this->security->get_csrf_token_name() . '":"' . $this->security->get_csrf_hash() . '"' ?>
                        }
                    });
                    $.fn.dataTable.ext.errMode = 'none';
                    $.extend(true, $.fn.dataTable.defaults, {
                        "autoWidth": true,
                        "oLanguage": {
                            "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                        },
                        "language": {
                            "url": "<?= base_url('assets/operator/plugins/bower_components/datatables/indonesia.json') ?>"
                        },
                        "processing": true,
                        "searchDelay": 2000,
                        "serverSide": true,
                        "ordering": false,
                        "order": []
                    });
                </script>
                <?php
                echo isset($FILE_JS) ? $FILE_JS : '';
                isset($TPL_FOOTER) && !empty($TPL_FOOTER) ? $this->load->view($TPL_FOOTER) : ''; ?>
            </body>

            </html>