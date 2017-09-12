<?php 

/*

    Template Name:Home_1
*/
get_header();
?>

            <div class="row">
                <!--colleft-->
                <div class="col-md-8 col-sm-12">
                    <div class="box-caption">
                        <span>Last news</span>
                    </div>
                    <!--list-news-cate-->
                    <?php 
                         $recent = new WP_Query( array(
                        'posts_per_page' => 2,
                        'order' => 'DESC',
                      ) );
                    
                    ?>
                    <div class="list-news-cate">
                       <?php 
                          if ( $recent->have_posts() ) : ?>

                     <?php while ( $recent->have_posts() ) : $recent->the_post(); ?>

                           
                        <article  <?php post_class('news-cate-item');?>>
                            <div class="row">
                              
                                
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <a href="#">
                                        <?php 
                                    the_post_thumbnail('full');?>
                                    </a>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <h3><a href="<?php echo esc_url( get_permalink() );?>"> <?php the_title();?> </a></h3>
                                    
                                    <!--
                                        <?php /*if(isset($_session['author_name'])):
                                            the_author();
                                        else:
                                            the_author_posts_link();
                                            
                                        endif;*/ ?>
                                    
                                    -->
                                    <div class="meta-post">
                                      <?php
                                        ?>
                                       <?php if(isset($_session['user_name'])):?> 
                                        
                                            <?php /*echo get_the_author_meta('display_name', $recent["post_author"]);*/
                                              the_author();
                                            
                                       
                                        
                                        
                                            else:?>
                                                <?php   the_author_posts_link() ;
                                                    
                                           
                                                    ?>
        
                                        
                                    
                                        <?php endif; ?>
                                        <em></em>
                                        <span>
                                            <?php echo get_the_date('d-M-Y')?>
                                        </span>
                                        
                                    </div>
                                    
                                    <p><?php 
                                         
                                          //  the_excerpt(); display post excerpt here
                                        ?>
                                        <?php the_excerpt(); ?>
                                        </p>
                                        
                                        
                                </div>
                              
                            </div>
                        </article>
                        
                         <?php  endwhile;
                                endif;
                              wp_reset_postdata();
                            ?>
                        
                       
                    </div>
                </div>

                <!--colright-->
                <div class="col-md-4 col-sm-12">
                 <?php get_sidebar();?>
                </div>
            </div>
</div>
</div>
<?php
get_footer();
?>
?>