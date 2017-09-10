<?php 
/*

    Template Name:Home
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
                    <div class="list-news-cate">
                       <?php 
                           $recent_posts = wp_get_recent_posts('numberposts=5&order=DESC');
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
                                    
                                    <div class="meta-post">
                                       <?php if(isset($_session['author_name'])):?> 
                                        <a href="<?php the_author();?> ">
                                            <?php echo get_the_author_meta('display_name', $recent["post_author"]);?>
                                        </a>
                                        <?php endif; ?>
                                        <em></em>
                                        <span>
                                            <?php echo $recent['post_date'];?>
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