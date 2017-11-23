<?php 
session_start();
get_header(); ?>



<!-- This sets the $curauth variable -->
<div class="row">
                <!--colleft-->
        <div class="col-md-8 col-sm-12">
           
            <?php
            $curauth = (isset($_GET['author_name'])) ? get_user_by('ID', $author_name): get_userdata(intval($author_name));
            $_SESSION['author_name']=$author;
            ?>
        <div class="author_info">
	<?php printf(__('<span class="author_name">Author: '.ucfirst($author_name).''.'</span><span class="posts_count">Number of posts:<strong> %d</strong></span>'),count_user_posts($author) ); ?>
       
    </div>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('template-parts/content','content');?>
                        
                    <?php endwhile; 
           
                      endif; 
             numeric_posts_nav();
            ?>
           
        </div>
             <div class="col-md-4 col-sm-12">
                 <?php get_sidebar();?>
                </div>
            </div>
</div>
</div>


<?php get_footer(); ?>