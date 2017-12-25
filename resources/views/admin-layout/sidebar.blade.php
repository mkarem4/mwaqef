<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    {{--<a href="#" class="media-left"><img src="assets/images/placeholder.jpg"--}}
                                                        {{--class="img-circle img-sm" alt=""></a>--}}
                    <div class="media-body">
                        <span class="media-heading text-semibold">القائمة الجانبية</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;{{ Auth::user()->name }}
                        </div>
                    </div>

                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="#"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>القائمة</span> <i class="icon-menu"
                                                                          title="Main pages"></i></li>
                    <li class="@if(Request::is('admin')) active @endif"><a href="/admin"><i class="icon-home4"></i> <span>الرئيسيه</span></a>
                    </li>
{{--                    @if(Auth::user()->role == 1 && Auth::user()->permissions->contains('name', 'settings'))--}}
                    @can('settings', \App\Setting::class)
                    <li class="@if(Request::is('admin/settings')) active @endif"><a href="/admin/settings"><i class="icon-gear"></i> <span>اعدادات الموقع</span></a></li>
                    @endcan
                    @can('users', \App\User::class)
                    <li class="@if(Request::is('admin/admins','admin/users','admin/users/special_users','admin/users/normal_users')) active @endif">
                            <a href="#"><i class="icon-users"></i> <span>الأعضاء</span></a>
                            <ul>
                                <li><a href="/admin/admins">قائمة الإدارة</a></li>
                                <li><a href="/admin/users">قائمة الإعضاء</a></li>
                                <li><a href="/admin/users/special_users"> الأعضاء المميزيين</a></li>
                                <li><a href="/admin/users/normal_users">الأعضاء العاديين</a></li>
                            </ul>
                        </li>
                    @endcan
                        <li class="@if(Request::is('admin/states','admin/cities','admin/towns')) active @endif">
                            <a href="#"><i class="glyphicon glyphicon-map-marker"></i> <span>المناطق</span></a>
                            <ul>
                                <li><a href="/admin/states">المناطق</a></li>
                                <li><a href="/admin/cities">المدن</a></li>
                                <li><a href="/admin/towns">الأحياء</a></li>
                            </ul>
                        </li>
                    @can('messages', \App\Message::class)
                        <li class="@if(Request::is('admin/messages')) active @endif">
                            <a href="#"><i class="icon-cart5"></i> <span>الرسائل</span></a>
                            <ul>
                                <li><a href="/admin/messages">رسائل اتصل بنا</a></li>
                                <li><a href="/outbox">الرسائل الخاصة</a></li>
                                <li><a href="/admin/messages/usersmessages">الرسائل بين الأعضاء</a></li>
                            </ul>
                        </li>
                    @endcan
                        {{--<li>--}}
                        {{--<a href="#"><i class="icon-cart5"></i>--}}
                            {{--<span>الصفحات الثابتة</span></a>--}}
                        {{--<ul>--}}
                            {{--@foreach(\App\Content::all() as $content)--}}
                                {{--<li><a href="/admin/content/{{ $content -> id }}/edit">{{ $content -> page_name }}</a></li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- /page kits -->
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
