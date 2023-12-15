<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, xtreme admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, material dashboard bootstrap 5 dashboard template"/>
        <meta name="description" content="Xtreme is powerful and clean admin dashboard template, inpired from Google's Material Design"/>
        <meta name="robots" content="noindex,nofollow" />
        <title>:: @yield('title'):: Newinfo POS</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/assets/images/favicon.png')}}" />
        <!-- font-awesome -->
        <link href="{{ asset('backend/assets/font-awesome/css/all.min.css')}}" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="{{ asset('backend/assets/extra-libs/css-chart/css-chart.css')}}" rel="stylesheet" />
        <link href="{{ asset('backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
        <!-- Custom CSS -->
        <link href="{{ asset('backend/assets/libs/tablesaw/dist/tablesaw.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.css')}}" />
        <link href="{{ asset('backend/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css') }}"/>
        <link
        rel="stylesheet" type="text/css" href="{{ asset('backend/assets/libs/select2/dist/css/select2.min.css')}}"/>
        <link href="{{ asset('backend/dist/css/style.min.css') }}" rel="stylesheet" />
        <link href=" {{ asset('backend/assets/toaster/toastr.css') }}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    </head>
    <body>
        <!-- -------------------------------------------------------------- -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- -------------------------------------------------------------- -->
        <div class="preloader">
            <svg
                class="tea lds-ripple" width="37" height="48" viewbox="0 0 37 48" fill="none" xmlns="http://www.w3.org/2000/svg" >
                <path d="M27.0819 17H3.02508C1.91076 17 1.01376 17.9059 1.0485 19.0197C1.15761 22.5177 1.49703 29.7374 2.5 34C4.07125 40.6778 7.18553 44.8868 8.44856 46.3845C8.79051 46.79 9.29799 47 9.82843 47H20.0218C20.639 47 21.2193 46.7159 21.5659 46.2052C22.6765 44.5687 25.2312 40.4282 27.5 34C28.9757 29.8188 29.084 22.4043 29.0441 18.9156C29.0319 17.8436 28.1539 17 27.0819 17Z"stroke="#2962FF" stroke-width="2" ></path>
                <path d="M29 23.5C29 23.5 34.5 20.5 35.5 25.4999C36.0986 28.4926 34.2033 31.5383 32 32.8713C29.4555 34.4108 28 34 28 34" stroke="#2962FF" stroke-width="2" ></path>
                <path id="teabag" fill="#2962FF" fill-rule="evenodd" clip-rule="evenodd" d="M16 25V17H14V25H12C10.3431 25 9 26.3431 9 28V34C9 35.6569 10.3431 37 12 37H18C19.6569 37 21 35.6569 21 34V28C21 26.3431 19.6569 25 18 25H16ZM11 28C11 27.4477 11.4477 27 12 27H18C18.5523 27 19 27.4477 19 28V34C19 34.5523 18.5523 35 18 35H12C11.4477 35 11 34.5523 11 34V28Z"></path>
                <path id="steamL" d="M17 1C17 1 17 4.5 14 6.5C11 8.5 11 12 11 12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#2962FF"></path>
                <path id="steamR" d="M21 6C21 6 21 8.22727 19 9.5C17 10.7727 17 13 17 13" stroke="#2962FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- -------------------------------------------------------------- -->
        <div id="main-wrapper">
            <!-- -------------------------------------------------------------- -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- -------------------------------------------------------------- -->
            @include('admin.body.header')
            <!-- -------------------------------------------------------------- -->
            <!-- End Topbar header -->
            <!-- -------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------- -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- -------------------------------------------------------------- -->
            @include('admin.body.sidebar')
            <!-- -------------------------------------------------------------- -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- -------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------- -->
            <!-- -------------------------------------------------------------- -->
            <!-- Page wrapper  -->
            <!-- -------------------------------------------------------------- -->
            <div class="page-wrapper">
                <!-- -------------------------------------------------------------- -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- -------------------------------------------------------------- -->
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">@yield('title')</h4>
                        </div>
                    </div>
                </div>
                <!-- -------------------------------------------------------------- -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- -------------------------------------------------------------- -->
                <!-- -------------------------------------------------------------- -->
                <!-- Container fluid  -->
                <!-- -------------------------------------------------------------- -->
                <div class="container-fluid">
                    @yield('admin')
                </div>
                <!-- -------------------------------------------------------------- -->
                <!-- End Container fluid  -->
                <!-- -------------------------------------------------------------- -->
                <!-- -------------------------------------------------------------- -->
                <!-- footer -->
                <!-- -------------------------------------------------------------- -->
                @include('admin.body.footer')
                <!-- -------------------------------------------------------------- -->
                <!-- End footer -->
                <!-- -------------------------------------------------------------- -->
            </div>
            <!-- -------------------------------------------------------------- -->
            <!-- End Page wrapper  -->
            <!-- -------------------------------------------------------------- -->
        </div>
        <!-- -------------------------------------------------------------- -->
        <!-- End Wrapper -->
        <!-- -------------------------------------------------------------- -->
        <!-- -------------------------------------------------------------- -->
        <!-- customizer Panel -->
        <!-- -------------------------------------------------------------- -->

        <div class="chat-windows"></div>
        <!-- Required Js files -->
        <!-- -------------------------------------------------------------- -->
        <script src="{{ asset('backend/assets/libs/jquery/dist/jquery.min.js')}}"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="{{ asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Theme Required Js -->
        <script src="{{ asset('backend/dist/js/app.min.js')}}"></script>
        <script src="{{ asset('backend/dist/js/app.init.js')}}"></script>
        <script src="{{ asset('backend/dist/js/app-style-switcher.js')}}"></script>
        <!-- perfect scrollbar JavaScript -->
        <script src="{{ asset('backend/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
        <script src="{{ asset('backend/assets/extra-libs/sparkline/sparkline.js')}}"></script>
        <!--Wave Effects -->
        <script src="{{ asset('backend/dist/js/waves.js')}}"></script>
        <!--Menu sidebar -->
        <script src="{{ asset('backend/dist/js/sidebarmenu.js')}}"></script>
        <!--Custom JavaScript -->
        <script src="{{ asset('backend/dist/js/feather.min.js')}}"></script>
        <script src="{{ asset('backend/dist/js/custom.min.js')}}"></script>

    <script src="{{ asset('backend/assets/libs/tablesaw/dist/tablesaw.jquery.js')}}"></script>
    <script src="{{ asset('backend/assets/libs/tablesaw/dist/tablesaw-init.js')}}"></script>

        <!--validation JavaScript -->
        <script src="{{ asset('backend/assets/validation/validate.min.js')}}"></script>
        <!--handlebars JavaScript -->
        <script src="{{ asset('backend/assets/handlebars/handlebars.js')}}"></script>
        <!--notify cdnjs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

        <!-- --------------------------------------------------------------- -->
        <!-- This page JavaScript -->
        <!-- --------------------------------------------------------------- -->
        <script src="{{ asset('backend/assets/libs/flot/excanvas.min.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/flot/jquery.flot.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
        <script src="{{ asset('backend/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js')}}"></script>
        <script src="{{ asset('backend/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script src="{{ asset('backend/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
        {{-- <script src="{{ asset('backend/dist/js/pages/dashboards/dashboard2.js')}}"></script> --}}
        <script src="{{ asset('backend/dist/js/pages/dashboards/dashboard5.js')}}"></script>
        <script src="{{ asset('backend/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('backend/dist/js/pages/datatable/datatable-basic.init.js') }}"></script>
        <!-- --------------------------------------------------------------- -->
        <script src="{{ asset('backend/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('backend/assets/libs/select2/dist/js/select2.min.js') }}"></script>
        <script src="{{ asset('backend/dist/js/pages/forms/select2/select2.init.js') }}"></script>
        <!-- -------------------------------------------------------------- -->

        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('backend/assets/sweetalert-code/code.js') }}"></script>

        {{-- toaster --}}
        <script  type="text/javascript" src="{{ asset('backend/assets/toaster/toastr.min.js') }}"></script>
        <script>
            @if (Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch (type) {
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
            @endif

        </script>
        <script src="{{ asset('backend/dist/js/pages/samplepages/jquery.PrintArea.js') }}"></script>
        <script>
          $(function () {
            $('#print').click(function () {
              var mode = 'iframe'; //popup
              var close = mode == 'popup';
              var options = {
                mode: mode,
                popClose: close,
              };
              $('div.printableArea').printArea(options);
            });
          });
        </script>
    </body>
</html>
