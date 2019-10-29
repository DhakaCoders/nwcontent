<?php 
/**
Template Name: Contact
*/

get_header();
get_template_part('templates/page', 'banner2');

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

  $titel = get_field('titel');
  $beschrijving = get_field('beschrijving');
  $google_map = get_field('google_maps');

?>
<section class="contact-form-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="contact-form-wrp clearfix">
          <div class="contac-form-lft">
            <div class="contac-form-dsc">
              <?php 
              if( !empty( $titel ) ) printf( '<h1>%s</h1>', $titel); 
              if( !empty( $beschrijving ) ) echo wpautop($beschrijving); 
              ?>
              <span><i><img src="<?php echo THEME_URI; ?>/assets/images/dotted-icon.svg"></i></span>
            </div>
            <div class="contact-form">
              <?php echo do_shortcode('[wpforms id="193"]'); ?>
            </div>
          </div>
          <div class="contac-info-rgt">
            <div class="contact-info">
              <?php  _e( '<h2>Contact Info</h2>', 'neowireless' ); ?>
              <a href="<?php echo $gmaplink; ?>">
                <i>
                  <svg class="contact-map-icon" width="40" height="40" viewBox="0 0 40 40" fill="#43587B;">
                    <use xlink:href="#contact-map-icon-svg"></use>
                  </svg> 
                </i>
                <?php if( !empty( $adres ) ) echo $adres;  ?>
               </a>
               <?php if( !empty( $show_telefoon ) ): ?>
                <a class="phone" href="tel:<?php echo $telefoon; ?>"><i>
                    <svg class="contact-smartphone-icon" width="38" height="38" viewBox="0 0 38 38" fill="#43587B;">
                      <use xlink:href="#contact-smartphone-icon-svg"></use>
                    </svg> 
                  </i>
                <?php printf( __('Call us: ', 'neowireless').'%s', $show_telefoon ); ?>
               </a>
               <?php endif; if( !empty( $e_mailadres ) ): ?>
              <a href="mailto:<?php echo $e_mailadres; ?>">
                <i>
                  <svg class="contact-mail-icon" width="34" height="34" viewBox="0 0 34 34" fill="#43587B;">
                    <use xlink:href="#contact-mail-icon-svg"></use>
                  </svg> 
                </i>
                <?php printf( __('E-mail Us: ', 'neowireless').'%s', $e_mailadres );  ?>
              </a>
              <?php endif; ?>
            </div>
             <div class="ftr-mid-socail">
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
    </div>
  </div>
</section><!-- end of contact-form-sec-wrp -->

<section class="google-map-sec-wrp">
  <div class="googleMapTringle"></div>
  <div data-homeurl="<?php echo THEME_URI; ?>" id="googlemap" data-latitude="<?php echo $google_map['lat']; ?>" data-longitude="<?php echo $google_map['lng']; ?>"></div>
</section>

<section class="poligon"></section>


<?php get_footer(); ?>

