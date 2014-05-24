<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <meta charset="utf-8" />
    <title>
        @section('pageTitle')
        {{ Config::get('platform.site.title') }}
        @show
    </title>
    <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 

    {{ Asset::queue('bootstrap', 'css/bootstrap.css') }}
    {{ Asset::queue('animate', 'css/animate.css', array('bootstrap')) }}
    {{ Asset::queue('font', 'css/font.css', array('bootstrap')) }}
    {{ Asset::queue('icons', 'css/icons.css') }}
    {{ Asset::queue('app', 'css/app.css', array('bootstrap')) }}
    {{ Asset::queue('vertexhs', 'css/vertexhs.css', array('bootstrap')) }}

    @foreach (Asset::getCompiledStyles() as $style)
    <link href="{{ $style }}" rel="stylesheet">
    @endforeach

    @section('styles')
    @show

    <!--[if lt IE 9]>
    <script src="/themes/frontend/vertexhs/assets/js/ie/html5shiv.js"></script>
    <script src="/themes/frontend/vertexhs/assets/js/ie/respond.min.js"></script>
    <script src="/themes/frontend/vertexhs/assets/js/ie/excanvas.js"></script>
    <![endif]-->
</head>

<body>
    <section class="vbox">
        <header class="bg-dark dk header navbar navbar-fixed-top-xs">
            <div class="navbar-header aside-md">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                    <i class="fa fa-bars"></i>
                </a>
                <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="/themes/admin/kyaris/assets/images/logo.png" class="m-r-sm">@setting('platform.site.title') &nbsp;</a> <span class="label label-danger">beta</span>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                    <i class="fa fa-cog"></i>
                </a>
            </div>

            <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="m-r-xs">
                            <i class="fa fa-cogs fa-1x"></i>
                        </span>
                        {{ $me->first_name }} {{ $me->last_name }} <b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu animated fadeInRight">
                        <span class="arrow top"></span>
                        <li>
                            <a href="{{ URL::to('me/settings') }}">Settings</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('me/settings/profile#profile') }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('notifications') }}">
                                <span class="badge bg-danger pull-right">3</span>
                                Notifications
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('help') }}">Help</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ URL::to('logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            {{-- menu widget --}}
            @widget('platform/menus::nav.show', array('system', 0, 'nav navbar-nav navbar-right hidden-xs hidden-sm'))
        </header>

        <section>
            <section class="hbox stretch">
                <!-- .aside -->
                <aside class="bg-dark b-r aside-md hidden-print" id="nav">
                    <section class="vbox">                       
                        <section class="w-f scrollable">
                            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                                <!-- nav -->
                                <nav class="nav-primary hidden-xs">
                                    {{-- menu widget --}}
                                    @widget('platform/menus::nav.show', array('main', 0, 'nav', null, 'widgets/menus/nav'))
                                </nav>
                                <!-- / nav -->
                            </div>
                        </section>

                        <footer class="footer lt hidden-xs b-t b-dark">
                            
                            <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                                <i class="fa fa-angle-left text"></i>
                                <i class="fa fa-angle-right text-active"></i>
                            </a>
                        </footer>
                    </section>
                </aside>

                <!-- /.aside -->
                <section id="content">
                    <section class="vbox">
                        @section('pageHeader')
                        @show

                        <section class="scrollable padder" id="contentSection">
                            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                                @section('breadCrumbs')
                                <li><a href="{{ URL::toAdmin('/') }}"><i class="fa fa-home"></i> Admin</a></li>
                                @show
                            </ul>
                            
                            @section('content')
                            @show
                        </section>

                        <footer class="footer bg-white b-t b-light">
                            @section('contentFooter')
                            @show
                        </footer>
                    </section>

                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                </section>
            </section>
        </section>
    </section>

    {{ Asset::queue('jquery', 'js/jquery.min.js') }}
    {{ Asset::queue('bootstrap', 'js/bootstrap.js', array('jquery')) }}
    {{ Asset::queue('app', 'js/app.js', array('jquery', 'bootstrap')) }}
    {{ Asset::queue('app.plugin', 'js/app.plugin.js', array('jquery')) }}
    {{ Asset::queue('slimscroll', 'js/slimscroll/jquery.slimscroll.min.js', array('jquery')) }}
    {{ Asset::queue('jgrowl', 'js/jgrowl/jgrowl.min.js', 'jquery') }}
    {{ Asset::queue('vertexhs', 'js/vertexhs.js', array('bootstrap', 'jquery')) }}

    @foreach (Asset::getCompiledScripts() as $script)
    <script src="{{ $script }}" type="text/javascript"></script>
    @endforeach

    @section("scripts")
    @show
    
    @include('partials/modals')
    @include('partials/notifications')

</body>
</html>
