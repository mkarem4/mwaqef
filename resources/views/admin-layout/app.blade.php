@include('admin-layout.header')

<div class="page-container">

    <!-- Page content -->
    <div class="page-content">
        @include('admin-layout.sidebar')

        @yield('content')
    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->
@include('admin-layout.footer')
