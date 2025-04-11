<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:35:16 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Joli admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Joli admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('assets/admin/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}" type="image/x-icon">
    <title>Joli - Dashboard</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/linearicon.css') }}">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/font-awesome.css') }}">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/themify.css') }}">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/ratio.css') }}">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/remixicon.css') }}">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/feather-icon.css') }}">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/animate.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vendors/bootstrap.css') }}">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/vector-map.css') }}">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendors/slick.css') }}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/css/style.css') }}">
</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        @include('admin.layouts.partials.header')
        <!-- Page Header Ends-->

        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            @include('admin.layouts.partials.sidebar')
            <!-- Page Sidebar Ends-->

            <!-- index body start -->
            <div class="page-body">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- Container-fluid Ends-->

                <!-- footer start-->
                @include('admin.layouts.partials.footer')
                <!-- footer End-->
            </div>
            <!-- index body end -->

        </div>
        <!-- Page Body End -->
    </div>
    <!-- page-wrapper End-->

    <!-- Modal Start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

    <!-- latest js -->
    <script src="{{ asset('assets/admin/js/jquery-3.6.0.min.js') }}"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/admin/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- feather icon js -->
    <script src="{{ asset('assets/admin/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- scrollbar simplebar js -->
    <script src="{{ asset('assets/admin/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scrollbar/custom.js') }}"></script>

    <!-- Sidebar jquery -->
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>

    <!-- tooltip init js -->
    <script src="{{ asset('assets/admin/js/tooltip-init.js') }}"></script>

    <!-- Plugins JS -->
    <script src="{{ asset('assets/admin/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/notify/index.js') }}"></script>

    <!-- Apexchar js -->
    <script src="{{ asset('assets/admin/js/chart/apex-chart/apex-chart1.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/admin/js/chart/apex-chart/chart-custom1.js') }}"></script>


    <!-- slick slider js -->
    <script src="{{ asset('assets/admin/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/custom-slick.js') }}"></script>

    <!-- customizer js -->
    <script src="{{ asset('assets/admin/js/customizer.js') }}"></script>

    <!-- ratio js -->
    <script src="{{ asset('assets/admin/js/ratio.js') }}"></script>

    <!-- sidebar effect -->
    <script src="{{ asset('assets/admin/js/sidebareffect.js') }}"></script>

    <!-- Theme js -->
    <script src="{{ asset('assets/admin/js/script.js') }}"></script>
</body>


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:35:33 GMT -->

</html>
