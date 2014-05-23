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
    <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-dark aside-md" id="nav">        
            <section class="vbox">
                <header class="header dker navbar navbar-fixed-top-xs">
                    <div class="navbar-header">
                        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a href="#" class="navbar-brand" data-toggle="fullscreen">
                            <img src="/themes/frontend/vertexhs/assets/images/logo.png" class="m-r-sm">
                            <span class="hidden-nav-xs">VertexHS</span>
                        </a>
                        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
                            <i class="fa fa-cog"></i>
                        </a>
                    </div>
                </header>

                <section class="w-f scrollable">
                    <!-- nav -->
                    <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="7px" data-railOpacity="0.2">
                        <div class="clearfix wrapper bg-primary nav-user hidden-xs">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="thumb-sm avatar pull-left m-r-sm">
                                        <img src="/themes/frontend/vertexhs/assets/images/avatar.jpg">
                                    </span>
                                    <span class="hidden-nav-xs clear">
                                        <strong>{{ $me->first_name }} {{ $me->last_name }}</strong> <b class="caret caret-white"></b>
                                        <span class="text-muted text-xs block">{{ $me->email }}</span>
                                    </a>
                                </a>

                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <span class="arrow top hidden-nav-xs"></span>
                                    <li>
                                        <a href="{{ URL::to('profile/settings') }}">Settings</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('profile') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('profile/notifications') }}">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="{{ URL::to('help') }}">Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ URL::to('profile/logout') }}" data-toggle="ajaxModal" >Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- nav -->
                        <nav class="nav-primary hidden-xs">
                            <ul class="nav">
                                <li>
                                    <a href="#uikit"  >
                                        <i class="fa fa-flask icon">
                                            <b class="bg-success"></b>
                                        </i>
                                        <span class="pull-right">
                                            <i class="fa fa-angle-down text"></i>
                                            <i class="fa fa-angle-up text-active"></i>
                                        </span>
                                        <span>UI kit</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- / nav -->
                    </div>
                    <!-- / nav -->
                </section>

                <footer class="footer lt hidden-xs b-t b-dark">
                    <div id="chat" class="dropup">
                        <section class="dropdown-menu on aside-md m-l-n">
                            <section class="panel bg-white">
                                <header class="panel-heading b-b b-light">Active chats</header>
                                <div class="panel-body animated fadeInRight">
                                    <p class="text-sm">No active chats.</p>
                                    <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                                </div>
                            </section>
                        </section>
                    </div>
                    <div id="invite" class="dropup">
                        <section class="dropdown-menu on aside-md m-l-n">
                            <section class="panel bg-white">
                                <header class="panel-heading b-b b-light">
                                    John <i class="fa fa-circle text-success"></i>
                                </header>
                                <div class="panel-body animated fadeInRight">
                                    <p class="text-sm">No contacts in your lists.</p>
                                    <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite from Facebook</a></p>
                                </div>
                            </section>
                        </section>
                    </div>
                    <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                        <i class="fa fa-angle-left text"></i>
                        <i class="fa fa-angle-right text-active"></i>
                    </a>
                    <div class="btn-group hidden-nav-xs">
                        <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#chat"><i class="fa fa-comment-o"></i></button>
                        <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown" data-target="#invite"><i class="fa fa-facebook"></i></button>
                    </div>
                </footer>
            </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
            <section class="vbox">
                <section>
                    <section class="hbox stretch">
                        <section>
                            <section class="vbox">
                                <header class="header bg-white b-b b-light">
                                    @section('pageHeader')
                                    @show
                                </header>
                                <section class="scrollable wrapper">
                                    @section('content')
                                    @show
                                </section>                    
                                <footer class="footer bg-white b-t b-light">
                                    <p>This is a footer</p>
                                </footer>
                            </section>
                        </section>
                        <aside class="bg-light lter b-l aside-md">
                        </aside>
                    </section>
                </section>
            </section>
            <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
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
