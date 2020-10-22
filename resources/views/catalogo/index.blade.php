<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7" lang="en">
<![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8" lang="en">
<![endif]-->
<!--[if (gte IE 9)|!(IE)]>
<!--><html lang="en"> <!--<![endif]-->

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8" />
    <title>Catalago | Itapeseg Distribuidora</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />


    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="../../css/catalogo/style.css" />

    <!--Color CSS-->
    <link rel="stylesheet" href="../../css/catalogo/color.css" />

    <!--Responsive CSS-->
    <link rel="stylesheet" href="../../css/catalogo/responsive.css" />

    <!--Vector-icons CSS-->
    <link rel="stylesheet" href="../../css/catalogo/vector-icons.css" />

    <!--bootstrap CSS-->
    <link rel="stylesheet" href="../../css/catalogo/bootstrap.css" />
    <link rel="stylesheet" href="../../css/catalogo/bootstrap-responsive.css" />

    <!--Jquery UI-->
    <link rel="stylesheet" href="../../css/catalogo/jquery-ui-1.10.2.css" />

    <!--Responsive Menu CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/catalogo/responsive-menu.css" />

    <!--AD Gallery-->
    <link rel="stylesheet" type="text/css" href="../../css/catalogo/jquery.ad-gallery.css" />

    <!--Super -->
    <link rel="stylesheet" type="text/css" href="../../css/catalogo/superfish.css">

    <!--Isotope CSS-->
    <link rel="stylesheet" type="text/css" href="../../css/catalogo/isotope.css">

    <!-- image animation-->
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/catalogo/image_animation.css' />

    <!--pie-chart-->
    <link rel="stylesheet" type="text/css" href="../../css/catalogo/jquery.easy-pie-chart.css">

    <!--prettyPhoto-->
    <link rel="stylesheet" type="text/css" href="../../css/catalogo/prettyPhoto.css">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="../../rs-plugin/css/settings.css" media="screen" />

</head>


<body>
<div id="wrapper">
    <section class="wrapall">
        <!-- NAVBAR ================================================== -->
        <section class="navbar-wrapper">
            <div class="container">
                <div class="logo">
                    <a class="brand" href="javascript:">
                        <img src="../../images/logo.png" alt="">
                    </a>
                </div>
                <nav id="main-menu">
                    <div id="mobnav-btn"><span class="icon-menu-3"></span>Menu</div>
                    <ul class="sf-menu" id="sidebar-nav">
                        <li>
                            @if(Auth::check())
                                <a href="{{ route('home') }}">Admin</a>
                            @endif
                        </li>
                    </ul>
                </nav><!-- /main-menu -->
                <div class="clear"></div>
            </div> <!-- /.container -->
        </section><!-- /.navbar-wrapper -->

        <section class="col-wrap homepage_v1_banner_bg themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">
        </section><!-- /.col -->

        <section class="col-wrap col-shadow content_pb">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12 text-center mb themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right themeapt_start_animation"><br/><br/><br/>
                        <div class="content_main_heading content_main_heading_center">
                            <h3>Portfolio de Produtos</h3>
                        </div>
                    </div>

                    <?php $i = 0; ?>
                    @foreach($categories as $category)

                        <div class="span3 @if($i == 0 || $i % 4 == 0) first @endif mb text-center team_section themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left">
                            <a href="{{ route('product.catalogo', ['category_id' => $category->id]) }}">
                                <img src="@if($category->picture) {{ str_replace('public', '/storage', $category->picture) }} @else ../../images/team-member/00_01.png @endif"
                                     alt="team_member" title="Team Member" style="width: 275px; height: 210px;">
                                <div class="team_content content_pt">
                                    <div class="member_designation">
                                        <p></p>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="team_heading">
                                        <h1 class="">{{ $category->name }}</h1>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php $i++; ?>
                    @endforeach


                </div><!-- /.row-fluid -->
            </div>
            <!--Container-->
        </section><!-- /.col -->
    </section><!-- /.navbar-wrapper -->

    <footer>

        <section class="col-wrap content_pb content_pt">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12 text-center copyright_text content_pt">
                        <p>Copyright 2020. Todos os direitos Reservados.</p>
                    </div>
                </div><!-- /.row-fluid -->
            </div>
            <!--Container-->
        </section><!-- /.col -->
    </footer>
    <div id="back-top" style="display: block;">
        <a style="opacity: 1;" class="w-toplink" href="#"></a>
    </div>

    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>

</div><!-- end wrapper -->

<!-- ////////////////////////////////// -->
<!-- //      Javascript Files        // -->
<!-- ////////////////////////////////// -->
<script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>

<!--Bootstrap UI-->
<script type="text/javascript" src="../../js/bootstrap.js"></script>
<script type="text/javascript" src="../../js/bootstrap-select.js"></script>

<!--Jquery UI-->
<script type="text/javascript" src="../../js/jquery-ui-1.10.2.js"></script>

<!--Scroll js-->
<script type="text/javascript" src="../../js/jscroll.js"></script>
<script src="../../js/custom-scroll-folio.js" type="text/javascript"></script>

<!--Parallax JS-->
<script type="text/javascript" src="../../js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="../../js/jquery.localscroll-1.2.7-min.js"></script>

<script type="text/javascript" src="../../js/infogrid.js"></script>

<!--AD Gallery-->
<script type="text/javascript" src="../../js/jquery.ad-gallery.js"></script>

<!--Superfish-->
<script type="text/javascript" src="../../js/superfish.js"></script>

<!--Isotope JS-->
<script type="text/javascript" src="../../js/jquery.isotope.js"></script>

<!--image animation Javascripts Start -->
<script type='text/javascript' src='../../js/waypoints.js'></script>
<script type='text/javascript' src='../../js/image_animation.js'></script>

<!-- pie-chart JS-->
<script src="../../js/jquery.easy-pie-chart.js" type="text/javascript" charset="utf-8"></script>

<!--jquery.prettyPhoto-->
<script type="text/javascript" src="../../js/jquery.prettyPhoto.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="../../rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="../../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!--Custom JS-->
<script type="text/javascript" src="../../js/jquery.custom.js"></script>

</body>
</html>
