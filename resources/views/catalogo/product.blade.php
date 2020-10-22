<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->

<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8" />
    <title>Showcase-Paralax Responsive Single page</title>
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
                    <a class="brand" href="#"><img src="../../images/logo.png" alt=""></a>
                </div>

                <nav id="main-menu">
                    <div id="mobnav-btn"><span class="icon-menu-3"></span>Menu</div>
                    <ul class="sf-menu" id="sidebar-nav">
                        <li>
                            <a href="{{ route('category.catalogo')}}">Voltar</a>
                        </li>
                    </ul>
                </nav><!-- /main-menu -->
                <div class="clear"></div>
            </div> <!-- /.container -->
        </section><!-- /.navbar-wrapper -->
        <section class="col-wrap content_pb content_pt main_content mb" style="text-align: center">
            <div class="container">
                <div class="row-fluid">
                </div><!-- /.row-fluid -->
            </div>
            <!--Container-->
        </section>

        <section class="col-wrap content_pb content_pt main_content mb" style="text-align: center">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12">
                        <h1>{{ $category->name }}</h1>
                    </div>
                </div><!-- /.row-fluid -->
            </div>
            <!--Container-->
        </section>

        <section class="col-wrap themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">
            <div class="container">
                <div class="row-fluid">

                </div><!-- /.row-fluid -->
            </div>
            <!--Container-->
        </section><!-- /.col -->

        <section class="col-wrap mb content_pt">
            <div class="container">
                <div class="row-fluid">
                    <div class="span12 content_pt first mb portfolio_filter_category">
                        <div class="filter_category">
                            <ul class="option-set" id="filter">
                                <li><a href="#" data-filter="*" class="active">Todos</a></li>

                                @foreach($sub as $s)
                                    <li><a href="#" data-filter=".{{ $s->id }}">{{ $s->name }}</a></li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="span12 first mb">
                        <ul class="span12 first pro gallery portfolio_item content_pt">
                            @foreach($products as $product)
                            <li class="portfolio mb
                                @foreach($product->choose as $chosen)
                                    {{ $chosen->sub_id }}
                                @endforeach
                                ">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <h1>{{ $product->name }}</h1>
                                        <div class="portifolio-sheet"><strong>Marca:</strong> {{ $product->brand }} </div>
                                        <div class="portifolio-sheet"><strong>Modelo:</strong> {{ $product->model }} </div>
                                        <div class="portifolio-sheet"><strong>SKU:</strong> {{ $product->code }} </div>
                                        <div class="portifolio-sheet">{{ $product->description }}</div>
                                    </div>
                                    <img src="@if($product->picture) {{ str_replace('public', '/storage', $product->picture) }} @else ../../images/portfolio-image/00_01.png @endif"
                                         alt="image" title="Image" style="width: 500px; height: 300px;"/>
                                </div>
                            </li>
                            @endforeach

                            {{--<li class="portfolio mb themes">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="../../images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb websites themes">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="../../images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="../../images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb themes">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb photography">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb websites">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb photography themes">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb websites">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb websites">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb websites">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb websites">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>
                            <li class="portfolio mb websites">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-link icon-left"></span></a>
                                        <a href="images/portfolio-image/00_01.png" rel="prettyPhoto[gallery1]"><span class="icon-search"></span></a>
                                        <a href="#">
                                            <h1>Project Title Here</h1>
                                        </a>
                                    </div>
                                    <img src="images/portfolio-image/00_01.png" alt="image" title="Image" />
                                </div>
                            </li>--}}
                        </ul>

                    </div>




                </div><!-- /.row-fluid -->
            </div>
            <!--Container-->
        </section><!-- /.col -->
    </section>
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
<script type="text/javascript" src="../../js/catalogo/jquery-1.10.2.min.js"></script>

<!--Bootstrap UI-->
<script type="text/javascript" src="../../js/catalogo/bootstrap.js"></script>
<script type="text/javascript" src="../../js/catalogo/bootstrap-select.js"></script>

<!--Jquery UI-->
<script type="text/javascript" src="../../js/catalogo/jquery-ui-1.10.2.js"></script>

<!--Scroll js-->
<script type="text/javascript" src="../../js/catalogo/jscroll.js"></script>
<script src="../../js/catalogo/custom-scroll-folio.js" type="text/javascript"></script>

<!--Parallax JS-->
<script type="text/javascript" src="../../js/catalogo/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="../../js/catalogo/jquery.localscroll-1.2.7-min.js"></script>

<script type="text/javascript" src="../../js/catalogo/infogrid.js"></script>

<!--AD Gallery-->
<script type="text/javascript" src="../../js/catalogo/jquery.ad-gallery.js"></script>

<!--Superfish-->
<script type="text/javascript" src="../../js/catalogo/superfish.js"></script>

<!--Isotope JS-->
<script type="text/javascript" src="../../js/catalogo/jquery.isotope.js"></script>

<!--image animation Javascripts Start -->
<script type='text/javascript' src='../../js/catalogo/waypoints.js'></script>
<script type='text/javascript' src='../../js/catalogo/image_animation.js'></script>

<!-- pie-chart JS-->
<script src="../../js/catalogo/jquery.easy-pie-chart.js" type="text/javascript" charset="utf-8"></script>

<!--jquery.prettyPhoto-->
<script type="text/javascript" src="../../js/catalogo/jquery.prettyPhoto.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="../../rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="../../rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!--Custom JS-->
<script type="text/javascript" src="../../js/catalogo/jquery.custom.js"></script>

</body>

</html>
