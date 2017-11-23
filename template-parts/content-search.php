<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loca
 */

?>
                       
<article id="post-<?php the_ID(); ?>" <?php post_class('news-cate-item');?>>
	<div class="row">
	    <div class="col-md-5 col-sm-5 col-xs-12">
            <a href="#">
                <?php echo get_the_post_thumbnail($post->ID,'full');?>
            </a>
        </div>
	
	<div class="col-md-7 col-sm-7 col-xs-12">
		<?php the_title( sprintf( '<h3 ><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		 <div class="meta-post">
                <a href="#">
                    <?php the_author();?>
                </a>
                <em></em>
                <span>
                    <?php the_date();?>
                </span>

            </div>
             <p><?php 
                                         
                                          //  the_excerpt(); display post excerpt here
            ?>
            <?php the_excerpt();?>
            </p>
    </div>
		<?php endif; ?>
	

    </div>
</article>

<!-- #post-<?php the_ID(); ?> -->
