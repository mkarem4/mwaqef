@extends('admin-layout.app')

@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-right6 position-left"></i> <span class="text-semibold">الرئيسية</span> - </h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon-home2 position-left"></i> الرئيسية</a></li>
                <li class="active">لوحة التحكم</li>
            </ul>

        </div>
    </div>
    <!-- /page header -->
    @include('admin.message')

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-12">

                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <!-- <h6 class="panel-title">Traffic sources</h6> -->

                    </div>

                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="all">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <i class="icon-user-check"></i>
                                        </li>
                                        <li class="text-center">
                                            <div class="text-semibold">الاعضاء </div>
                                            {{--<div class="text-muted">{{ $users->count() }}</div>--}}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="all">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <i class="icon-users"></i>
                                        </li>
                                        <li class="text-center">
                                            <div class="text-semibold">مستخدم جديد</div>
                                            {{--<div class="text-muted"><span--}}
                                                        {{--class="status-mark border-success position-left"></span>--}}
                                                {{--{{ $new_users }}</div>--}}
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="all">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <i class="icon-droplet2"></i>
                                        </li>
                                        <li class="text-center">
                                            <div class="text-semibold">كل الاقسام</div>
                                            {{--<div class="text-muted">{{ $category }}</div>--}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /traffic sources -->

            </div>

            <div class="col-lg-5">


            </div>
        </div>
        <!-- /main charts -->


        <!-- Dashboard content -->

        <!-- /dashboard content -->

    </div>
    <!-- /content area -->
@endsection