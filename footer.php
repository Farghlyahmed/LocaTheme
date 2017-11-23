<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package loca
 */

?>

	<!-- #content -->
    <!--start of footer section-->
	<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4  col-sm-4 col-xs-12">
                       <!-- logo and about section-->
                        <div class="about">
                            <a href="index.php" class="logo">
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
                            <?php if( get_theme_mod( 'footer_text_block') != "" ): ?>
                                 <p class="footer-text">
                                 <?php echo get_theme_mod( 'footer_text_block'); ?>
                                 </p>
                            <?php else :?>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                            <?php endif;?>
                        </div>
                        <!--end of logo and about section-->
                    </div>
                    <!--start of category section-->
                    <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                        <h3>Hot Categories</h3>
                        
                        <ul class="list-category">
                            <?php
                                $args = array(
                                'title_li' => '',
                                'orderby' => 'count',
                                );
                            
                                wp_list_categories( $args );
                            
                            ?>
                            <!--<li><a href="business.html">Economy</a></li>
                            <li><a href="business.html">politics</a></li>
                       -->
                        </ul>
                        
                    </div>
                    <!--end of category section-->
                    
                    <!--start of hot tags-->
                    <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                        <h3>HOT TAGS</h3>

                        <div class="list-tags">
                            
                          <?php  
                             $args = array(
                            'smallest'                  => 14,
                            'largest'                   =>18,
                            'unit'                      => 'px', 
                            'number'                    => 10,  
                            'format'                    => 'flat',
                            'separator'                 => "\n",
                            'orderby'                   => 'name', 
                            'order'                     => 'ASC',
                            'exclude'                   => null, 
                            'include'                   => null, 
                            'topic_count_text_callback' => default_topic_count_text,
                            'link'                      => 'view', 
                            'taxonomy'                  => 'post_tag', 
                        );
                            ?>
                            <?php if ( function_exists( 'wp_tag_cloud' ) ) : ?>    
                            <?php wp_tag_cloud( $args ); ?>
                            <!--<a href="#">News</a>
                            <?php endif;?>
                          
                    <!-- end of hot tags-->
                    
                </div>
                
            </div>
                <!--All right-->
                <div class="allright">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <p>    © 2017 <a href="#">Future news</a>. All rights reserved.</p>
                        </div>
                        <!--start of social media-->
                        <div class="col-sm-6 col-xs-12">
                            <ul class="list-social-icon list-social-icon-footer">
                           
                            
                            <li>
                                     <a href="#" class="facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="google">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="youtube">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="pinterest">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="rss">
                                        <i class="fa fa-rss"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </footer>

</div><!-- #page -->

<?php wp_footer();?>
                <!-- JQuery framework-->
 <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/assets/js/jquery.min.js"></script>
     <!--bootstrap framework-->
 <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/assets/js/bootstrap.js"></script>
      <!--nicescroll fplugin-->
   <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/assets/js/jquery.nicescroll.js"></script> 

     <!--scrollto fplugin-->
 <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/assets/js/jquery.scrollto.js"></script>
 
     <!--owl carsoul plugin-->
 <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/assets/js/owl.carousel.min.js"></script>
 
     <!--javascript file-->
 <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/assets/js/main.js"></script>
</body>
</html>
