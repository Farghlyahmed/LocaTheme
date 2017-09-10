<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loca
 */

get_header(); ?>

	  <div class="row">
                <!--colleft-->
                <div class="col-md-8 col-sm-12">  
         <h1>This page called page.php</h1>

			<?php
          
            query_posts($args);
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
          </div>
          <div class="col-md-4 col-sm-12">
                 <?php get_sidebar();?>
            </div>
           
</div>
</div>
</div>
		
<?php
get_footer();