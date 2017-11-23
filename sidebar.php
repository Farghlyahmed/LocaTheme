<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package loca
 */

/*if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}*/
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->






 
                    <!--tab popular-->
                    <ul role="tablist" class="tab-popular">
                        
                        <li class="active">
                            <a href="#tab1" role="tab" data-toggle="tab">
                                POPULAR
                            </a>
                        </li>
                        <li >
                            <a href="#tab2" role="tab" data-toggle="tab">
                                LATEST
                            </a>
                        </li>
                        <li>
                            <a href="#tab3" role="tab" data-toggle="tab">
                                RANDOM
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                       <div role="tabpanel" class="tab-pane active" id="tab1">
                           
                            <ul class="list-news-popular">
                              <?php 
                              
                            query_posts('meta_key=wpb_post_views_count&orderby=meta_value_num&order=DESC&posts_per_page=5');
                               /*$popularpost  = new WP_Query( array( 'posts_per_page' => 5, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );*/

                                while (have_posts() ) :the_post();?>
                                       <li>
                                        <a href="#">
                                            <?php the_post_thumbnail();
                                            ?>
                                       </a>
                                       <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php  limit_word_count(the_title()); ?></a></h3>
                                    <div class="meta-post">
                                        <a href="<?php the_author_link(); ?>">
                                            <?php the_author(); ?>
                                        </a>
                                        <em></em>
                                       <span>
                                           <?php 
                                           /*
                                              * the_date() only work once
                                              * we use get_the_date();
                                           
                                           */
                                             echo get_the_date('d M Y'); 
                                            ?>
                                        </span>
                                    </div>
                                </li>  
                                <?php
                                    endwhile;

                                    // Reset Post Data
                                    wp_reset_postdata();  
                                ?>
                                
                            </ul>
                            
                        </div>
                        
                        <div role="tabpanel" class="tab-pane" id="tab2">
                           
                            <ul class="list-news-popular">
                     
                           
                           <!--?php $postslist = get_posts('numberposts=10&order=DESC'); foreach ($postslist as $post) : setup_postdata($post); ?-->  <!--?php endforeach; ?-->
                            <?php
                                
                                    
                                $recent_posts = wp_get_recent_posts('numberposts=5&order=DESC');
                                foreach( $recent_posts as $recent ):?>
                                 <li> 
                                 <a href="#">
                                            <?php echo get_the_post_thumbnail($recent['ID'], 'thumbnail');?>
                                            </a>
                                    <h3><a href=" <?php echo get_permalink($recent["ID"]); ?>">  
                                    
                                    <?php echo limit_word_count($recent['post_title']); ?></a> </h3>
                                    <div class="meta-post">
                                        <a href="#">
                                           <?php echo get_the_author_meta('display_name', $recent["post_author"]); ?>
                                         
                                        </a>
                                        <em></em>
                                        <span>
                                            <?php echo date( 'd M Y', strtotime( $recent['post_date'] ) );?>
                                            
                                        </span>
                                    </div>
                                    </li> 
                                    
                              <?php 
                                endforeach;
                                wp_reset_query();
                            ?>
                             
                            </ul>

                        </div>
                        
                        <div role="tabpanel" class="tab-pane " id="tab3">
                           
                            <ul class="list-news-popular">
                               <?php 
                                    //Create WordPress Query with 'orderby' set to 'rand' (Random)
                                    $the_query = new WP_Query( array ( 'orderby' => 'rand', 'posts_per_page' => '5' ) );
                                    // output the random post
                                    while ( $the_query->have_posts() ) : $the_query->the_post();?>
                                       <li>
                                        <a href="#">
                                            <?php the_post_thumbnail();
                                            ?>
                                       </a>
                                       <h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo limit_word_count(the_title()); ?></a></h3>
                                    <div class="meta-post">
                                        <a href="<?php echo the_author_link(); ?>">
                                            <?php the_author(); ?>
                                        </a>
                                        <em></em>
                                        <span>
                                            <?php echo get_the_date('d M Y');  ?>
                                        </span>
                    
                                    </div>
                                </li>  
                                <?php
                                    endwhile;

                                    // Reset Post Data
                                    wp_reset_postdata();  
                                ?>
                               
                            </ul>
                            
                        </div>
                    </div>

                    <!-- subcribe box-->
                    <div class="subcribe-box">
                        <h3>NEWSLETTER</h3>
                        <p>Enter your email address below to subscribe to my newsletter</p>
                        <input type="text" placeholder="Your email address..." />
                        <button class="my-btn">Subscribe</button>
                    </div>
                    <!-- connect us-->
                    <div class="connect-us">
                        <div class="widget-title">
                            <span>
                                CONNECT & FOLLOW
                            </span>
                        </div>
                        <ul class="list-social-icon">
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

                    <!-- special post-->
                    <div class="connect-us">
                        <div class="widget-title">
                            <span>
                                Special post
                            </span>
                        </div>
                        <div class="list-special">

                            <article class="news-two-large">
                            
                                <?php
                               query_posts('meta_key=wpb_post_views_count&orderby=meta_value_num&order=ASC&posts_per_page=2');
                                while (have_posts()) :the_post();?>
                                <a href="#">
                                  <?php the_post_thumbnail(); ?>
                                </a>
                                <h3>
                                <a href="<?php echo esc_url( get_permalink() ); ?>">
                                <?php  title_words(the_title(),10); ?></a>
                                </h3>
                                <div class="meta-post">
                                    <a href="<?php the_author_link();?>">
                                        <?php the_author(); ?>
                                    </a>
                                    <em></em>
                                    <span>
                                        <?php echo get_the_date('d M Y'); ?>
                                    </span>
                                </div>
                            <?php
                                    endwhile;

                                    // Reset Post Data
                                    wp_reset_postdata();  
                                ?>
                            </article>

                        </div>
                    </div>
                    <!-- advertisement-->
                    <div class="ads hidden-sm hidden-xs">
                        <p>advertisement</p>
                        <!--<img alt="" src="<?php bloginfo('template_url'); ?>/assets/images/ads.jpg" class="img-responsive" />-->
                    </div>
                
            
            
        
