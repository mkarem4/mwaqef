<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>لوحة التحكم</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{ Request::root() }}/admin-panel/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="{{ Request::root() }}/admin-panel/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="{{ Request::root() }}/admin-panel/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="{{ Request::root() }}/admin-panel/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="{{ Request::root() }}/admin-panel/assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="{{ Request::root() }}/admin-panel/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/main-js.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/core/app.js"></script>

{{--    <script type="text/javascript" src="{{ Request::root() }}/admin/assets/js/pages/dashboard.js"></script>--}}
    <!-- /theme JS files -->
    <!--Sweet Alert style-->
    <link rel="stylesheet" type="text/css" href="{{ Request::root() }}/admin-panel/dist/sweetalert.css">
    <!--Sweet Alert Style-->
    <!--Sweet Alert Js-->
    <script src="{{ Request::root() }}/admin-panel/dist/sweetalert.min.js"></script>
    <!--Sweet Alert Js-->

    <!-- Theme JS files -->
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/plugins/forms/selects/select2.min.js"></script>

    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/pages/datatables_basic.js"></script>
    <!-- /theme JS files -->
    <script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/pages/components_modals.js"></script>

    {{--<script type="text/javascript" src="{{ Request::root() }}/admin-panel/assets/js/pages/address.js"></script>--}}
    <script src="{{ Request::root() }}/admin-panel/assets/js/pages/dropzone.js"></script>
</head>

<body>
<!-- Main navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.html"></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>


        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li>
            <a href="/outbox" class="hideSmall "><i class="icon-envelop4"></i>
                @if(\auth()->user()->msgcount)
                    <span class="text-default btn-danger noti_alert">{{ \auth()->user()->msgcount }}</span>
                @endif
                الرسائل الخاصة

            </a>
            </li>
            <li>
                <a href="/admin/messages" class="hideSmall "><i class="icon-envelop4"></i>
                    @if(\auth()->user()->contactcount)
                        <span class="text-default btn-danger noti_alert">{{ \auth()->user()->contactcount }}</span>
                    @endif
                    رسائل اتصل بنا

                </a>
            </li>
            <li>
                @if(\auth()->user() && \auth()->user()->role == 1)
                    <a class="" href="/">الانتقال الى موقع حراج</a>
                @endif
            </li>

            <li><a href="/admin/logout"><i class="icon-switch2"></i> تسجيل خروج</a></li>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->

<script type="text/javascript" src="{{ Request::root() }}/js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
