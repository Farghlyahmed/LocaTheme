<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loca
 */

?>

                                    
                             
                                
<article id="post-<?php the_ID(); ?>" <?php post_class('news-cate-item'); ?>>
	<div class="row">
		
        
       <?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="col-md-5 col-sm-5 col-xs-12">
           
            <a href="#">
               <?php the_post_thumbnail();?>
            </a>
        </div>
	
		<?php
     endif; ?>
     <div class="col-md-7 col-sm-7 col-xs-12">
        <?php
		if ( is_singular() ) :
			the_title( '<h3>', '</h3>' );
		else :
			the_title( '<h3 ><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;
        ?>
            <div class="meta-post">
                <?php if(isset($_session['user_name'])):
                    the_author();
                else:
                    the_author_posts_link();
                 endif; ?>
                <em></em>
                <span>
                    <?php get_the_date();?>
                </span>
            </div>
        <?php  if ( is_singular() ) :
			the_content( '<p>', '</p>' );
		else :
			the_excerpt();
		endif;
         ?>
            
        </div>
    </div><!-- .entry-header -->


	
</article>

<!-- #post-<?php the_ID(); ?> -->
