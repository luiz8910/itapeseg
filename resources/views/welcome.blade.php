
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8" />
    <title>Itapeseg Distribuidora</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="css/style.css" />

    <!--Color CSS-->
    <link rel="stylesheet" href="css/color.css"/>

    <!--Responsive CSS-->
    <link rel="stylesheet" href="css/responsive.css"/>

    <!--Vector-icons CSS-->
    <link rel="stylesheet" href="fonts/icon-social-style.css"/>

    <!--icon social CSS-->
    <link rel="stylesheet" href="css/vector-icons.css"/>

    <!--bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/bootstrap-responsive.css" />

    <!--Jquery UI-->
    <link rel="stylesheet" href="css/jquery-ui-1.10.2.css" />

    <!--Responsive Menu CSS-->
    <link rel="stylesheet" type="text/css" href="css/responsive-menu.css"/>

    <!--Isotope-->
    <link rel="stylesheet" type="text/css" href="css/isotope.css"/>

    <!--AD Gallery-->
    <link rel="stylesheet" type="text/css" href="css/jquery.ad-gallery.css"/>

    <!-- image animation-->
    <link rel='stylesheet' type='text/css' media='screen' href='css/image_animation.css'/>

    <!--pie-chart-->
    <link rel="stylesheet" type="text/css" href="css/jquery.easy-pie-chart.css">

    <!--prettyPhoto-->
    <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>

    <link rel="stylesheet" href="../../css/common.css">



</head>


<body>
<div id="wrapper">
    <!-- NAVBAR ================================================== -->
    <section class="navbar-wrapper">
        <div class="container">
            <div class="logo">
                <a class="brand" href="javascript:"><img src="http://itapesegdistribuidora.com.br/images/logo.png" alt=""></a>
            </div>

            <div class="social_icon">
                <ul>
                    <li>
                        <a class="normalTip" href="{{ $data->facebook }}" target="_blank" title="Facebook">
                            <img src="../../fb_icon.png" alt="Facebook" class="social_media_icon">
                        </a>
                    </li>
                    <li>
                        <a class="normalTip facebook" target="_blank" href="{{ $data->messenger }}" title="Messenger">
                            <img src="../../messenger_icon.png" alt="Messenger" style="width: 35px; height: 33px;">
                        </a>
                    </li>
                    <li>
                        <a class="normalTip gplus" target="_blank" href="{{ $data->instagram }}" title="Instagram">
                            <img src="../../insta_icon.png" alt="Instagram" class="social_media_icon">
                        </a>
                    </li>
                    <li>
                        <a class="normalTip gplus" target="_blank" href="{{ $data->skype }}" title="Skype">
                            <img src="../../skype_icon.png" alt="Skype" class="social_media_icon">
                        </a>
                    </li>
                    <li>
                        <a class="normalTip gplus" target="_blank" href="https://api.whatsapp.com/send?phone={{ $data->whatsapp }}" title="Whatsapp">
                            <img src="../../whatsapp_icon.png" alt="Whatsapp" class="social_media_icon">
                        </a>
                    </li>
                    <!--<li>
                        <a class="icon-ju-youtube normalTip gplus" href="#" title="Google Plus"></a>
                    </li>-->
                </ul>
            </div>
            <div class="clear"></div>
        </div> <!-- /.container -->

        <div class="menu_bg">
            <nav class="container" id="main-menu">
                <div id="mobnav-btn"><span class="icon-menu-3"></span>Menu</div>
                <ul class="sf-menu" id="thumbs">
                    <?php $i = 0; ?>

                    @foreach($menus as $m)
                        <li>
                            <a @if($i == 0) id="first_home" @endif href="#{{ $m->section_id }}"><span class="{{ $m->icon }}"></span>{{ $m->name }}</a>
                        </li>
                        <?php $i++; ?>
                    @endforeach
                   {{-- <li>
                        <a id="first_home" href="#go_initial"><span class="icon-home-2"></span>Inicio</a>
                    </li>

                    <li>
                        <a href="#go_portfolio"><span class="icon-trophy"></span>Marcas</a>
                    </li>

                    <li>
                        <a href="#go_about"><span class="icon-users-2"></span>Quem somos</a>
                    </li>
                    <li>
                        <a href="#go_faq"><span class="icon-info"></span>FAQ</a>
                    </li>
                    <li>
                        <a href="#go_contact"><span class="icon-mail"></span>Contato</a>
                    </li>--}}
                </ul>
            </nav><!-- /main-menu -->
        </div>
    </section><!-- /.navbar-wrapper -->

    <section class="col-wrap slider" id="go_initial"><!-- /.promo_box -->
        <!--
        #################################
            - THEMEPUNCH BANNER -
        #################################
        -->
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <!-- SLIDE -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="http://itapesegdistribuidora.com.br/images/slider/slide1/bg-hiki.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!--<div class="tp-caption customin sfr customout"
                            data-x="450"
                            data-y="50"
                            data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="1000"
                            data-easing="Power3.easeInOut"
                            data-endspeed="300"
                            style="z-index: 2"><img src="http://itapesegdistribuidora.com.br/images/slider/slide1/00_03.png" alt="">
                        </div>

                        <div class="tp-caption large_bold_grey theme_bg skewfromrightshort customout"
                            data-x="80"
                            data-y="290"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="500"
                            data-start="1000"
                            data-easing="Back.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 3"> Distribuidor
                        </div>

                       <div class="tp-caption theme_color_text skewfromrightshort customout"
                            data-x="80"
                            data-y="370"
                            data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="1500"
                            data-easing="Power4.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 4">Distribuidor
                        </div>

                        <div class="tp-caption normal_text skewfromrightshort customout"
                            data-x="450"
                            data-y="370"
                            data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="1500"
                            data-easing="Power4.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 5">
                        </div>

                        <div class="tp-caption theme_color_text skewfromrightshort customout"
                            data-x="85"
                            data-y="414"
                            data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                            data-speed="800"
                            data-start="2000"
                            data-easing="Power4.easeOut"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            data-captionhidden="on"
                            style="z-index: 6">Autorizado
                        </div> -->

                        <div class="tp-caption normal_text skewfromrightshort customout"
                             data-x="325"
                             data-y="414"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"
                             data-captionhidden="on"
                             style="z-index: 7">
                        </div>
                    </li>

                    <!-- SLIDE -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="http://itapesegdistribuidora.com.br/images/slider/slide1/bg-giga.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="tp-caption customin sfr customout"
                             data-x="450"
                             data-y="50"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="1000"
                             data-easing="Power3.easeInOut"
                             data-endspeed="300"
                             style="z-index: 2"><img src="http://itapesegdistribuidora.com.br/images/slider/slide1/00_03.png" alt="">
                        </div>

                        <div class="tp-caption large_bold_grey theme_bg skewfromrightshort customout"
                             data-x="80"
                             data-y="290"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="500"
                             data-start="1000"
                             data-easing="Back.easeOut"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"
                             data-captionhidden="on"
                             style="z-index: 3"> Distribuidor
                        </div>

                        <!-- <div class="tp-caption theme_color_text skewfromrightshort customout"
                             data-x="80"
                             data-y="370"
                             data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="1500"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 4">Distribuidor
                         </div>

                         <div class="tp-caption normal_text skewfromrightshort customout"
                             data-x="450"
                             data-y="370"
                             data-customin="x:50;y:150;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.5;scaleY:0.5;skewX:0;skewY:0;opacity:0;transformPerspective:0;transformOrigin:50% 50%;"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="1500"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"
                             style="z-index: 5">
                         </div>

                         <div class="tp-caption theme_color_text skewfromrightshort customout"
                             data-x="85"
                             data-y="414"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"
                             data-captionhidden="on"
                             style="z-index: 6">Autorizado
                         </div> -->

                        <div class="tp-caption normal_text skewfromrightshort customout"
                             data-x="325"
                             data-y="414"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-endeasing="Power4.easeIn"
                             data-captionhidden="on"
                             style="z-index: 7">
                        </div>
                    </li>

                    <!-- SLIDE  -->
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        <img src="http://itapesegdistribuidora.com.br/images/slider/slide2/00_01.png"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <div class="tp-caption customin sfr customout"
                             data-x="600" data-hoffset="100"
                             data-y="20" data-voffset="0"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="1000"
                             data-easing="Power3.easeInOut"
                             data-endspeed="300"
                             style="z-index: 2"><img src="http://itapesegdistribuidora.com.br/images/slider/slide2/00_02.png" alt="">
                        </div>

                        <div class="tp-caption theme_color_text text-bold customin sfr customout"
                             data-x="820"
                             data-y="380"
                             data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="2000"
                             data-easing="Power3.easeInOut"
                             data-endspeed="300"
                             style="z-index: 3">
                        </div>

                        <!--   <div class="tp-caption darker_colors_bg white_content skewfromleftshort customout"
                               data-x="85"
                               data-y="280"
                               data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                               data-speed="800"
                               data-start="2500"
                               data-easing="Power4.easeOut"
                               data-endspeed="300"
                               data-endeasing="Power1.easeIn"
                               data-captionhidden="on"
                               style="z-index: 4">
                           </div> -->

                        <div class="tp-caption darker_colors_bg white_content skewfromleftshort customout"
                             data-x="85"
                             data-y="330"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="3000"
                             data-easing="Power4.easeOut"
                             data-endspeed="300"
                             data-endeasing="Power1.easeIn"
                             data-captionhidden="on"
                             style="z-index: 5"> Pagamento em até 12x no cartão.
                        </div>

                        <!--    <div class="tp-caption darker_colors_bg white_content skewfromleftshort customout"
                                data-x="85"
                                data-y="380"
                                data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                data-speed="800"
                                data-start="3500"
                                data-easing="Power4.easeOut"
                                data-endspeed="300"
                                data-endeasing="Power1.easeIn"
                                data-captionhidden="on"
                                style="z-index: 6">
                            </div>
                        </li>   -->

                        <!-- SLIDE  -->

                    <li data-transition="slidedown" data-slotamount="7" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        <img src="http://itapesegdistribuidora.com.br/images/slider/slide3/00_01.png"  alt="videobg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                        <div class="tp-caption medium_thin_grey pr theme_bg sfr customout"
                             data-x="25"
                             data-y="180"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="2500"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-captionhidden="on"
                             style="z-index: 2">Linha completa
                        </div>

                        <div class="tp-caption medium_thin_grey pr theme_bg sfr customout"
                             data-x="25"
                             data-y="250"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="3000"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-captionhidden="on"
                             style="z-index: 3">CFTV
                        </div>

                        <div class="tp-caption medium_thin_grey pr theme_bg sfr customout"
                             data-x="25"
                             data-y="320"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="3500"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-captionhidden="on"
                             style="z-index: 4">Alarmes
                        </div>

                        <div class="tp-caption medium_thin_grey pr theme_bg sfr customout"
                             data-x="25"
                             data-y="390"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="4000"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-captionhidden="on"
                             style="z-index: 5">Cercas Perimetrais
                        </div>

                        <div class="tp-caption medium_thin_grey pr theme_bg sfr customout"
                             data-x="25"
                             data-y="460"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="4500"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-captionhidden="on"
                             style="z-index: 5">Eletrica
                        </div>

                        <div class="tp-caption sfr customout"
                             data-x="350"
                             data-y="140"
                             data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                             data-speed="800"
                             data-start="1500"
                             data-easing="Power4.easeOut"
                             data-endspeed="500"
                             data-captionhidden="on"
                             style="z-index: 6"><img src="http://itapesegdistribuidora.com.br/images/slider/slide3/00_02.png" alt="">
                        </div>
                    </li>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </section><!-- /.col -->

    <section class="col-wrap compra_bg"><!-- /.promo_box -->
        <div class="container">
            <div class="row-fluid">
                <div style="text-align: center; text-decoration: none;" class="span12 probo_box themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left">
                    <h2>15 3272-2768</h2>
                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <section class="col-wrap content_pt" id="go_portfolio">
        <div class="container">
            <div class="row-fluid">
                <div class="span12 main_heading content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right portfolio_heading">
                    <h1>Parceiros</h1>

                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <section class="col-wrap mb content_pt" >
        <div class="container">
            <div class="row-fluid">
                <div class="span12 content_pt first portfolio_filter_category">
                    <div class="filter_category">
                        <ul class="option-set" id="filter">
                            <li><a href="#" data-filter="*" class="active" id="all">Todos</a></li>

                            @foreach($segments as $seg)
                                <li><a href="#" data-filter=".{{ $seg->id }}">{{ $seg->name }}</a></li>
                            @endforeach

                            {{--<li><a href="#" data-filter=".seg">Segurança Eletrônica</a></li>

                            <li><a href="#" data-filter=".cabos">Cabeamento</a></li>

                            <li><a href="#" data-filter=".redes">Redes</a></li>

                            <li><a href="#" data-filter=".fontes">Fontes | Nobreaks</a></li>

                            <li><a href="#" data-filter=".acessorios">Acessórios</a></li>--}}
                        </ul>
                    </div>
                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <section class="col-wrap content_pb content_pt parallax-4 themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">
        <div class="container">
            <div class="row-fluid mb">
                <div class="span12 first mb">
                    <ul class="span12 first pro gallery portfolio_item content_pt">

                        @foreach($brands as $brand)
                            <li class="portfolio mb
                                @foreach($brand->segments as $seg)
                                    {{ $seg->segment_id }}
                                @endforeach
                               ">
                                <div class="portfolio-mask">
                                    <div class="portfolio-link">
                                        <a href="#"><span class="icon-hand icon-left"></span></a>
                                        <a href="javascript:" target="_blank"><h1>{{ $brand->name }}</h1></a>
                                    </div>

                                    <img src="@if($brand->picture){{ str_replace('public', '/storage', $brand->picture) }} @else ../../noimage.png @endif" alt="image" title="{{ $brand->name }}"/>
                                </div>
                            </li>
                        @endforeach
                        {{--<li class="portfolio mb seg">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="https://www.seagate.com/br/pt/internal-hard-drives/hdd/skyhawk/" target="_blank"><h1>Seagate</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/seagate.png" alt="image" title="Seagate"/>
                            </div>
                        </li>
                        <li class="portfolio mb seg">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="https://www.multilaser.com.br/" target="_blank"><h1>Multilaser</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/multilaser.png" alt="image" title="Multilaser"/>
                            </div>
                        </li>
                        <li class="portfolio mb seg">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="https://jflalarmes.com.br/" target="_blank"><h1>JFL Alames</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/jfl.png" alt="image" title="Jfl Alarmes"/>
                            </div>
                        </li>
                        <li class="portfolio mb seg">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="#"><h1>Intelbras</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/intelbras.png" alt="image" title="Intelbras"/>
                            </div>
                        </li>
                        <li class="portfolio mb cabos redes">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href=""><h1>Wec Cabos</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/wec.png" alt="image" title="Wec Cabos"/>
                            </div>
                        </li>
                        <li class="portfolio mb seg fontes">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>NHS Nobreak</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/nhs.png" alt="image" title="NHS "/>
                            </div>
                        </li>
                        <li class="portfolio mb seg">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>Bulher Metalurgica</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/bulher.png" alt="image" title="Bulher Metalurgica"/>
                            </div>
                        </li>
                        <li class="portfolio mb ">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>TWG</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/TWG.png" alt="image" title="Luatek"/>
                            </div>
                        </li>
                        <li class="portfolio mb seg redes">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>Max Eletron</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/max.png" alt="image" title="Max Eletron"/>
                            </div>
                        </li>
                        <li class="portfolio mb cabos redes">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>Sohoplus</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/sohoplus.png" alt="image" title="Sohoplus"/>
                            </div>
                        </li>
                        <li class="portfolio mb redes">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>Tplink</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/tplink.png" alt="image" title="Tplink"/>
                            </div>
                        </li>
                        <li class="portfolio mb Seg">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>Unipower | Unicoba</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/uncoba.png" alt="image" title="Unicoba"/>
                            </div>
                        </li>
                        <li class="portfolio mb fontes">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>MCM Fontes</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/mcm.png" alt="image" title="MCM"/>
                            </div>
                        </li>
                        <li class="portfolio mb acessorios">
                            <div class="portfolio-mask">
                                <div class="portfolio-link">
                                    <a href="#"><span class="icon-link icon-left"></span></a>
                                    <a href="" target="_blank"><h1>Ilumi Materiais Elétricos</h1></a>
                                </div>
                                <img src="http://itapesegdistribuidora.com.br/images/marcas/ilumi.png" alt="image" title="Ilumi Materiais Elétricos"/>
                            </div>
                        </li>--}}
                    </ul>
                </div>

            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <section class="col-wrap subscribe_bg content_pt content_pb">
        <div class="container">
            <div class="row-fluid content_pt">
                <div class="span12 text-center content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">
                    <div class="subscribe content_pt">
                        <div class="subscribe_icon icon-mail-6 "></div>
                        <div class="content_heading subscribe_heading content_pt">
                            <h1>Newsletter</h1>
                        </div>
                        <p>Inscreva-se para receber nossas promoções.</p>

                        <input type="text" id="newsletter_name" class="subscrib_input" placeholder="Digite seu nome">

                        <input type="text" id="newsletter_email" class="subscrib_input" placeholder="Digite seu email">

                        <input type="submit" onclick="send_newsletter()" id="btn_submit_newsletter" class="purchase subscrib" value="Enviar">
                        <img src="../../loading.gif" style="width: 100px; height: 150px; display:none;" id="loading_gif">


                    </div>
                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <section class="col-wrap about_bg" id="go_about">
        <div class="container">
            <div class="row-fluid content_pt content_pb">
                <div class="span12 main_heading content_pt content_pb themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">
                    <h1>Quem Somos</h1>
                    <div class="clear"></div>
                </div>

                <div class="span7 first content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
                    <div class="tabs">
                        <div id="tabs-1" class="inner-tab1 content_pt">
                            <div class="tab_image">
                                <a href="#"><img src="{{ str_replace('public', '/storage', $about->picture) }}" class="mb" alt=""></a>
                            </div>
                            <div class="tab_content">
                                <div class="content_heading">
                                    <h1>{{ $about->title }}</h1>
                                </div>
                                <p style="text-align: justify"><?php echo html_entity_decode($about->about, ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <div class="span5 mb content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left">
                    <div class="span12 mini_border mb">
                        <div class="accordion first_accordion">
                            <h3>Nossa Missão</h3>
                            <div class="accordion_content">
                                <p style="text-align: justify"><?php echo html_entity_decode($about->our_mission, ENT_QUOTES, 'UTF-8') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <section class="col-wrap get_social_bg">
        <div class="container">
            <div class="row-fluid">
                <div class="span12 get_social text-center content_pt content_heading themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
                    <h1>Redes Sociais</h1>
                    <div class="get_social_content">
                        <ul>
                            <li>
                                <a class="normalTip" href="{{ $data->facebook }}" target="_blank" title="Facebook">
                                    <img src="../../fb_icon.png" alt="Facebook" class="social_media_icon">
                                </a>
                            </li>
                            <li>
                                <a class="normalTip facebook" target="_blank" href="{{ $data->messenger }}" title="Messenger">
                                    <img src="../../messenger_icon.png" alt="Messenger" style="width: 40px; height: 40px;">
                                </a>
                            </li>
                            <li>
                                <a class="normalTip gplus" target="_blank" href="{{ $data->instagram }}" title="Instagram">
                                    <img src="../../insta_icon.png" alt="Instagram" class="social_media_icon">
                                </a>
                            </li>
                            <li>
                                <a class="normalTip gplus" target="_blank" href="{{ $data->skype }}" title="Skype">
                                    <img src="../../skype_icon.png" alt="Skype" class="social_media_icon">
                                </a>
                            </li>
                            <li>
                                <a class="normalTip gplus" target="_blank" href="https://api.whatsapp.com/send?phone={{ $data->whatsapp }}" title="Whatsapp">
                                    <img src="../../whatsapp_icon.png" alt="Whatsapp" class="social_media_icon">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <section class="col-wrap about_bg" id="go_faq">
        <div class="container">
            <div class="row-fluid content_pt content_pb">
                <div class="span12 main_heading content_pt content_pb themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">
                    <h1>faq</h1>
                    <div class="clear"></div>
                </div>

                <div class="span12 first">

                    <div class="span12 mb content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left">
                        <div class="span12 mini_border mb">
                            <?php $i = 0; ?>
                            <div class="accordion @if($i == 0) first_accordion @endif">
                                @foreach($faq as $f)
                                    <h3>{{ $f->question }}</h3>
                                    <div class="accordion_content">
                                        <p style="text-align: justify;">
                                            <?php echo html_entity_decode($f->answer, ENT_QUOTES, 'UTF-8'); ?>
                                        </p>
                                    </div>
                                @endforeach
                                {{--<h3>TROCAS, DEVOLUÇÕES E ASSISTÊNCIA TÉCNICA</h3>
                                <div class="accordion_content">
                                    <p style="text-align: justify;">
                                        Toda ocorrência de troca, devolução ou garantia/assistência deve ser comunicada imediatamente à nossa Central de Suporte ao Cliente, por um de nossos canais de contato:<br/>
                                        • Email contato@itapesegdistribuidora.com.br<br/>
                                        • Telefones de Atendimento / WhatsApp<br/><br/>
                                        No contato será necessário informar:<br/>
                                        • Número do pedido / NF ou CNPJ do comprador.<br/>
                                        • Motivo da ocorrência.<br/>
                                        Nunca envie nada à Itapeseg Distribuidora sem comunicação prévia.<br/>
                                    </p>
                                </div>--}}
                            </div>
                        </div>
                    </div>


                    {{--<div class="span6 mb content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left">
                        <div class="span12 mini_border mb">
                            <div class="accordion first_accordion">
                                <h3>POLÍTICA DE TROCA E DEVOLUÇÃO</h3>
                                <div class="accordion_content">
                                    <p style="text-align: justify;">
                                        • Prazo de Solicitação<br/>
                                        O prazo máximo para solicitar troca ou devolução é de 7 dias corridos contados a partir da data do recebimento do produto pelo cliente.<br/>
                                        • Custo de Troca ou Devolução<br/>
                                        De acordo com o motivo alegado pelo comprador iremos fazer a avaliação e estaremos indicando em nosso contato. Não nos envie nada sem previamente acordado.<br/>
                                        • Condição do Produto<br/>
                                        O produto não pode conter sinais de uso, e deve ser devolvido na íntegra para ser comercializado novamente.
                                        Deverá ser encaminhado na embalagem original, com todos os manuais, acessórios e acompanhado da Nota Fiscal Original.<br/>
                                        • Resolução de Troca<br/>
                                        Após o produto chegar em nosso Centro de Distribuição, e atender todos os requisitos necessários para efetuar a troca, entraremos em contato para proceder com a troca.<br/>

                                        • Resolução de Devolução<br/>
                                        Após o produto chegar em nosso Centro de Distribuição, e atender todos os requisitos necessários para efetuar a devolução, faremos a devolução integral do valor do produto, que será através de transferência bancária/depósito ou cancelamento pela operadora de cartão de crédito caso a compra seja parcelada.<br/>
                                    </p>
                                </div>

                                <h3>POLÍTICA DE GARANTIA E ASSISTÊNCIA TÉCNICA</h3>
                                <div class="accordion_content">
                                    <p style="text-align: justify;">
                                        • A Itapeseg Distribuidora tem 30 (trinta) dias corridos, a contar da data do recebimento do produto em nosso Centro de Distribuição, para resolver a ocorrência comunicada pelo cliente à nossa Central de Atendimento. Lembrando, não nos envie nada antes de entrar em contato.<br/>
                                        • Todos os produtos passarão por uma prévia análise técnica para verificação da existência de defeito de fabricação e/ou conserto.<br/>
                                        • Assim que feita a análise entraremos em contato para a troca e/ou conserto, podendo ser em garantia ou passado o orçamento para aprovação, dependendo da análise feita pela nossa equipe técnica.<br/>
                                        • Equipamentos que não apresentarem defeito em bancada será cobrado a hora técnica e os fretes de ida/volta.<br/>
                                        • Contamos com uma Equipe Técnica especializada. Antes de nos enviar o produto, pedimos que entre em contato para a troca de Informações técnicas, descartando os vícios de instalações.<br/>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>--}}
                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <section class="col-wrap parallax-1">
        <div class="container">
            <div class="row-fluid">
                <div class="span12 text-center parallax_content themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
                    <h1> </h1>
                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->

    <!-- / <section class="col-wrap client_bg">
         <div class="container">
             <div class="row-fluid">
                 <div class="span12 clients_logo text-center themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
                     <div id="myCarousel3" class="carousel slide">
                         <!-- Carousel items -->
    <!-- <div class="carousel-inner text-center">
        <div class="active item clients_logo ">
            <ul class="span12 first">
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
            </ul>
        </div>

        <div class="item clients_logo">
            <ul class="span12 first">
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
                <li><img src="http://itapesegdistribuidora.com.br/images/00_29.png" alt="Clients Logo" title="Logo"></li>
            </ul>
        </div>
    </div>

    <div class="carousel3_button">
        <a href="#myCarousel3" class="icon-arrow-left-5  carousel3_button_pre" data-slide="prev"></a>
        <a href="#myCarousel3" class="icon-arrow-right-5  carousel3_button_next" data-slide="next"></a>
    </div>
</div><!-- /.carousel -->

    <!-- </div>
 </div><!-- /.row-fluid -->
</div><!--Container-->
<!--</section> --> <!-- /.col -->

<section class="col-wrap get_social_bg" id="go_contact">
    <div class="container">
        <div class="row-fluid">
            <div class="span12 main_heading content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
                <h1>Contato</h1>
            </div>
            <div class="span6 first content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
                <div class="contactform">

                    <label for="name" class="lbl" id="lbl_name" style="color:red; display: none;">Preencha este campo</label>
                    <input type="text" class="input_contact" id="name" name="name" placeholder="Digite seu nome" required/>

                    <label for="email" class="lbl" id="lbl_email" style="color:red; display: none;">Preencha este campo</label>
                    <input type="text" class="input_contact" id="email" name="email" placeholder="Digite seu email" required/>

                    <label for="phone" class="lbl" id="lbl_phone" style="color:red; display: none;">Preencha este campo</label>
                    <input type="text" class="input_contact phone" id="phone" name="phone" placeholder="Digite seu telefone" />

                    <label for="message" class="lbl" id="lbl_message" style="color:red; display: none;">Preencha este campo</label>
                    <textarea name="message" id="message" required class="input_contact"
                              onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">Mensagem</textarea>

                    <div class="notifications" id="contact_form_message_box" style="display:none;">
                        <img src="../../loading.gif" style="width: 100px; height: 150px;">
                        <span>Estamos enviando sua mensagem...</span>
                    </div>

                    <input type="submit" value="Enviar" class="rd-button contact_submit submit_button" id="btn_submit" />

                </div>
            </div>

            <div class="span6 our_location content_pt themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible right-to-left copyright_text">
                <h1>Horario de Funcionamento</h1><br/>
                <p>
                    <?php echo html_entity_decode($data->opening_hours, ENT_QUOTES, 'UTF-8'); ?>

                </p>
                <p>
                    <?php echo html_entity_decode($data->address, ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <br/>

                <h1>Canais de atendimento</h1><br/>

                <div class="social_icon2">
                    <ul>
                        <li>
                            <a class="normalTip facebook" target="_blank" href="{{ $data->messenger }}" title="Messenger">
                                <img src="../../messenger_icon.png" alt="Messenger" style="width: 40px; height: 40px; margin-top: -3px;">
                            </a>
                        </li>

                        <li>
                            <a class="normalTip gplus" target="_blank" href="{{ $data->skype }}" title="Skype">
                                <img src="../../skype_icon.png" alt="Skype" class="social_media_icon">
                            </a>
                        </li>
                        <li>
                            <a class="normalTip gplus" target="_blank" href="https://api.whatsapp.com/send?phone={{ $data->whatsapp }}" title="Whatsapp">
                                <img src="../../whatsapp_icon.png" alt="Messenger" class="social_media_icon">
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div><!-- /.row-fluid -->
    </div><!--Container-->
</section><!-- /.col -->

<section class="col-wrap">
    <div class="row-fluid">
        <div class="google_map themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">
            <iframe width="100%" height="459" frameborder="0" scrolling="off" style="pointer-events:none" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.448140686887!2d-48.04593428502169!3d-23.588255784669588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cc938bfbcaab%3A0xf66ac7bd856ef0b0!2sITAPESEG%!5e0!3m2!1spt-BR!2sbr!4v1594088417196!5m2!1spt-BR!2sbr"></iframe>
        </div>
    </div><!-- /.row-fluid -->
</section><!-- /.col -->

<footer>

{{--
    <section class="col-wrap footer_bg content_pb content_pt">
        <div class="container">
            <div class="row-fluid content_pt content_pb">
                <div class="span6 footer_heading themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible left-to-right">
                    <div class="widget_content content_pt about_showcase">
                        <a href="#"><img src="http://itapesegdistribuidora.com.br/images/footer_logo.png" alt="logo" title="Footer Logo"/></a>
                        <p></p>

                    </div>

                    <div class="about_showcase_left">
                        <div class="location_content">
                            <span class="icon-location-5"></span>
                            <p>Rua Prof. Francisco Válio Nº 579<br/>CEP: 18.200-320<br/>Centro - Itapetininga - SP</p>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="about_showcase_right">
                        <div class="location_content">
                            <span class="icon-link"></span>
                            <p>15 3272 - 2768<br/></p>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="span2 footer_heading themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">

                </div>

                <div class="span4 footer_heading themeapt_animated_text themeapt_text  themeapt_animate_when_almost_visible bottom-to-top">
                    <h1>Menu</h1>

                    <div class="widget_content content_pt popular_post">
                        <div class="post_content mb">
                            <a href="">Marca</a>
                        </div>

                        <div class="post_content mb">
                            <a href="">Suporte</a>
                        </div>

                        <div class="post_content post_content_last mb">
                            <a href="">Webmail</a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>


            </div><!-- /.row-fluid -->
        </div><!--Container-->
    </section><!-- /.col -->
--}}

    <section class="col-wrap content_pb content_pt">
        <div class="container">
            <div class="row-fluid">
                <div class="span12 text-center copyright_text content_pt">
                    <p>Copyright 2020.Itapeseg Distribuidora LTDA Todos os direitos reservados. Criado Por <a href="">Steve Designer</a>.
                </div>
            </div><!-- /.row-fluid -->
        </div><!--Container-->
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
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>-->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<!--Bootstrap UI-->
<script type="text/javascript" src="js/bootstrap.js"></script>

<!--Jquery UI-->
<script type="text/javascript" src="js/jquery-ui-1.10.2.js"></script>

<!--Isotope JS-->
<script type="text/javascript" src="js/jquery.isotope.js"></script>

<!--Align JS-->
<script src="js/modernizr-2.5.3.min.js"></script>
<script src="js/jquery.masonry.min.js"></script>

<!--Scroll js-->
<script type="text/javascript" src="js/jscroll.js"></script>
<script src="js/custom-scroll-folio.js" type="text/javascript"></script>

<!--Innerfade-->
<script type='text/javascript' src='js/jquery.innerfade.js'></script>

<!--AD Gallery-->
<script type="text/javascript" src="js/jquery.ad-gallery.js"></script>

<!--Parallax JS-->
<script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>

<!--image animation Javascripts Start -->
<script type='text/javascript' src='js/waypoints.js'></script>
<script type='text/javascript' src='js/image_animation.js'></script>

<!-- pie-chart JS-->
<script src="js/jquery.easy-pie-chart.js" type="text/javascript" charset="utf-8"></script>

<!--jquery.prettyPhoto-->
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

<!--Custom JS-->
<script type="text/javascript" src="js/jquery.custom.js"></script>

<script type="text/javascript" src="../../js/common.js"></script>


<script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>

<script type="text/javascript" src="../../js/mask.js"></script>
<script type="text/javascript" src="../../js/contact.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

</body> <!--END BODY-->
</html> <!--END HTML-->
