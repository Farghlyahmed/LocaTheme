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
           
            <a href="<?php echo esc_url( get_permalink() );?>">
               <?php the_post_thumbnail();?>
            </a>
        </div>
	
		<?php
     endif; ?>
     <div class="col-md-7 col-sm-7 col-xs-12">
        <?php
		
			the_title( '<h3 ><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
        ?>
            <div class="meta-post">
                <?php if(isset($_SESSION['user_name'])):
                    the_author();
                else:
                    the_author_posts_link();
                 endif; ?>
                <em></em>
                <span>
                    <?php echo get_the_date('d-M-Y');?>
                </span>
            </div>
        <?php  
			the_excerpt();
         ?>
    
            
        </div>
    </div>


	
</article>

    

 