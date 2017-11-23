<?php 
/*
    Template Name:category
*/
get_header();
?>
<div class="row">
                <!--colleft-->
        <div class="col-md-8 col-sm-12">
     
      
<?php
if(have_posts()):
while ( have_posts() ) : the_post();

    get_template_part('template-parts/content','content');
 
endwhile;
numeric_posts_nav();
else :
    echo '<h1>'.ucwords("NO posts yet for this category").'</h1>';
    if( current_user_can( 'manage_options' )){
        echo '<a class="insert_post" href='.esc_url( admin_url( 'post-new.php' )).'>Add post for this category</a>';
       
    }else{
         get_search_form();     
    }
   
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
?>