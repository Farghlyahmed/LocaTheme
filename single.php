<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package loca
 */

get_header(); ?>

	<!--<div id="primary" class="content-area">
		<main id="main" class="site-main">
-->
<div class="row">
                <!--colleft-->
        <div class="col-md-8 col-sm-12">
            <div class="box-caption">
              <!--  <span>category news</span>-->
            </div>
            <!--list-news-cate-->
      <div class="list-news-cate">
		<?php
		while ( have_posts() ) : the_post();
            
			get_template_part( 'template-parts/content-post', get_post_type() );

			/*
            
             * the_post_navigation(); --> to display the post navigation next and previous 
             * next_post_link( '<strong>%link</strong>' ); --> to get next post
             * previous_post_link( '%link', '%title', TRUE, ' ', 'neighborhood' );
             * 
             * 
             * /
*/
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	   <!-- #primary -->
</div>
</div>
            <div class="col-md-4 col-sm-12">
                 <?php get_sidebar();?>
                </div>
            
</div>
</div>
<?php
get_footer();
