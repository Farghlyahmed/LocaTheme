<?php 
/*

    Template Name:Home
*/
get_header();
?>

            <div class="row">
                <!--colleft-->
                <div class="col-md-8 col-sm-12">
                   <!--slider -->
                   
                    <!--sportlight-->
                    <section class="owl-carousel owl-spotlight">
                         <?php 
                            //Create WordPress Query with 'orderby' set to 'rand' (Random)
                            $the_query = new WP_Query( array ( 'orderby' => 'date', 'posts_per_page' => '3','post_type'=>'movies' ) );
                            // output the random post
                            while ( $the_query->have_posts() ) : $the_query->the_post();?>
                                 
                        <div>
                            <article class="spotlight-item">
                                <div class="spotlight-img">
                                 <?php the_post_thumbnail('full'); ?>
                                  
                                </div>
                                <div class="spotlight-item-caption">
                                    <h2 class="font-heading">
                                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                                            <?php the_title();?>
                                        </a>
                                    </h2>
                                </div>
                            </article>
                        </div>
                        <?php
                                    endwhile;

                                    // Reset Post Data
                                    wp_reset_postdata();  
                                ?>
                        
                        
                    </section>

                   
                    <div class="box-caption">
                        <span>Last news</span>
                    </div>
                    <!--list-news-cate-->
                    <div class="list-news-cate">
                       <?php 
                         // orderby=modified === derby=date
                           $recent_posts = wp_get_recent_posts('numberposts=5&post_status= publish&order=DESC&orderby=modified');
                           foreach( $recent_posts as $recent ):?>
                           
                        <article  <?php post_class('news-cate-item');?>>
                            <div class="row">
                              
                                
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <a href="#">
                                        <?php echo get_the_post_thumbnail($recent['ID'], 'full');?>
                                    </a>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <h3><a href="<?php echo get_permalink($recent["ID"]);?>"><?php echo $recent['post_title'];?></a></h3>
                                    
                                    <!--
                                        <?php /*if(isset($_session['author_name'])):
                                            the_author();
                                        else:
                                            the_author_posts_link();
                                            
                                        endif;*/ ?>
                                    
                                    -->
                                    <div class="meta-post">
                                      <?php $author =get_the_author_meta('display_name',$recent["post_author"]);
                                        ?>
                                       <?php if(isset($_session['user_name'])):?> 
                                        
                                            <?php /*echo get_the_author_meta('display_name', $recent["post_author"]);*/
                                              echo $author;
                                            
                                       
                                        
                                        
                                            else:?>
                                                <a href="<?php echo $_SERVER['REQUEST_URI'].'author/'.$author; ?> ">
                                               <?php  echo $author ;
                                                    
                                           
                                                    ?>
        
                                        
                                        </a>
                                        <?php endif; ?>
                                        <em></em>
                                        <span>
                                            <?php echo get_the_date('d-M-Y')?>
                                        </span>
                                        
                                    </div>
                                    
                                    <p><?php 
                                         
                                          //  the_excerpt(); display post excerpt here
                                        ?>
                                        <?php echo limit_content($recent['post_content'],50);?>
                                        </p>
                                        <a class="moretag btn  pull-right" href="<?php echo get_permalink($recent["ID"]);?>">contine-reading &raquo;</a>
                                </div>
                              
                            </div>
                        </article>
                        
                         <?php endforeach;
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