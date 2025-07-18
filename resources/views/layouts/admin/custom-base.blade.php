<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-vertical-style="overlay" data-theme-mode="light" data-header-styles="light" data-menu-styles="light" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <meta charset="UTF-8">
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
        <meta name="Author" content="Spruko Technologies Private Limited">
        <meta name="keywords" content="admin dashboard in php, admin panel bootstrap template, admin template php, best php framework, bootstrap and php, bootstrap php, bootstrap template, panel admin php, php admin, php admin panel template, php components, php templates, php ui, template admin php, template php">

        <!-- Title -->
        <title>@yield('title')</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('admin/assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

        <!-- Start::custom-styles -->
        @include('layouts.admin.components.custom-styles')

        <!-- End::custom-styles -->
        @yield('styles')

    </head>

	<body class="">

        <!-- Start::custom-switcher -->
        @include('layouts.admin.components.custom-switcher')

        <!-- End::custom-switcher -->
        @yield('body')

        <!-- Start::custom-scripts -->
        @include('layouts.admin.components.custom-scripts')

        <!-- End::custom-scripts -->

        @yield('scripts')

    </body>

</html>   