<?php 
  $logoObj = get_field('logo_footer', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }

  $spacialArry = array(".", "/", "+", " ");$replaceArray = '';
  $adres = get_field('address', 'options');
  $gmapsurl = get_field('google_maps', 'options');
  $e_mailadres = get_field('emailaddress', 'options');
  $show_telefoon = get_field('telephone', 'options');
  $telefoon = trim(str_replace($spacialArry, $replaceArray, $show_telefoon));
  $copyright_text = get_field('copyright_text', 'options');
  $gmaplink = !empty($gmapsurl)?$gmapsurl: 'javascript:void()';
  $bwt = get_field('bwt', 'options');

  $fburl = get_field('facebook_url', 'options');
  $twturl = get_field('twitter_url', 'options');
  $insturl = get_field('instagram_url', 'options');
?>

<footer class="footer-wrap">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
          <div class="ftr-top-innr clearfix">
            <div class="ftr-lft-logo clearfix">
              <div class="ftr-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
              </div>
              <div class="ftr-mid-socail show-xs">
                <?php if(!empty($fburl)): ?>
                 <a href="<?php echo esc_url($fburl); ?>">
                    <i>
                      <svg class="ftr-fb-icon" width="14" height="24" viewBox="0 0 14 24" fill="#43587B;">
                        <use xlink:href="#ftr-fb-icon-svg"></use>
                      </svg> 
                    </i>
                  </a>
                  <?php endif; if(!empty($twturl)): ?>
                  <a href="<?php echo esc_url($twturl); ?>">
                    <i>
                      <svg class="ftr-twi-icon" width="24" height="22" viewBox="0 0 24 22" fill="#43587B;">
                        <use xlink:href="#ftr-twi-icon-svg"></use>
                      </svg> 
                    </i>
                  </a>
                  <?php endif; if(!empty($insturl)): ?>
                  <a href="<?php echo esc_url($insturl); ?>">
                    <i>
                      <svg class="ftr-ins-icon" width="24" height="24" viewBox="0 0 24 24" fill="#43587B;">
                        <use xlink:href="#ftr-ins-icon-svg"></use>
                      </svg> 
                    </i>
                  </a>
                <?php endif; ?>
              </div>
              <div class="ftr-tp-info">
                <?php 
                  if( !empty( $adres ) ) printf('<a href="%s">%s</a>', $gmaplink, $adres); 
                  if( !empty( $e_mailadres ) ) printf('<a href="mailto:%s">%s</a>', $e_mailadres, $e_mailadres); 
                  if( !empty( $bwt ) ) printf('<span>%s</span>', $bwt); 
                ?>
              </div>
              <div class="ftr-mid-innr show-xs clearfix">
                <div class="ftr-mid-contact">
                  <?php if( !empty( $show_telefoon ) ): ?>
                  <a href="tel:<?php echo $telefoon; ?>">
                    <i>
                      <svg class="ftr-phone-icon" width="38" height="38" viewBox="0 0 38 38" fill="#43587B;">
                        <use xlink:href="#ftr-phone-icon-svg"></use>
                      </svg> 
                    </i>
                   <?php printf( 'Call us: %s', $show_telefoon ); ?>
                  </a>
                  <?php endif; ?>
                </div>
                <div class="ftr-mid-socail hide-xs">
                <?php if(!empty($fburl)): ?>
                 <a href="<?php echo esc_url($fburl); ?>">
                    <i>
                      <svg class="ftr-fb-icon" width="14" height="24" viewBox="0 0 14 24" fill="#43587B;">
                        <use xlink:href="#ftr-fb-icon-svg"></use>
                      </svg> 
                    </i>
                  </a>
                  <?php endif; if(!empty($twturl)): ?>
                  <a href="<?php echo esc_url($twturl); ?>">
                    <i>
                      <svg class="ftr-twi-icon" width="24" height="22" viewBox="0 0 24 22" fill="#43587B;">
                        <use xlink:href="#ftr-twi-icon-svg"></use>
                      </svg> 
                    </i>
                  </a>
                  <?php endif; if(!empty($insturl)): ?>
                  <a href="<?php echo esc_url($insturl); ?>">
                    <i>
                      <svg class="ftr-ins-icon" width="24" height="24" viewBox="0 0 24 24" fill="#43587B;">
                        <use xlink:href="#ftr-ins-icon-svg"></use>
                      </svg> 
                    </i>
                  </a>
                <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="ftr-tp-menus">
              <div class="footer-menu-itm">
              <?php 
                _e( '<h5>Navigation</h5>', 'sportsbuild' );

                $fmenuOptions = array( 
                    'theme_location' => 'cbv_ftr_menu', 
                    'menu_class' => 'ulc clearfix',
                    'container' => 'fnav',
                    'container_class' => 'fnav'
                  );
                wp_nav_menu( $fmenuOptions ); 
              ?>
              </div>
              <div class="footer-menu-itm">
              <?php 
                _e( '<h5>Services & Products</h5>', 'sportsbuild' );

                $fpmenuOptions = array( 
                    'theme_location' => 'cbv_sp_menu', 
                    'menu_class' => 'ulc clearfix',
                    'container' => 'spnav',
                    'container_class' => 'spnav'
                  );
                wp_nav_menu( $fpmenuOptions ); 
              ?>    
              </div>
              <div class="footer-menu-itm">
              <?php 
                _e( '<h5>Product Categories</h5>', 'sportsbuild' );

                $ftmenuOptions = array( 
                    'theme_location' => 'cbv_pc_menu', 
                    'menu_class' => 'ulc clearfix',
                    'container' => 'pcnav',
                    'container_class' => 'pcnav'
                  );
                wp_nav_menu( $ftmenuOptions ); 
              ?>   
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="ftr-mid-innr hide-xs clearfix">
          <div class="ftr-mid-contact">
            <?php if( !empty( $show_telefoon ) ): ?>
            <a href="tel:<?php echo $telefoon; ?>">
              <i>
                <svg class="ftr-phone-icon" width="38" height="38" viewBox="0 0 38 38" fill="#43587B;">
                  <use xlink:href="#ftr-phone-icon-svg"></use>
                </svg> 
              </i>
            <?php printf( 'Call us: %s', $show_telefoon ); ?>
            </a>
            <?php endif; ?>
          </div>
          <div class="ftr-mid-socail hide-xs">
           <?php if(!empty($fburl)): ?>
             <a href="<?php echo esc_url($fburl); ?>">
                <i>
                  <svg class="ftr-fb-icon" width="14" height="24" viewBox="0 0 14 24" fill="#43587B;">
                    <use xlink:href="#ftr-fb-icon-svg"></use>
                  </svg> 
                </i>
              </a>
              <?php endif; if(!empty($twturl)): ?>
              <a href="<?php echo esc_url($twturl); ?>">
                <i>
                  <svg class="ftr-twi-icon" width="24" height="22" viewBox="0 0 24 22" fill="#43587B;">
                    <use xlink:href="#ftr-twi-icon-svg"></use>
                  </svg> 
                </i>
              </a>
              <?php endif; if(!empty($insturl)): ?>
              <a href="<?php echo esc_url($insturl); ?>">
                <i>
                  <svg class="ftr-ins-icon" width="24" height="24" viewBox="0 0 24 24" fill="#43587B;">
                    <use xlink:href="#ftr-ins-icon-svg"></use>
                  </svg> 
                </i>
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="ftr-btm-innr clearfix">
          <div class="ftr-btm-menu">
            <?php if( !empty( $copyright_text ) ) printf( '<span>%s</span>', $copyright_text); ?>
            <?php 
              $ftmenuOptions = array( 
                  'theme_location' => 'cbv_ftb_menu', 
                  'menu_class' => 'clearfix',
                  'container' => 'ftbnav',
                  'container_class' => 'ftbnav'
                );
              wp_nav_menu( $ftmenuOptions ); 
            ?>   
          </div>
          <div class="ftr-btm-rgt-con">
            <a href="#">webdesign by conversal</a>
          </div>
        </div>
      </div>
    </div>
  </div> 
</footer><!--end of footer-wrap -->

<div class="home-bnr-xs-nav-bar-controller show-xs">
  <div class="xs-menu-btn-bar clearfix">
      <div class="xs-menu-btn-contact">
        <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'cart' ); ?>">
          <i><img src="<?php echo THEME_URI; ?>/assets/images/cart-xs-icon.svg"></i>
        </a>
      </div>
      <div class="nav-opener">
       <div class="nav-opener-btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <strong>MENU</strong>
     </div>
  </div>
</div>
<?php 
  $hlogoObj = get_field('logo_header', 'options');
  if( is_array($hlogoObj) ){
    $hlogo_tag = '<img src="'.$hlogoObj['url'].'" alt="'.$hlogoObj['alt'].'" title="'.$hlogoObj['title'].'">';
  }else{
    $hlogo_tag = '';
  }
?>
<div class="xs-popup-main-menu-controller">
    <div class="xs-popup-logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php echo $hlogo_tag; ?>
      </a>
    </div>
    <div class="hdr-btm-nav">
      <?php 
        $cmenuOptions = array( 
            'theme_location' => 'cbv_main_menu', 
            'menu_class' => 'clearfix ulc',
            'container' => 'cmnav',
            'container_class' => 'cmainnav'
          );
        wp_nav_menu( $cmenuOptions ); 
      ?>
    </div>
    <nav class="xs-popup-main-nav clearfix">
    <?php 
      $tcmenuOptions = array( 
          'theme_location' => 'cbv_top_menu', 
          'menu_class' => 'clearfix ulc',
          'container' => 'topnav',
          'container_class' => 'topnav'
        );
      wp_nav_menu( $tcmenuOptions ); 
    ?>
    </nav>
    <div class="hdr-search">
      <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" placeholder="<?php echo esc_attr__( 'Search', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button>
          <em><img src="<?php echo THEME_URI; ?>/assets/images/search-icon.svg"></em>
        </button>
      </form>
    </div>
    <div class="hdr-cart-btn">
      <a href="<?php echo wc_get_cart_url(); ?>"title="<?php _e( 'cart' ); ?>">
      <em><img src="<?php echo THEME_URI; ?>/assets/images/cart-icon-white.svg">Shopping Cart</em>
    </a>
    </div>
    <div class="nw-lang">
      <ul class="ulc">
        <li class="lag-active"><a href="#">EN </a></li>
        <li><a href="#">ES</a></li>
      </ul>
    </div>
    <div class="xs-menu-btn-bar-popup">
      <div class="xs-menu-btn-bar clearfix">
        <div class="xs-menu-btn-contact">
          <a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'cart' ); ?>">
            <i><img src="<?php echo THEME_URI; ?>/assets/images/cart-xs-icon.svg"></i>
          </a>
        </div>
        <div class="nav-opener">
         <div class="nav-opener-btn closeBtn">
            <img src="<?php echo THEME_URI; ?>/assets/images/close-icon.svg">
          </div>
          <strong>CLOSE</strong>
       </div>
      </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>