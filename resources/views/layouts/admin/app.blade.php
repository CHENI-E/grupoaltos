<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="admin dashboard in php, admin panel bootstrap template, admin template php, best php framework, bootstrap and php, bootstrap php, bootstrap template, panel admin php, php admin, php admin panel template, php components, php templates, php ui, template admin php, template php">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Title -->
        <title> @yield('title') </title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('admin/assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

        <!-- Start::Styles -->
        @include('layouts/admin/components/styles')

        <!-- End::Styles -->
        
        @yield('styles')

    </head>

    <body class="">

        <!-- Start::main-switcher -->
        @include('layouts/admin/components/switcher')

        <!-- End::main-switcher -->

        <!-- Loader -->
        <div id="loader" >
            <img src="{{ asset('admin/assets/images/media/loader.svg') }}" alt="">
        </div>
        <!-- Loader -->

        <div class="page">

            <!-- Start::main-header -->
            @include('layouts/admin/components/main-header')

            <!-- End::main-header -->

            <!-- Start::main-sidebar -->
            @include('layouts/admin/components/main-sidebar')

            <!-- End::main-sidebar -->

            <!-- Start::app-content -->
            <div class="main-content app-content">
                <div class="container-fluid">

                    @yield('content')
                
                </div>
            </div>
            <!-- End::app-content -->

            <!-- Start::main-modal -->
            @include('layouts/admin/components/modal')

            <!-- End::main-modal -->

            <!-- Start::main-footer -->
            @include('layouts/admin/components/footer')

            <!-- End::main-footer -->

        </div>

        <!-- Start::main-scripts -->
        @include('layouts/admin/components/scripts')

        <!-- End::main-scripts -->

        @yield('scripts')

        <script>
            var APP_URL = "{{ env('APP_URL') }}";
        </script>
        <!-- Custom JS -->
        <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

        <!-- Custom-Switcher JS -->
        <script src="{{ asset('admin/assets/js/custom-switcher.min.js') }}"></script>

    </body> 

</html>