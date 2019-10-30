<?php 
get_header(); 
$thisID = get_option('page_for_posts');
$pageTitle = get_the_title($thisID);
$standaardbanner = get_field('bannerafbeelding', $thisID);
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


<section class="innerpage-con-wrap" id="news-details-page-controller">
  <div class="container-sm-2">
    <div class="row">
      <div class="col-sm-12">
        <div id="main-content" class="clearfix">
          <div id="sidebar" class="sidebar">
            <div class="sidebar__inner clearfix">
              <div class="dft-news-details-social-icon">
                <ul class="clearfix ulc">
                  <li>
                    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>">
                      <svg class="fb-icon-svg" width="11" height="20" viewBox="0 0 11 20" fill="#43587B">
                        <use xlink:href="#fb-icon-svg"></use>
                      </svg> 
                    </a>
                    </li>
                  <li>
                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink(); ?>&title=<?php echo get_the_title(); ?>&summary=<?php echo get_the_excerpt(); ?>&source=">
                      <svg class="linkedin-icon-svg" width="20" height="18" viewBox="0 0 20 18" fill="#43587B">
                        <use xlink:href="#linkedin-icon-svg"></use>
                      </svg>
                    </a>
                    </li>
                  <li>
                    <a target="_blank" href="https://twitter.com/home?status=<?php echo get_the_permalink(); ?> <?php echo get_the_title(); ?>">
                      <svg class="twitter-icon-svg" width="22" height="18" viewBox="0 0 22 18" fill="#43587B">
                        <use xlink:href="#twitter-icon-svg"></use>
                      </svg>
                    </a>
                    </li>
                </ul>
              </div>
            </div>
          </div>

          <article class="default-page-con clearfix" id="content">
            <div class="default-page-con-inner">
            	<div class="dfp-promo-module dateblog clearfix">
            		<h1><?php echo get_the_title(); ?></h1>
	            	<div class="blog-post-date-bdr">
	                  <strong><?php echo get_the_date('d'); ?></strong>
	                  <span><?php echo get_the_date('M'); ?></span>
	                </div>
            	</div>
              	<?php 
		        while ( have_rows('inhoud') ) : the_row(); 
		          if( get_row_layout() == 'introductietekst' ){
		              $subtitel = get_sub_field('subtitel');
		              $afbeelding = get_sub_field('afbeelding');
		              echo '<div class="dfp-promo-module clearfix">';
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
		                if( $lightbox ) echo "<a data-fancybox='gallery' href='{$image['url']}'>";
		                    echo wp_get_attachment_image( $image['ID'], 'vgrid2' );
		                if( $lightbox ) echo "</a>";
		                echo "</div></figure>";
		                endforeach;
		              echo "</div></div>";
		              endif;      
		            }elseif( get_row_layout() == 'usps' ){
		              $fc_usps = get_sub_field('fc_usps');
		              echo "<div class='dft-img-title-grd-controller clearfix'>";
		                foreach( $fc_usps as $usp ):
		                  echo "<div class='dft-img-title-grd-col'><div class='dft-img-title-grd-col-inner'>";
		                    echo "<span>";
		                    echo wp_get_attachment_image( $usp['icon'] );
		                    echo "</span>";
		                    printf('<h4>%s</h4>', $usp['titel']);
		                  echo "</div></div>";
		                endforeach;
		              echo "</div>";
		            }elseif( get_row_layout() == 'quote' ){
		              $fc_diensten = get_sub_field('fc_quote');
		              echo "<div class='dft-blockquote'>";
		              printf('<blockquote>%s</blockquote>', $fc_diensten);
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
		            }elseif( get_row_layout() == 'product' ){
		              $fc_product = get_sub_field('fc_product');
		              $memQuery = new WP_Query(array(
		                'post_type' => 'product',
		                'posts_per_page'=> -1,
		                'post__in' => $fc_product
		              ));
		              if( $memQuery->have_posts() ):
		                echo '<div class="dft-2grd-img-content clearfix"><div class="dft2grdImgConSlider">';
		                        while($memQuery->have_posts()): $memQuery->the_post();
		                        $gridImage = get_post_thumbnail_id(get_the_ID());
		                        if(!empty($gridImage)){
		                          $pimgScr = cbv_get_image_src($gridImage, 'pgprodgrid');
		                        }else{
		                          $pimgScr = '';
		                        }  
		                        $term_obj_list = get_the_terms( get_the_ID(), 'product_cat' );
		                        echo '<div class="dft-2grd-img-con-item-col">';
		                        echo '<div class="dft-img-col-hover-scale">
		                          <a class="overlay-link" href="'.get_the_permalink().'"></a>';
		                        echo '<div class="dft-2grd-img-con-item-img" style="background-image: url('.$pimgScr.');"></div></div>';
		                        echo '<div class="dft-2grd-img-con-item-des">';
				                  if ( $term_obj_list && ! is_wp_error( $term_obj_list ) ) : 
				                    printf('<strong>%s</strong>', join(', ', wp_list_pluck($term_obj_list, 'name')));
				                  endif;
		                        printf('<h4><a href="%s">%s</a></h4>', get_the_permalink(), get_the_title());
		                        echo wpautop( get_the_excerpt(), true );;
		                        echo '<a href="'.get_the_permalink().'">More Info <em><img src="'.THEME_URI.'/assets/images/list-icon.svg"></em></a>';
		                        echo '</div>';
		                        echo '</div>';
		                    endwhile;

		                echo '</div></div> <div class="dft-2grd-img-content-separetor"></div>';
		              endif; wp_reset_postdata();
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
              	?>
              <div class="dft-share-link">
<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&width=450&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=466258030197150" width="450" height="25" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
get_template_part('templates/footer', 'top');

get_footer(); ?>