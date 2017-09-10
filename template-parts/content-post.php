<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package loca
 */

?>
<!--twitter share button script-->
<script>
        window.twttr = (function (d,s,id) {
            var t, js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
            js.src="https://platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
            return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
        }(document, "script", "twitter-wjs"));
    </script>
    
<!--google+ share button script-->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
      window.___gcfg = {
        lang: 'en-US',
        parsetags: 'onload'
      };
</script>

<!--facebook share button script-->
<script>
    function init() {
        FB.api(
          '/l214.animaux',
          {"fields":"fan_count"},
          function(response) {
            
          }
        );
    }

    window.fbAsyncInit = function() {
      FB.init({
        appId      : 'your-app-id',
        xfbml      : true,
        version    : 'v2.5'
      });

      init();
    };

    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>                          
                                
<article id="post-<?php the_ID(); ?>" class="content-post" >
	<div class="row">
     	
		<div class="col-md-12">
            <?php if ( 'post' === get_post_type() ) : ?>
            <a href="#">
               <?php the_post_thumbnail();?>
            </a>
            
        </div>
	
		<?php
     endif; ?>
     <div class="col-md-12">
        <?php
		
			the_title( '<h3>', '</h3>' );
			
        ?>
            <div class="meta-post">
                <a href="#">
                    <?php the_author();?>
                </a>
                <em></em>
                <span>
                    <?php get_the_date();?>
                </span>
                <span>
                  <?php   echo $post->ID ?>
                </span>
            </div>
            
            <!-- Social media share button -->
            <div class="social-media">
              <div class="facebook">
               <div class="fb-share-button" data-href="<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a></div>
               </div>
                
                <div class="google-plus">
                <a href="https://plus.google.com/share?url={URL}" onclick="javascript:window.open(this.href,
               '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                  <div class="g-plus" data-action="share" data-annotation="none" data-height="30"></div></a>
             </div>
             <div class="twitter">
              <a class="twitter-share-button" href="https://twitter.com/intent/tweet" target="_self">Tweet</a>

            </div>
            </div>
             <!-- end of Social media share button -->
        <?php  
			the_content( '<p>', '</p>' );
         ?>
            
        </div>
    </div><!-- .entry-header -->


	
</article>

<!-- #post-<?php the_ID(); ?> -->
