<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="congnd91">
    <?php
        if ( ! function_exists( '_wp_render_title_tag' ) ) {
            function theme_slug_render_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php
            }
            add_action( 'wp_head', 'theme_slug_render_title' );
        }
        ?>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/assets/images/favicon.png">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/assets/images/favicon.png">
    <!-- Online Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <!-- Vender -->
    <link href="<?php bloginfo('stylesheet_directory');?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php bloginfo('stylesheet_directory');?>/assets/css/font-awesome.min.css" rel="stylesheet" />
  
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
               <?php wp_nav_menu(array(
                            'location_theme'=>'primary',
                            'depth'         =>'0',
                            'container'     =>false,
                            'menu_class'    =>'nav navbar-nav',
                            'walker'        => new BootstrapNavMenuWalker()
                        ));
                        ?>
            </ul>
        </div>
    </nav>
    
    <div class="page">
       
        <div class="container">
            <!--header-->
            <header class="header">
                <div class="row">
                   <!-- start-->
                 
                   <!-- end  -->
                    <div class="col-md-3 col-sm-4 col-xs-12">
                      <a href="index.php">
                       <?php
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            if ( has_custom_logo() ) {
                                    echo '<img src="'. esc_url( $logo[0] ) .'">';
                            } else {?>
                                   <img src=<?php bloginfo('template_url');?>/assets/images/loca.png />;
                           <?php  }
                            ?>
                       </a>
                       
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-8  text-right col-xs-12 hidden-xs">
                        <div class="owl-carousel owl-special">
                             <?php  $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '5' ) );
                                    // output the random post
                                while ( $the_query->have_posts() ) : $the_query->the_post();?>
                            <div>
                                <div class="special-news">
                                    <a href="<?php echo esc_url( get_permalink() );?>">
                                        <?php the_post_thumbnail(); ?>
                                    </a>
                                    <h3><a href="<?php echo esc_url( get_permalink() );?>"><?php limit_word_count(the_title());?> </a></h3>
                                    <div class="meta-post">
                                        <a href="#">
                                            <?php the_author(); ?>
                                        </a>
                                        <em></em>
                                        <span>
                                            <?php echo get_the_date('d-M-Y')?>
                                        </span>
                                    </div>
                                </div>
                              
                            </div>
                              <?php endwhile;?>
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
                    <?php 
                        wp_nav_menu(array(
                            'location_theme'=>'primary',
                            'depth'         =>'0',
                            'container'     =>false,
                            'menu_class'    =>'nav navbar-nav',
                            'walker'        => new BootstrapNavMenuWalker()
                        ));
                        ?>
                    </li>
                    
                    
                </ul>
                <div class="search-icon">
                    <div class="search-icon-inner">
                        <i class="fa fa-search"></i>
                    </div>
                <form role="search" method="get" class="search-form" action="<?php echo   home_url( '/' ); ?>">
                    <div class="search-box">
                        <input type="text" name='s' id='s' placeholder="Search..."  value="<?php echo get_search_query(); ?>"/>
                        <button type="submit" id="searchsubmit">Search</button>
                    </div>
                    </form>
                </div>
            </nav>
