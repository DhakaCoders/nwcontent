<?php 
/**
* Get the image tag with alt/title tag
*/
function cbv_get_image_tag( $id, $size = 'full', $title = false ){
	if( isset( $id ) ){
		$output = '';
		$image_title = get_the_title($id);
		$image_alt = get_post_meta( $id, '_wp_attachment_image_alt', true);
    if( empty( $image_alt ) ){
      $image_alt = $image_title;
    }
		$image_src = wp_get_attachment_image_src( $id, $size, false );

		if( $title ){
			$output = '<img src="'.$image_src[0].'" alt="'.$image_alt.'" title="'.$image_title.'">';
		}else{
			$output = '<img src="'.$image_src[0].'" alt="'.$image_alt.'">';
		}

		return $output;
	}
	return false;
}

/**
* Get the image src url by attachement it
*/
function cbv_get_image_src( $id, $size = 'full' ){
  if( isset( $id ) ){
    $afbeelding = wp_get_attachment_image_src($id, $size, false );
    if( is_array( $afbeelding ) && isset( $afbeelding[0] ) ){
      return $afbeelding[0];
    }
  }
  return false;
}

function cbv_gallery( $gallery = null, $col = 2, $lightbox = false ){
	$output = '';
    if( is_array( $gallery ) ){
    	$rowcls = ( count( $gallery ) > $col ) ? 'row1p' : 'row1';
    	$size = 'full';
    	$lightboxcls = ( $lightbox ) ? 'has-lightbox' : '';
    	if( $col == 2 ) $size = 'gallery-2col'; else $size = 'gallery-3col';
    	$output = "<div class='bgallery col{$col} {$rowcls}'><ul class='{$lightboxcls}'>";   
    		foreach( $gallery as $image ){
    			$ID = $image['ID'];
    			$imagesize = cbv_get_image_tag( $ID, $size );
    			$imagefull = $image['url'];
    			if ( $lightbox ) {
    				$output .= "<li><a data-fancybox href='{$imagefull}'>{$imagesize}</a></li>";
    			}else{
    				$output .= "<li>{$imagesize}</li>";
    			}
    		}
    	$output .= "</ul></div>";   
    }
    return $output;
}

function cbv_imagegrid( $image, $desc, $position = 'left' ){
	$output = '';
	if( !empty( $image ) && !empty( $desc ) ){
		$output = ( $position == 'left' ) ? 
			"<div class='df-text-rgt-img-grd-2 clearfix'>" : 
			"<div class='df-text-lft-img-grd-2 clearfix'>";
		$output .= '<div>' .cbv_get_image_tag( $image ). '</div>';
		$output .= '<div>' .wpautop( $desc ). '</div>';
		$output .= "</div>";
	}
	return $output;
}

function cbv_qoute( $image, $comment, $company = '' ){
  if( !empty( $image ) ){?>
  <div class="ftr-top-section inr-page-testi">
    <div class="bw-lft-img-rgt-tsti clearfix">
      <div class="bw-lft-img" style="background: url(<?php echo $image; ?>); background-size: cover; background-position: center center; background-repeat: no-repeat;"></div>
      <div class="bw-rgt-des">
        <blockquote class="ftr-top-testi">
          <div class="ftr-top-testi-inr">
	        <?php 
	        printf('<p>%s</p>', $comment ); 
	        printf('<a href="javascript:void();">%s</a>', $company ); 
	        ?>
          </div>
        </blockquote>
      </div>
    </div>   
  </div>
  <?php }else{ ?>
  <div class="two-palate-img-dsc blockcode-full-dsc clearfix">
    <blockquote>
        <?php 
        printf('<p>%s</p>', $comment ); 
        printf('<a href="javascript:void();">%s</a>', $company ); 
        ?>
    </blockquote>
  </div>
  <?php }	
}

function hex2RGB($hexStr, $opacity = 1, $returnAsString = true, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
        $rgbArray['opacity'] = $opacity;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
        $rgbArray['opacity'] = $opacity;
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}

function cbv_table( $table){
  if ( ! empty ( $table ) ) {
    echo '<div class="dfp-tbl-wrap">
    <div class="table-dsc" data-aos="fade-up" data-aos-delay="200">
    <table>';
    if ( ! empty( $table['caption'] ) ) {
      echo '<caption>' . $table['caption'] . '</caption>';
    }
    if ( ! empty( $table['header'] ) ) {
      echo "<thead>";
      echo '<tr>';
      foreach ( $table['header'] as $th ) {
        echo '<th>';
        echo $th['c'];
        echo '</th>';
      }
      echo '</tr>';
      echo '</thead>';
    }
    echo '<tbody>';
    foreach ( $table['body'] as $tr ) {
      echo '<tr>';
      foreach ( $tr as $td ) {
        echo '<td>';
        echo $td['c'];
        echo '</td>';
      }
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table></div>';

    echo '<div class="hide"><div class="table-xs">';
      echo '<div class="fl-tabs clearfix">';
      $hmany = count($table['header']);
      $i = 0;
      foreach ( $table['header'] as $th ) {
        if( $i == 0 ) $cls = 'current'; else $cls = '';
        echo "<button class='tab-link {$cls}' data-tab='tab-{$i}'>
            <span>{$th['c']}</span>
          </button>";
      $i++;
      }
      echo '</div>';
      $j = 0;
      foreach ( $table['header'] as $th ) {
        if( $j == 0 ) $cls = 'current'; else $cls = '';
        echo "<div id='tab-{$j}' class='fl-tab-content {$cls}'>
          <ul class='clearfix'>";
          foreach ( $table['body'] as $tr ) {  
            //foreach ( $tr as $td ) {
              echo "<li>{$tr[$j]['c']}</li>";
            //}
          }
          echo "</ul>
        </div>";
      $j++; }

    echo '</div></div></div>';
  }  
}

function cbv_inpage_table( $table){
  if ( ! empty ( $table ) ) {
    echo '<div class="dfp-tbl-wrap">
    <div class="table-dsc hide-xs">
    <table>';
    if ( ! empty( $table['caption'] ) ) {
      echo '<caption>' . $table['caption'] . '</caption>';
    }
    if ( ! empty( $table['header'] ) ) {
      echo "<thead>";
      echo '<tr>';
      foreach ( $table['header'] as $th ) {
        echo '<th>';
        echo $th['c'];
        echo '</th>';
      }
      echo '</tr>';
      echo '</thead>';
    }
    echo '<tbody>';
    foreach ( $table['body'] as $tr ) {
      echo '<tr>';
      foreach ( $tr as $td ) {
        echo '<td>';
        echo $td['c'];
        echo '</td>';
      }
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table></div>';

    echo '<div class="show-xs"><div class="fl-table-xs table-dsc">';
      echo '<div class="fl-xs-tbl-tabs clearfix">';
      $hmany = count($table['header']);
      $i = 0;
      foreach ( $table['header'] as $th ) {
        if( $i == 0 ) $cls = 'current'; else $cls = '';
        echo "<button class='tab-link {$cls}' data-tab='fl-tbl-xs-tab-{$i}'>
            <span>{$th['c']}</span>
          </button>";
      $i++;
      }
      echo '</div>';
      $j = 0;
      foreach ( $table['header'] as $th ) {
        if( $j == 0 ) $cls = 'current'; else $cls = '';
        echo "<div id='fl-tbl-xs-tab-{$j}' class='fl-xs-tbl-tab-content {$cls}'>
          <ul class='clearfix'>";
          foreach ( $table['body'] as $tr ) {  
            //foreach ( $tr as $td ) {
              echo "<li>{$tr[$j]['c']}</li>";
            //}
          }
          echo "</ul>
        </div>";
      $j++; }

    echo '</div></div></div>';
  }  
}


function socialMedia( $sociale_media = array() ){
  foreach( $sociale_media as $media ){
    $name = strtolower($media['name']);
    $url = $media['url'];
    if( !empty( $name ) && !empty( $url ) ){
        printf('<a target="_blank" href="%s"><i class="fa fa-%s" aria-hidden="true"></i></a>', 
          $url, $name);
    }
  }
}
function socialMediaList( $sociale_media = array() ){
  foreach( $sociale_media as $media ){
    $name = strtolower($media['name']);
    $url = $media['url'];
    if( !empty( $name ) && !empty( $url ) ){
        printf('<a target="_blank" href="%s"><i class="fa fa-%s" aria-hidden="true"></i></a>', 
          $url, $name);
    }
  }
}

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function paginate() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('page','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'show_all' => true,
        'type' => 'plain'
    );
    if ( $wp_rewrite->using_permalinks() ) $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );
    if ( !empty($wp_query->query_vars['s']) ) $pagination['add_args'] = array( 's' => get_query_var( 's' ) );
    echo paginate_links( $pagination );
}

function cbv_languages_list(){
  if ( function_exists( 'icl_get_languages' ) ) {
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        echo '<ul class="ulc">';
        $languages = array_reverse($languages);
        foreach($languages as $l){
            if($l['active']) 
              $activeCls = 'lag-active"';
            else 
              $activeCls = '';
/*            if($l['country_flag_url']){
                if(!$l['active']) echo '<a href="'.$l['url'].'">'; else echo '<a href="javascript:void();">';
                echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
                echo '</a>';
            }*/
            if(!$l['active']) 
              echo '<li class="'.$activeCls.'"><a href="'.$l['url'].'">'; 
            else 
              echo '<li class="'.$activeCls.'"><a href="javascript:void(0)">';
            
            echo icl_disp_language($l['language_code'], $l['language_code']);
            echo '</a></li>';
        }
        echo '</ul>';
    }
  }
}

function downloadTag( $dfile ){
    if( !empty( $dfile ) )
        echo "<a class='hasdownload' href='{$dfile}' download>";
    else
        echo "<a>";
}