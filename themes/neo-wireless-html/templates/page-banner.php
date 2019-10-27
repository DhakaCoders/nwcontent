<?php
$thisID = get_the_ID();
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
               <?php cbv_breadcrumbs(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>