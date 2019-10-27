<?php 
get_header();
$thisID = get_option('page_for_posts');
$pageTitle = get_the_title($thisID);
$bannerafbeelding = wp_get_attachment_image_src( get_post_thumbnail_id( $thisID ), 'full' );
$standaardbanner = get_field('standaardbanner', 'options');
if( !empty( $bannerafbeelding[0] ) )
  $pageBanner = $bannerafbeelding[0];
else
  $pageBanner = $standaardbanner;

?>
<section class="page-banner">
  <div class="page-banner-con">
    <div class="page-banner-bg" style="background-image: url(<?php echo $pageBanner; ?>);"></div>
    <div class="page-banner-des">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="page-banner-des-innr">
              <strong class="banner-page-title"><?php echo $pageTitle; ?></strong>
              <div class="breadcrumbs">
                <ul>           
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Binnenpagina</a></li>
                  <li><a href="#">Binnenpagina</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="blog-page-con-wrap">
  <div class="container-md">
      <div class="row">
        <div class="col-sm-12">
          <div class="blog-page-con-grd-controller">
          	<?php if( have_posts() ): ?>
            <ul class="clearfix ulc">
				<?php 
	            while( have_posts() ): the_post();
	            $postID = get_the_ID(); 
	            $postImg = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'full' );
	            if( is_array($postImg) && !empty( $postImg[0] ) ) $useIMG = $postImg[0]; else $useIMG = THEME_URI.'/assets/images/sb-blogdef2.jpg';
	            ?>
              <li>
                <div class="blog-post-con-grd-row clearfix">
                  <div class="blog-post-grd-img">
                    <div class="blog-post-grd-img-iner" style="background: url(<?php echo $useIMG; ?>);">
                      <a class="overlay-link" href="<?php the_permalink(); ?>"></a>
                      <div class="blog-post-date">
                        <div class="blog-post-date-bdr">
                          <strong><?php echo get_the_date('d'); ?></strong>
                          <span><?php echo get_the_date('M'); ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="blog-post-grd-des">
                    <strong>
                    	<?php 
                    		the_category(', ');
                    	?>
                    </strong>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php echo wpautop( get_custom_excerpt(33), true );; ?>
                    <a href="<?php the_permalink(); ?>">Read More <em><img src="<?php echo THEME_URI; ?>/assets/images/blog-more-link-arrow.svg"></em></a>
                  </div>
                </div>
              </li>
 				<?php endwhile; ?>
            </ul>

          <?php else: ?>
            <div class="dfnotfound">
              <p>Geen resultaten!</p>
            </div>
          <?php endif; ?>

          </div>
          <div class="page-pagination">
            <?php
            if( $wp_query->max_num_pages > 1 ):
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links( array(
              'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
              'format' => '?paged=%#%',
              'current' => max( 1, get_query_var('paged') ),
              'total' => $wp_query->max_num_pages,
              'type'  => 'list',
              'show_all' => true,
              'prev_next' => false
            ) );
            else:
              echo '<div class="hasgap"></div>';
            endif; 
            ?>
          </div>
        </div>
      </div>
  </div>    
</section>



<?php get_template_part('templates/footer', 'top');  ?>

<?php 
get_footer();
?>