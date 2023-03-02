<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark"
    data-sidebar-size="lg" data-sidebar-image="none">

<head>

    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Laravel Backend Starter Template" name="description" />
    <meta content="Themesbrand" name="Shadhin Ahmed" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>


    <!-- Bootstrap Css -->
    <link href="/backend/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    {{-- Select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Filepond css -->
    <link rel="stylesheet" href="/backend/assets/libs/filepond/filepond.min.css" type="text/css" />
    <link rel="stylesheet"
        href="/backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css">


    <!-- App Css-->
    <link href="/backend/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="/backend/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="/backend/assets/css/dev.css?ts={{ time() }}" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <x-tinymce-config/>

    @stack('css')
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('backend.layouts.sidebar')
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="notification_area">
                @include('backend.layouts.notice')
            </div>


            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; {{ config('starter.COPYRIGHT') }}
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by {{ config('starter.DEVELOPED') }}
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->





    <!-- JAVASCRIPT -->
    <script src="/backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/backend/assets/libs/feather-icons/feather.min.js"></script>
    <script src="/backend/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="/backend/assets/js/plugins.js"></script>


    {{-- Select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- App js -->
    <script src="/backend/assets/js/app.js"></script>

    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>

    <script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>


    <script>
        $(document).ready(function() {

            // Select2
            $('.select2').select2();

            // Auto Shorting Off
            $("select").on("select2:select", function(evt) {
                var element = evt.params.data.element;
                var $element = $(element);

                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
            });


        });
    </script>

    @stack('js')


</body>

</html>
