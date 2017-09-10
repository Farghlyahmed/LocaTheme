<?php 
session_start();
get_header(); ?>



<!-- This sets the $curauth variable -->
<div class="container">
    <div class="row" id="primary">
        <main id="content" class="col-sm-8" role="main">
           
            <?php
            $curauth = (isset($_GET['author_name'])) ? get_user_by('name', $author_name): get_userdata(intval($author));
            $_SESSION['user_name']=$author;
            ?>
           
	<?php printf(__('<h3 class="count-posts">Number of posts published by author '.$author_name.': %d</h3>'),count_user_posts($author) ); ?>
        <?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
        <!-- 32 is the size of avater -->
        <?php /* echo get_avatar( get_the_author_meta( 'ID' ),32);*/ ?>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part('template-parts/content','content');?>
                        
                    <?php endwhile; 
                      endif; ?>
        </main>
        <aside class="col-sm-4">
            <?php get_sidebar(); ?>
        </aside>
     </div>
</div>

<?php get_footer(); ?>