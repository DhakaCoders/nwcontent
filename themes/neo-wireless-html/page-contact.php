<?php 
/**
Template Name: Contact
*/

get_header();
get_template_part('templates/page', 'banner');
?>
<section class="contact-form-sec-wrp">
  <!-- <div class="contact-form-bg"></div>
  <div class="contact-form-bg-skw"></div> -->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="contact-form-wrp clearfix">
          <div class="contac-form-lft">
            <div class="contac-form-dsc">
              <h1>Send us an e-mail</h1>
              <p>Cras egestas tortor non accumsan placerat. Proin est risus, convallis nec magna sed, semper consequat est.</p>
              <span><i><img src="<?php echo THEME_URI; ?>/assets/images/dotted-icon.svg"></i></span>
            </div>
            <div class="contact-form">
              <form class="wpforms-form">
                <div class="wpforms-field-container">
                  <div class="wpforms-field">
                    <div class="wpforms-field-row">
                      <div class="wpforms-one-half">
                        <label class="wpforms-field-label">Name</label>
                        <input type="text" name="" class="wpforms-field-required">
                      </div>
                      <div class="wpforms-one-half">
                        <label class="wpforms-field-label">Phone</label>
                        <input type="text" name="" class="wpforms-field-required">
                      </div>
                    </div>
                  </div>
                  <div class="wpforms-field">
                    <div class="wpforms-field-row">
                      <div class="fullwidth">
                        <label class="wpforms-field-label">E-mail</label>
                        <input type="email" name="" class="wpforms-field-required">
                      </div>
                    </div>
                  </div>
                  <div class="wpforms-field">
                    <div class="wpforms-field-row">
                      <div class="fullwidth">
                        <label class="wpforms-field-label">Subject</label>
                        <input type="email" name="" class="wpforms-field-required">
                      </div>
                    </div>
                  </div>
                  <div class="wpforms-field">
                    <div class="wpforms-one-half">
                      <label class="wpforms-field-label">Message</label>
                      <textarea></textarea>
                    </div>
                  </div>
                </div>
                <div class="wpforms-submit-container">
                  <input type="submit" name="" class="wpforms-submit" value="SEND">
                </div>
              </form>
            </div>
          </div>
          <div class="contac-info-rgt">
            <div class="contact-info">
              <h2>Contact Info</h2>
              <a href="#">
                <i>
                  <svg class="contact-map-icon" width="40" height="40" viewBox="0 0 40 40" fill="#43587B;">
                    <use xlink:href="#contact-map-icon-svg"></use>
                  </svg> 
                </i>
                Burgemeester De Cocklaan 10 <br> bus 11 9320 <br> Erembodegem
               </a>
                <a class="phone" href="#"><i>
                    <svg class="contact-smartphone-icon" width="38" height="38" viewBox="0 0 38 38" fill="#43587B;">
                      <use xlink:href="#contact-smartphone-icon-svg"></use>
                    </svg> 
                  </i>
                Call us: +32 53 86 00 88
               </a>
              <a href="#">
                <i>
                  <svg class="contact-mail-icon" width="34" height="34" viewBox="0 0 34 34" fill="#43587B;">
                    <use xlink:href="#contact-mail-icon-svg"></use>
                  </svg> 
                </i>
                E-mail Us: info@neowireless.be
              </a>
            </div>
             <div class="ftr-mid-socail">
               <a href="#">
                <i>
                  <svg class="ftr-fb-icon" width="14" height="24" viewBox="0 0 14 24" fill="#43587B;">
                    <use xlink:href="#ftr-fb-icon-svg"></use>
                  </svg> 
                </i>
              </a>
              <a href="#">
                <i>
                  <svg class="ftr-twi-icon" width="24" height="22" viewBox="0 0 24 22" fill="#43587B;">
                    <use xlink:href="#ftr-twi-icon-svg"></use>
                  </svg> 
                </i>
              </a>
              <a href="#">
                <i>
                  <svg class="ftr-ins-icon" width="24" height="24" viewBox="0 0 24 24" fill="#43587B;">
                    <use xlink:href="#ftr-ins-icon-svg"></use>
                  </svg> 
                </i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of contact-form-sec-wrp -->

<section class="google-map-sec-wrp">
  <div class="googleMapTringle"></div>
  <div id="googlemap" data-latitude="50.937809" data-longitude="4.040952"></div>
</section>

<section class="poligon"></section>
<section class="poligon2">
  <div class="top-skip"></div>
  <div class="bottom-skip"></div>
</section>
<?php get_footer(); ?>

