<?php 
/**
Template Name: About
*/
get_header();
get_template_part('templates/page', 'banner');

$thisID = get_the_ID();
$intro = get_field('intro', $thisID);
$showhide_intro = get_field('showhide_intro', $thisID);
if($showhide_intro){ 
	if(!empty($intro['afbeelding'])){
		$introposter = cbv_get_image_src($intro['afbeelding'], 'intro_sec');
	}else{
		$introposter = '';
	}
?>

<section class="nw-neo-wireless-sec">
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="nw-neo-wireless-bg-wrp matchHeightCol">
          <span class="nw-neo-wireless-bg hide-xs" style="background: url(<?php echo $introposter; ?>);"></span>
          <img class="show-xs" src="<?php echo $introposter; ?>" alt="intro poster">
        </div>                
      </div>      
      <div class="col-sm-6">
        <div class="nw-neo-wireless-dsc matchHeightCol">
          <?php 
	        if( !empty( $intro['titel'] ) ) printf( '<h1>%s</h1>', $intro['titel']); 
	        if( !empty( $intro['subtitel'] ) ) printf( '<strong>%s</strong>', $intro['subtitel']); 
          ?>
          <span class="dotted-icon-spn">
            <i><img src="<?php echo THEME_URI; ?>/assets/images/dotted-icon.svg"></i>
            <i><img src="<?php echo THEME_URI; ?>/assets/images/xs-line-hdr.png"></i>
          </span>
          <div class="nw-neo-wireless-dsc-pera"> 
			<?php 
	          if( !empty( $intro['beschrijving'] ) ) echo wpautop($intro['beschrijving']);
          	?>
          </div>
          <?php 
	          $knop1 = $intro['knop'];
	          if( is_array( $knop1 ) &&  !empty( $knop1['url'] ) ){
	            printf('<a href="%s" target="%s">%s</a>', $knop1['url'], $knop1['target'], $knop1['title']); 
	          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of nw-neo-wireless-sec -->
<?php } 

$showhide_overneo = get_field('showhide_overneo', $thisID);
if($showhide_overneo){ 
	$over_afbeelding = get_field('overneo_afbeelding', $thisID);
	$overneo = get_field('overneo', $thisID);
	if(!empty($over_afbeelding)){
		$overposter = cbv_get_image_src($over_afbeelding);
	}else{
		$overposter = '';
	}
?>

<section class="nw-about-content-sec">
  <div class="nw-about-con-sec-bg-skw">
    <div class="nw-about-bg-sec-bg-skw-white"></div>
    <div class="nw-about-bg-img" style="background: url(<?php echo $overposter; ?>);"></div>
    <div class="nw-about-bg-solid">
      <div class="nw-about-bg-solid-top"></div>
      <div class="nw-about-bg-solid-btm"></div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="nw-about-content-wrp clearfix">
          <div class="nw-about-content-lft">
            <?php 
		        if( !empty( $overneo['titel'] ) ) printf( '<h2>%s</h2>', $overneo['titel']); 
		        if( !empty( $overneo['subtitel'] ) ) printf( '<strong>%s</strong>', $overneo['subtitel']); 
		        echo '<span><i><img src="'.THEME_URI.'/assets/images/dotted-icon.svg"></i></span>';
		        if( !empty( $overneo['beschrijving'] ) ) echo wpautop($overneo['beschrijving']);
	        	$knop2 = $overneo['knop'];
	          	if( is_array( $knop2 ) &&  !empty( $knop2['url'] ) ){
	          	  printf('<a href="%s" target="%s">%s</a>', $knop2['url'], $knop2['target'], $knop2['title']); 
	          	}
	          ?>
          </div>
          <?php $uspsposter = get_field('overneo_usps', $thisID); if($uspsposter): ?>
          <div class="nw-about-content-rgt">
            <ul class="ulc">
        	<?php 
            $icon_tag = '';
            foreach( $uspsposter as $hupsrepeat): 
              $icon_tag = '';
              if(!empty( $hupsrepeat['icon'] ) ){
                $iconobj = $hupsrepeat['icon'];
                $icon_tag = '<img src="'.$iconobj.'" alt="'.$hupsrepeat['titel'].'">';
              }
             ?>
              <li> 
                <div class="nw-content-features">
                  <i>
                    <?php echo $icon_tag; ?>
                  </i>
              		<?php 
				        if( !empty( $hupsrepeat['titel'] ) ) printf( '<h3>%s</h3>', $hupsrepeat['titel']); 
				        if( !empty( $hupsrepeat['beschrijving'] ) ) echo wpautop($hupsrepeat['beschrijving']);
              		?>
                </div>
              </li>
              <?php endforeach; ?>
            </ul>
            
          </div>
      		<?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section><!-- end of nw-content-sec-wrp -->
<?php } 

$showhide_team = get_field('showhide_team', $thisID);
if($showhide_team){ 
	$teamg = get_field('team', $thisID);


$teamQuery = new WP_Query(array(
	'post_type' => 'team',
	'posts_per_page'=> -1,
	'order'=> 'DESC',
));	
?>

<section class="nw-team-sec-wrp">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="nw-team-sec-head"> 
		<?php 
			if( !empty( $teamg['titel'] ) ) printf( '<h3>%s</h3>', $teamg['titel']); 
			if( !empty( $teamg['beschrijving'] ) ) echo wpautop($teamg['beschrijving']);
		?>
        </div>
        <?php if( $teamQuery->have_posts() ){ ?>
        <div class="nw-team-grd-con"> 
          <ul class="ulc clearfix">
			<?php $i = 1;
	            $spacialArry = array(".", "/", "+", " ");$replaceArray = '';           
	            while($teamQuery->have_posts()): $teamQuery->the_post(); 
	            $gridImage = get_post_thumbnail_id(get_the_ID());
	            if(!empty($gridImage)){
	              $refImgsrc = cbv_get_image_src($gridImage, 'full');
	            }else{
	              $refImgsrc = '';
	            }  

	            $funct = get_field('functie', get_the_ID());       
	            $phone_title = get_field('phone_title', get_the_ID());       
	            $org_phoneno = get_field('phone_no', get_the_ID());
	            $phoneno = trim(str_replace($spacialArry, $replaceArray, $org_phoneno));       
	        ?>
            <li>
              <div class="nw-team-grd">
                <div class="nw-team-member-wrp"> 
                  <div class="nw-team-member" style="background: url(<?php echo $refImgsrc; ?>);"></div>
                  <a href="<?php the_permalink(); ?>" class="overlay-link"></a>          
                </div>
                <div class="nw-team-member-des">
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php if( !empty( $funct ) ) printf( '<span>%s</span>', $funct); ?>
                  <div class="team-cel-no"> 
                    <i>
                      <svg class="smartphone-team" width="18" height="18" viewBox="0 0 24 24" fill="#43587B;">
                        <use xlink:href="#smartphone-team-svg"></use>
                      </svg> 
                    </i>                    
                    <?php if( !empty( $funct ) ) printf( '%s: <a href="tel:%s">%s</a>', $phone_title, $phoneno, $org_phoneno); ?> 
                  </div>
                </div>
              </div>
            </li>
            <?php endwhile; ?>
          </ul>
        </div>
    <?php } wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section><!-- end of nw-team-sec-wrp -->
<?php } 

get_template_part('templates/footer', 'top');
 
get_footer();
?>