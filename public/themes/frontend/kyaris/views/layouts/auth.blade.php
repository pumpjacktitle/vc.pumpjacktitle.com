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
    {{ Asset::queue('auth', 'css/auth.css', array('bootstrap')) }}

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

<body class="bg-white">

    <section class="vbox">
        <header class="bg-dark dk header navbar navbar-fixed-top-xs">
            <div class="navbar-header aside-md">
                <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                    <i class="fa fa-bars"></i>
                </a>

                <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="/themes/frontend/kyaris/assets/images/logo.png" class="m-r-sm"><span class="text-white">@setting('platform.site.title')</span></a>
                <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                    <i class="fa fa-cog"></i>
                </a>
            </div>

            @widget('platform/menus::nav.show', array('main', 0, 'nav navbar-nav navbar-right m-n hidden-xs nav-user'))
        </header>

        <section>
            <section class="hbox stretch">
                <section id="content">
                    <section class="vbox">
                        <section class="scrollable wrapper">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 m-b-sm text-center">
                                    <h2><i class="fa fa-user"></i>&nbsp;My Account</h2>
                                </div>
                            </div>

                            @section('content')
                            @show
                        </section>

                        <footer class="footer bg-light b-t b-light text-center">
                            <p class="pull-left">@setting('platform.site.copyright')</p>
                            <p class="pull-right">
                                
                                @if (in_group("admin"))
                                <a href="{{ URL::toAdmin("/") }}"><i class="fa fa-dashboard"></i></a>
                                @endif
                            </p>
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

    @foreach (Asset::getCompiledScripts() as $script)
    <script src="{{ $script }}" type="text/javascript"></script>
    @endforeach

    @section("scripts")
    @show
    
</body>
</html>
