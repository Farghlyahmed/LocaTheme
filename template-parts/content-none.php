<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loca
 */

?>


<section class="no-results not-found">
	
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php
				printf(
					wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'loca' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					),
					esc_url( admin_url( 'post-new.php' ) )
				);
			?></p>

		<?php elseif ( is_search() ) : ?>

			
			
                <header class="page-header">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'loca' ), '<span class="search_words">' . get_search_query() . '</span>' );
                
				?></h1></header>
				<p > <?php esc_html_e( ucwords('sorry, but nothing matched your search Keywords try to search using different keywords'), 'loca' ); ?></p>
			
               
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'loca' ); ?></p>
			<?php
				
              get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->

