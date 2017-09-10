<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="congnd91">
    <title>locatheme</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/assets/images/favicon.png">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/assets/images/favicon.png">
    <!-- Online Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <!-- Vender -->
    <link href="<?php bloginfo('stylesheet_directory');?>/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_directory');?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_directory'); ?>/assets/css/normalize.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_directory');?>/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <!-- Main CSS (SCSS Compile) -->
    <!-- JavaScripts -->
    <!--<script src="js/modernizr.js"></script>-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php wp_head(); ?>
</head>
<body>
    <!--preload-->
    <div class="loader" id="page-loader">
        <div class="loading-wrapper">
        </div>
    </div>
    <!--menu mobile-->
    <nav class="menu-res hidden-lg hidden-md ">
        <div class="menu-res-inner">
            <ul>
               <?php  wp_nav_menu(array(
                    'theme_location' =>'primary'
                    )); ?>
            </ul>
        </div>
    </nav>
    
    <div class="page">
       
        <div class="container">
            <!--header-->
            <header class="header">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <a href="#" class="logo">
                            <img alt="Logo" src="<?php bloginfo('template_directory');?>/assets/images/logo.png" />
                        </a>
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-8  text-right col-xs-12 hidden-xs">
                        <div class="owl-carousel owl-special">
                            <div>
                               
                                <div class="special-news">
                                    <a href="#">
                                        <img alt="" src="<?php  bloginfo('template_directory');?>/assets/images/product/17.jpg" />
                                    </a>
                                    <h3><a href="#">Apple iPhone 7 review </a></h3>
                                    <div class="meta-post">
                                        <a href="#">
                                            Ashley Ford
                                        </a>
                                        <em></em>
                                        <span>
                                            21 Sep 2016
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="special-news">
                                    <a href="#">
                                        <img alt="" src="<?php  bloginfo('template_directory');?>/assets/images/product/18.jpg" />
                                    </a>
                                    <h3><a href="#">YouTube Go is a new app for offline viewing and sharing </a></h3>
                                    <div class="meta-post">
                                        <a href="#">
                                            Super User
                                        </a>
                                        <em></em>
                                        <span>
                                            25 Sep 2016
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--menu-->
            <nav class="menu font-heading">
                <div class="menu-icon hidden-lg hidden-md">
                    <i class="fa fa-navicon"></i>
                    <span>MENU</span>
                </div>
                <ul class="hidden-sm hidden-xs">
                    <li>
                    <?php wp_nav_menu(array(
                            'location_theme'=>'primary'
                        ));
                        ?>
                    </li>
                    
                    
                </ul>
                <div class="search-icon">
                    <div class="search-icon-inner">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="search-box">
                        <input type="text" placeholder="Search..." />
                        <button>Search</button>
                    </div>
                </div>
            </nav>
