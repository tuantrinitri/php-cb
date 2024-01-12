<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    @include("admin.layouts.partial.style")
    @yield('admin_css')
    @include("admin.layouts.partial.script")
    @yield('admin_js')

</head>

<body>

<!-- Main navbar -->
@include("admin.layouts.partial.header")
<!-- /main navbar -->

<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    @include("admin.layouts.partial.menu")
    <!-- /main sidebar -->

    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Breadcrumb -->
        <!-- Load after -->
        <!-- /end Breadcrumb -->

        <!-- Content area -->
        <div class="content">
        @yield('admin_content')
        </div>
        <!-- /content area -->

        <!-- Footer -->
        @include("admin.layouts.partial.footer")
        <!-- /footer -->
    </div>
    <!-- /main content -->
</div>
<!-- /page content -->
</body>
</html>

