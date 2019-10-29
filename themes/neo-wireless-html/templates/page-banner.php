<?php
$thisID = get_the_ID();
$pageTitle = get_the_title($thisID);
$standaardbanner = get_field('bannerafbeelding', $thisID);
if( is_shop() OR is_product() OR is_product_category() OR is_product_tag() ){
$pageTitle = __( 'Products', 'woocommerce' );
}
?>
<section class="page-banner">
  <div class="page-banner-con">
    <?php if(!empty($standaardbanner)): ?>
    <div class="page-banner-bg" style="background-image: url(<?php echo $standaardbanner; ?>);"></div>
    <?php else: ?>
    <div class="main-bnr-bg" id="particles-js"></div>
    <?php endif; ?>
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