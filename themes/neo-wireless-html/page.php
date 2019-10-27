<?php 
get_header(); 
get_template_part( 'templates/page', 'banner' );

while ( have_posts() ) :
	the_post();
?>
<section class="innerpage-con-wrap">

        <?php
        if(have_rows('inhoud')){ 
        echo '<div class="container-sm"><div class="row"><div class="col-sm-12"><article class="default-page-con">';
        while ( have_rows('inhoud') ) : the_row(); 
          if( get_row_layout() == 'introductietekst' ){
              $title = get_sub_field('titel');
              $subtitel = get_sub_field('subtitel');
              $afbeelding = get_sub_field('afbeelding');
              echo '<div class="dfp-promo-module clearfix">';
                if( !empty($title) ) printf('<h1>%s</h1>', $title);
                if( !empty($afbeelding) ){
                  echo '<div class="dfp-plate-one-img-bx">', cbv_get_image_tag($afbeelding), '</div>';
                }
                if( !empty($subtitel) ) printf('<strong>%s</strong>', $subtitel);
            echo '<div class="hide-xs"><img src="'.THEME_URI.'/assets/images/title-separetor.svg"></div>';
            echo '<div class="show-xs"><img src="'.THEME_URI.'/assets/images/xs-line-hdr.png"></div>';
              echo '</div>';    
          }elseif( get_row_layout() == 'teksteditor' ){
              $beschrijving = get_sub_field('fc_teksteditor');
              echo '<div class="dfp-text-module clearfix">';
                if( !empty( $beschrijving ) ) echo wpautop($beschrijving);
              echo '</div>';    
            }elseif( get_row_layout() == 'afbeelding_tekst' ){
              $fc_afbeelding = get_sub_field('fc_afbeelding');
              $imgsrc = cbv_get_image_src($fc_afbeelding, 'full');
              $fc_tekst = get_sub_field('fc_tekst');
              $positie_afbeelding = get_sub_field('positie_afbeelding');
              $imgposcls = ( $positie_afbeelding == 'right' ) ? 'fl-dft-rgtimg-lftdes' : '';
              echo '<div class="fl-dft-overflow-controller">
                <div class="fl-dft-lftimg-rgtdes clearfix equalHeight '.$imgposcls.'">';
                      echo '<div class="fl-dft-lftimg-rgtdes-lft matchHeightCol" style="background: url('.$imgsrc.');"></div>';
                      echo '<div class="fl-dft-lftimg-rgtdes-rgt matchHeightCol">';
                        echo wpautop($fc_tekst);
                      echo '</div>';
              echo '</div></div>';      
            }elseif( get_row_layout() == 'galerij' ){
              $gallery_cn = get_sub_field('afbeeldingen');
              $lightbox = get_sub_field('lightbox');
              $kolom = get_sub_field('kolom');
              if( $gallery_cn ):
              echo "<div class='gallery-wrap clearfix'><div class='gallery gallery-columns-{$kolom}'>";
                foreach( $gallery_cn as $image ):
                echo "<figure class='gallery-item'><div class='gallery-icon portrait'>";
                if( $lightbox ) echo "<a href='{$image['url']}'>";
                    echo wp_get_attachment_image( $image['ID'], 'vgrid2' );
                if( $lightbox ) echo "</a>";
                echo "</div></figure>";
                endforeach;
              echo "</div></div>";
              endif;      
            }elseif( get_row_layout() == 'usps' ){
              $fc_usps = get_sub_field('fc_usps');
              echo "<div class='dft-services-controller'><div class='dft-services-cols clearfix dftServicesColsSlider bullet-xspagi'>";
                foreach( $fc_usps as $usp ):
                  echo "<div class='dft-services-col'><div class='dft-services-col-item'>";
                    echo "<span>";
                    echo wp_get_attachment_image( $usp['icon'] );
                    echo "</span>";
                    printf('<strong>%s</strong>', $usp['titel']);
                  echo "</div></div>";
                endforeach;
              echo "</div></div>";
            }elseif( get_row_layout() == 'diensten' ){
              $fc_diensten = get_sub_field('fc_diensten');
              echo "<div class='dft-2grd-img-content clearfix'>";
                foreach( $fc_diensten as $service ):
                  $titel = $service['titel'];
                  $beschrijving = $service['beschrijving'];
                  $afbeelding = $service['afbeelding'];
                  $imgSrc = cbv_get_image_src($afbeelding, 'member2');
                  $kleur = $service['kleur'];
                  $knop = $service['knop'];
                  $isknop = !empty( $knop ) ? "href='{$knop['url']}'" : '';
                  $rgba = hex2RGB($kleur, 0.8);
                  echo "<div class='dft-2grd-img-con-item-col dft-2grd-img-con-item-col-active'>";
                    echo "<div class='dft-2grd-img-con-item' style='background-image: url({$imgSrc});'>";
                    echo '<a style="background-color: rgba('.$rgba.')" class="overlay-link" '.$isknop.'></a>';
                      echo "<div>";
                      printf('<h3><a %s>%s</a></h3>', $isknop, $titel);
                      echo wpautop( $beschrijving );
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                endforeach;
              echo "</div>";
            }elseif( get_row_layout() == 'promo' ){
              $fc_title = get_sub_field('fc_title');
              $fc_beschrijving = get_sub_field('fc_beschrijving');
              $fc_knop = get_sub_field('fc_knop');
              $achtergrond = get_sub_field('achtergrond');
              echo "<div class='dft-bnr-con' style='background-image: url({$achtergrond});'>";
              printf('<h3>%s</h3>', $fc_title);
              echo wpautop( $beschrijving );
              printf('<a target="%s" href="%s">%s</a>', $fc_knop['target'], $fc_knop['url'], $fc_knop['title']);
              echo "</div>";
            }elseif( get_row_layout() == 'tabel' ){
              $fc_table = get_sub_field('fc_table');
              cbv_table($fc_table);
            }elseif( get_row_layout() == 'team' ){
              $fc_team = get_sub_field('fc_team');
              $memQuery = new WP_Query(array(
                'post_type' => 'team',
                'posts_per_page'=> -1,
                'post__in' => $fc_team
              ));
              if( $memQuery->have_posts() ):
                echo '<div class="dft-teamleider-con"><div class="teamleider-sec-innr"><ul class="ulc clearfix dftTeamleiderGridSlider bullet-xspagi">';
                        while($memQuery->have_posts()): $memQuery->the_post();
                        $gridImage = get_post_thumbnail_id(get_the_ID());
                        if(!empty($gridImage)){
                          $pimgScr = cbv_get_image_src($gridImage, 'vgrid3');
                        }else{
                          $pimgScr = '';
                        }  
                        $positie = get_field('positie', get_the_ID());
                        $emailadres = get_field('e-mailadres', get_the_ID());
                        $telefoon = get_field('telefoon', get_the_ID());
                        echo '<li class="teamleideSlider-item"><div class="teamleider-grid">';
                        echo '<div class="teamleider-bg-wrp">';
                        echo '<div class="teamleider-bg" style="background: url('.$pimgScr.');"></div>
                        <a href="'.get_the_permalink().'" class="overlay-link"></a>';
                        echo '</div>';
                        echo '<div class="teamleider-des"><div class="teamleider-des-innr"> ';
                          printf('<h6><a href="%s">%s</a></h6>', get_the_permalink(), get_the_title());
                          printf('<span>%s</span>', $positie);
                          echo '<ul class="ulc">';
                            echo '<li>';
                            printf('<a href="mailto:%s"><i><svg class="envelope-inc-svg" width="16" height="16" viewBox="0 0 16 16" fill="#FFA200"><use xlink:href="#envelope-inc-svg"></use></svg></i><span>%s</span></a>', 
                              $emailadres, $emailadres);
                            echo '</li>';
                            echo '<li>';
                            printf('<a href="tel:+32478767600"><i><svg class="phone-call-inc-svg" width="18" height="18" viewBox="0 0 18 18" fill="#FFA200"><use xlink:href="#phone-call-inc-svg"></use></svg></i><span>%s</span></a>', 
                              trim(str_replace(' ', '', $telefoon)), $telefoon);
                            echo '</li>';
                          echo '</ul>';
                          printf('<a class="teamleider-lnc" href="%s"><i><svg class="black-left-angle-svg" width="16" height="12" viewBox="0 0 16 12" fill="#000"><use xlink:href="#black-left-angle-svg"></use></svg></i><span>Lees meer</span></a>', get_the_permalink());
                        echo '</div></div>';
                        echo '</div></li>';
                    endwhile;

                echo '</ul></div></div>';
              endif;
            }elseif( get_row_layout() == 'afbeelding' ){
              $fc_afbeelding = get_sub_field('fc_afbeelding');
              if( !empty( $fc_afbeelding ) ){
                printf('<div class="df-page-simage">%s</div>', cbv_get_image_tag($fc_afbeelding));
              }
            }elseif( get_row_layout() == 'horizontal_rule' ){
              $rheight = get_sub_field('fc_horizontal_rule');
              printf('<div class="dfhrule clearfix" style="height: %spx;"></div>', $rheight);
          
            }elseif( get_row_layout() == 'gap' ){
             $gap = get_sub_field('fc_gap');
             printf('<div class="dfgap clearfix" style="height: %spx;"></div>', $rheight);
            }
        endwhile;
        echo '</article></div></div></div>';
      }else{
        echo '<div class="container"><div class="row"><div class="col-sm-12"><article class="default-page-con">';
        the_content();
        echo '</article></div></div></div>';
      }
      ?>
</section>
<?php 
get_template_part('templates/footer', 'top');

endwhile; get_footer(); ?>