<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package loca
 */

get_header(); ?>

 <div class="row">
                <!--colleft-->
                <div class="col-md-8 col-sm-12">
                    <div class="box-caption">
                        <span>Last news</span>
                    </div>
                    <!--list-news-cate-->
                    <div class="list-news-cate">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'loca' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
                    </div>
     </div>
               <div class="col-md-4 col-sm-12">
                 <?php get_sidebar();?>
                </div>
            </div>
</div>
</div>

<?php
get_footer();
