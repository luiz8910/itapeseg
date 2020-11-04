<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/img/logo-fav.png">
    <title>Itapeseg</title>
<!----------------------------------CSS comuns para todas ás páginas--------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="../../assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/lib/material-design-icons/css/material-design-iconic-font.min.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/lib/jqvmap/jqvmap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="../../css/common.css" type="text/css" />

<!--------------------------------------------Custom CSS--------------------------------------------------------------->
    @if(isset($links))
        @foreach($links as $link)
            <link rel="stylesheet" href="{{ $link }}">
        @endforeach
    @endif
</head>
<body>

<form id="logout" action="{{ route('logout') }}" method="POST"></form>

<div class="be-wrapper be-fixed-sidebar">
    <nav class="navbar navbar-default navbar-fixed-top be-top-header">
        <div class="container-fluid">
            <div class="navbar-header"><a href="{{ route('home') }}" class="navbar-brand"></a></div>
            <div class="be-right-navbar">
                <ul class="nav navbar-nav navbar-right be-user-nav">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
                            <img src="../../assets/img/avatar.png" alt="Avatar">
                            <span class="user-name">{{ Auth::getUser()->person->name }}</span>
                        </a>
                        <ul role="menu" class="dropdown-menu">
                            <li>
                                <div class="user-info">
                                    <div class="user-name">{{ Auth::getUser()->person->name }}</div>
                                    <div class="user-position online"></div>
                                </div>
                            </li>
                            <li><a href="#"><span class="icon mdi mdi-face"></span> Perfil</a></li>
                            <li>

                                <a href="javascript:" onclick="logout();">
                                    <span class="icon mdi mdi-power"></span> Sair
                                </a>

                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="page-title"><span></span></div>
                <ul class="nav navbar-nav navbar-right be-icons-nav">
                    <li class="dropdown">
                        <a href="#" role="button" aria-expanded="false" class="be-toggle-right-sidebar">
                            <span class="icon mdi mdi-collection-image"></span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Dashboard</a>
            <div class="left-sidebar-spacer">
                <div class="left-sidebar-scroll">
                    <div class="left-sidebar-content">
                        <ul class="sidebar-elements">
                            <li class="divider">Catálago</li>
                            <li class="active"><a href="{{ route('home') }}"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                            </li>
                            <li class="parent"><a href="javascript:"><i class="icon mdi mdi-labels"></i><span>Produtos</span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('product.index') }}">Listar</a>
                                    </li>
                                    <li><a href="{{ route('product.create') }}">Adicionar Novo</a>
                                    </li>
                                    <li><a href="{{ route('product.deleted') }}">Excluídos</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="parent"><a href="javascript:"><i class="icon mdi mdi-case"></i><span>Categoria</span></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('product.index.category') }}">Listar</a>
                                    </li>
                                    <li><a href="{{ route('product.create.category') }}">Adicionar Novo</a>
                                    </li>
                                    <li><a href="{{ route('product.deleted.category') }}">Excluídos</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="parent"><a href="javascript:"><i class="icon mdi mdi-case-download"></i><span>Subcategoria</span></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('product.index.category.sub') }}">Listar</a>
                                    </li>
                                    <li><a href="{{ route('product.create.category.sub') }}">Adicionar</a>
                                    </li>
                                    <li><a href="{{ route('product.deleted.category.sub') }}">Excluídos</a>
                                    </li>
                                </ul>
                            </li>


                            <li class="divider">Site</li>
                            <li class="parent"><a href="#"><i class="icon mdi mdi-inbox"></i><span>Seções do Site</span></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="{{ route('reorder.menu') }}">Reordenar Menu</a>
                                    </li>
                                    <li>
                                        <a href="javascript:">Banner</a>
                                    </li>
                                    <li><a href="email-read.html">Email Detail</a>
                                    </li>
                                    <li><a href="email-compose.html">Email Compose</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="parent"><a href="#"><i class="icon mdi mdi-email"></i><span>Contato</span></a>
                                <ul class="sub-menu">
                                    <li><a href="layouts-primary-header.html">Primary Header</a>
                                    </li>
                                    <li><a href="layouts-success-header.html">Success Header</a>
                                    </li>
                                    <li><a href="layouts-warning-header.html">Warning Header</a>
                                    </li>
                                    <li><a href="layouts-danger-header.html">Danger Header</a>
                                    </li>
                                    <li><a href="layouts-nosidebar-left.html">Without Left Sidebar</a>
                                    </li>
                                    <li><a href="layouts-nosidebar-right.html">Without Right Sidebar</a>
                                    </li>
                                    <li><a href="layouts-nosidebars.html">Without Both Sidebars</a>
                                    </li>
                                    <li><a href="layouts-fixed-sidebar.html">Fixed Left Sidebar</a>
                                    </li>
                                    <li><a href="pages-blank-aside.html">Page Aside</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="parent"><a href="#"><i class="icon mdi mdi-email-open"></i><span>Newsletter</span></a>
                                <ul class="sub-menu">
                                    <li><a href="maps-google.html">Google Maps</a>
                                    </li>
                                    <li><a href="maps-vector.html">Vector Maps</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="divider">Configuração</li>
                            <li class="parent"><a href="#"><i class="icon mdi mdi-accounts-alt"></i><span>Usuarios</span></a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('person.index') }}">Listar Usuarios</a>
                                    </li>
                                    <li><a href="{{ route('person.create') }}">Adicionar</a>
                                    </li>
                                    <li><a href="{{ route('person.deleted') }}">Excluídos</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include($route)
</div>


<!------------------------------ Scripts Comuns para todas ás páginas ------------------------------------------------->

    <script src="../../assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="../../assets/js/main.js" type="text/javascript"></script>
    <script src="../../assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="../../assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="../../assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="../../assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="../../assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="../../assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="../../assets/js/app-dashboard.js" type="text/javascript"></script>
    <script src="../../assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="../../assets/js/app-ui-nestable-lists.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //initialize the javascript
            App.init();

            if(location.pathname.search('menu') !== -1)
                App.uiNestableLists();
            else
                App.dashboard();

        });
    </script>

<!------------------------------------------Form scripts--------------------------------------------------------------->

    <script src="../../assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="../../assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="../../assets/js/app-form-elements.js" type="text/javascript"></script>

<!-----------------------------------------Custom Scripts-------------------------------------------------------------->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../js/common.js"></script>

    @if(isset($scripts))
        @foreach($scripts as $script)
            <script src="{{ $script }}"></script>
        @endforeach
    @endif

<!-----------------------------------------Custom Alerts--------------------------------------------------------------->

@if(Session::has('success.msg'))
    <script>
        $(function (){
            sweet_alert_success('{!! Session::get('success.msg') !!}')
        });
    </script>

@elseif(Session::has('error.msg'))
    <script>
        $(function (){
            sweet_alert_error('{!! Session::get('error.msg') !!}')
        });
    </script>
@endif

</body>
</html>
