<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loca
 */

get_header(); ?>

	<div class="row">
                <!--colleft-->
                <div class="col-md-8 col-sm-12">

		<?php
		if ( have_posts() ) : ?>

		
				<?php
					the_archive_title( '<div class="page-title box-caption"><span>', '</span></div>' );
                    
				?>
			

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			//the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

	</div>
             <div class="col-md-4 col-sm-12">
                 <?php get_sidebar();?>
                </div>
            </div>
</div>
</div>


<?php
get_footer();
