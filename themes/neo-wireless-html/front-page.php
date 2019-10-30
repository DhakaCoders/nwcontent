<?php 
get_header(); 

$banner = get_field('bannergroup', HOMEID);
if($banner):
  $posters = $banner['poster'];
?>

<section class="main-banner">
  <div class="main-bnr-bg" id="particles-js"></div>
  
  <div class="main-bnr-des-controller">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="main-bnr-des">
           <?php 
            if( !empty( $banner['subtitle'] ) ) printf( '<span>%s</span>', $banner['subtitle']); 
            if( !empty( $banner['title'] ) ) printf( '<strong>%s</strong>', $banner['title']); 
            if( !empty( $banner['content'] ) ) echo wpautop($banner['content']);
          ?>
            <div class="main-bnr-des-btns">
              <?php 
                $link1 = $banner['link_1'];
                $link2 = $banner['link_2'];
                if( is_array( $link1 ) &&  !empty( $link1['url'] ) ){
                    printf('<a href="%s" target="%s">%s</a>', $link1['url'], $link1['target'], $link1['title']); 
                }
                if( is_array( $link2 ) &&  !empty( $link2['url'] ) ){
                    printf('<a href="%s" target="%s">%s</a>', $link2['url'], $link2['target'], $link2['title']); 
                }
              ?>
            </div>
          </div>
        </div>
        <?php if($posters): ?>
        <div class="col-sm-6 hide-xs">
          <div class="main-bnr-box-imgs">
            <?php foreach($posters as $poster): $link3 = $poster['link'];?>
            <div class="main-bnr-img-bx" style="background: url(<?php echo $poster['image']; ?>);">
              <?php 
                if( is_array( $link3 ) &&  !empty( $link3['url'] ) ){
                  printf('<a href="%s" target="%s">%s<em><img src="'.THEME_URI.'/assets/images/white-link-arrow.svg"></em></a>', $link3['url'], $link3['target'], $link3['title']); 
                }
              ?>
            </div>
            <?php endforeach; ?>
          </div>
            
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>    
</section>
<?php endif; ?>
</section><!-- end of main-slider-sec-wrp -->

<?php if($banner): if($posters){ ?>
<section class="show-xs main-bnr-box-imgs-xs">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="main-bnr-box-imgs">
          <?php foreach($posters as $poster): $link3 = $poster['link'];?>
          <div class="main-bnr-img-bx" style="background: url(<?php echo $poster['image']; ?>);">
            <?php 
              if( is_array( $link3 ) &&  !empty( $link3['url'] ) ){
                printf('<a href="%s" target="%s">%s<em><img src="'.THEME_URI.'/assets/images/white-link-arrow.svg"></em></a>', $link3['url'], $link3['target'], $link3['title']); 
              }
            ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
} endif;

$intros = get_field('introsec', HOMEID);
$show_hideintro = get_field('show_hideintro', HOMEID);
if($show_hideintro){ 
  if($intros){
?>
<section class="profile-info-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="profile-info-wrp clearfix">
          <?php 
            foreach($intros as $intro):
              if(!empty($intro['icon'])){
                $icontag = cbv_get_image_tag($intro['icon']); 
              }else{
                $icontag = '';
              }
            
          ?>
          <div class="profile-info">
            <h4><i><?php echo $icontag; ?></i><?php if( !empty( $intro['title'] ) ) printf( '%s', $intro['title']); ?></h4>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section><!--end of profile-info-sec-wrp -->
<?php } } 

$prossec = get_field('productssec', HOMEID);
$show_hideppsec = get_field('show_hideppsec', HOMEID);
if($show_hideppsec){ 
$link4 = $prossec['link'];
$proids = $prossec['products'];
if( is_array( $proids ) ){
  $proQuery = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page'=> count($proids),
    'order'=> 'ASC',
    'post__in' => $proids
  ));
}else{
  $proQuery = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page'=> 3,
    'order'=> 'DESC',
  ));
}
if( $proQuery->have_posts() ){
?>
<section class="nw-product-slider-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="nw-product-title">
        <?php if( !empty( $prossec['titel'] ) ) printf( '<h1>%s</h1>', $prossec['titel']); ?>
        </div>
        <div class="nw-product-slider-wrp">
          <div class="nwsliderarrows">
           <span class="leftArrow slick-arrow" aria-disabled="false" style="">
          </span>
          <span class="rightArrow slick-arrow slick-disabled" style="" aria-disabled="true">
          </span>
          </div>
          <div class="nw-product-slider">
          <?php $i = 1;
                          
            while($proQuery->have_posts()): $proQuery->the_post(); 
            $gridImage = get_post_thumbnail_id(get_the_ID());
            if(!empty($gridImage)){
              $refImgsrc = cbv_get_image_src($gridImage, 'full');
            }else{
              $refImgsrc = '';
            }  
            $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );       
          ?>
            <div class="nw-product-slide-item">
              <div class="nw-product-slide-item-inr clearfix">
                <div class="nw-product-slide-item-img" style="background: url(<?php echo $refImgsrc; ?>);">
                </div>
                <div class="nw-product-slide-item-dsc">
                  <span><?php 
                  $term_obj_list = get_the_terms( get_the_ID(), 'product_cat' );
                  if ( $term_obj_list && ! is_wp_error( $term_obj_list ) ) : 
                    printf('%s', join(', ', wp_list_pluck($term_obj_list, 'name')));
                  endif;
                  ?></span>
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                  <?php echo $short_description; ?>
                  <a href="<?php the_permalink(); ?>">More Info</a>
                </div>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
        <div class="nw-post-btn hide-xs">
          <?php 
            if( is_array( $link4 ) &&  !empty( $link4['url'] ) ){
              printf('<a href="%s" target="%s">%s</a>', $link4['url'], $link4['target'], $link4['title']); 
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of nw-product-slider-sec-wrp -->
<?php } wp_reset_postdata(); } 

$whowe = get_field('who_we', HOMEID);
$whatwe = get_field('what_we', HOMEID);
$show_hide_howwhat = get_field('show_hide_howwhat', HOMEID);
if($show_hide_howwhat){ 
?>

<section class="nw-content-sec-wrp">
  <div class="top-skip-home" style="border-left: 1920px;"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="nw-content-wrp clearfix">
          <div class="nw-content-lft">
          <?php 
            if( !empty( $whowe['title'] ) ) printf( '<h2>%s</h2>', $whowe['title']); 
            if( !empty( $whowe['subtitle'] ) ) printf( '<strong>%s</strong>', $whowe['subtitle']); 
            echo '<span><i><img src="'.THEME_URI.'/assets/images/dotted-icon.svg"></i></span>';
            if( !empty( $whowe['content'] ) ) echo wpautop($whowe['content']);

            $link5 = $whowe['link'];
            if( is_array( $link5 ) &&  !empty( $link5['url'] ) ){
              printf('<a href="%s" target="%s">%s</a>', $link5['url'], $link5['target'], $link5['title']); 
            }
          ?> 
          </div>
          <div class="nw-content-rgt">
          <?php 
            if( !empty( $whatwe['title'] ) ) printf( '<h2>%s</h2>', $whatwe['title']); 
            if( !empty( $whatwe['subtitle'] ) ) printf( '<strong>%s</strong>', $whatwe['subtitle']); 
            echo '<span><i><img src="'.THEME_URI.'/assets/images/dotted-icon.svg"></i></span>';
            if( !empty( $whatwe['content'] ) ) echo wpautop($whatwe['content']);

            $link6 = $whatwe['link'];
            if( is_array( $link6 ) &&  !empty( $link6['url'] ) ){
              printf('<a href="%s" target="%s">%s</a>', $link6['url'], $link6['target'], $link6['title']); 
            }
          ?> 
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of nw-content-sec-wrp -->
<?php } 
get_template_part('templates/footer', 'top');
get_footer(); ?>