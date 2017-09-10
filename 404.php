<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package loca
 */

get_header(); ?>

	<div class="row">
                <!--colleft-->
                <div class="col-md-8 col-sm-12">

		<div class="page-404">

                <h1>404</h1>
                <p>Oops! That page can’t be found</p>

                <a href="<?php echo get_home_url();?>" class="my-btn btn-go-home">GO HOME</a>

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
