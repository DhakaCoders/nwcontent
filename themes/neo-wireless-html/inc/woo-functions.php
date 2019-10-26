<?php 
defined( 'ABSPATH' ) || exit;

/*Remove Archive Woocommerce Hooks & Filters are below*/

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/*Loop Hooks*/

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );


/**
 * Add wc custom content wrapper
 */
add_action('woocommerce_before_main_content', 'get_custom_wc_output_content_wrapper', 10);
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 10);

function get_custom_wc_output_content_wrapper(){
	if(is_shop()){ $customClass = ' wcarchive';}elseif(is_product()){$customClass = ' wcsingle';}else{ $customClass = '';}
	echo '<section class="wccontent-wrapper'.$customClass.'"><div class="container"><div class="row"><div class="col-sm-12"><div class="wccontent-inner clearfix">';
}

function get_custom_wc_output_content_wrapper_end(){
	echo '</div></div></div></div></section>';
}


/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
add_filter( 'woocommerce_show_page_title' , 'woo_hide_shop_page_title' );
function woo_hide_shop_page_title() {
	return false;
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}


/**
 * Add loop inner details are below
 */
add_action('woocommerce_shop_loop_item_title', 'add_shorttext_below_title_loop', 5);
if (!function_exists('add_shorttext_below_title_loop')) {
	function add_shorttext_below_title_loop() {
		global $product, $woocommerce, $post;
  		$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
		echo '<div class="catalogue-image"><a href="'.get_permalink( $product->get_id() ).'">'.woocommerce_get_product_thumbnail().'</a></div>';
		echo '<h5>Mounting Accessories</h5>';
		echo '<h4>'.get_the_title().'</h4>';
		echo '<div class="shorttext-loop">'.$short_description.'</div>';
		echo '<div class="moreproduct"><a href="'.get_permalink( $product->get_id() ).'">More Info</a></div>';
	}
}


/**
 * Manage woocommerce sidebar here
 */
if (!function_exists('get_woocommerce_custom_sideber')) {
	function get_woocommerce_custom_sideber(){
		?>

		<div id="nw-pro-left-sidebar">
		  <div class="nw-pro-categories"> 
		    <h2>Categories</h2>
		    <div class="nw-pro-categories-innr"> 
		      <ul class="ulc">
		        <li class="active">
		          <a href="#">ALL</a>
		        </li>
		        <li class="subcategorie-wrp">
		          <a href="#">Mounting Accesories</a>
		          <ul class="ulc subcategorie">
		            <li>
		              <a href="#">Subcategorie</a>
		            </li>
		            <li>
		              <a href="#">Subcategorie</a>
		            </li>
		            <li>
		              <a href="#">Subcategorie</a>
		            </li>
		          </ul>
		        </li>
		        <li>
		          <a href="#">Network Hardware</a>
		        </li>
		      </ul>
		    </div>
		  </div>
		  <div class="radio-check-box-wrapper clearfix"> 
		    <div class="radio-box-wrp">
		      <h2>Search Results</h2>
		      <div class="radio-box-block"> 
		        <form action="#">
		          <p>
		            <input type="radio" id="test01" name="radio-group" checked="">
		            <label for="test01">All</label>
		          </p>
		          <p>
		            <input type="radio" id="test02" name="radio-group">
		            <label for="test02">Indoor</label>
		          </p>
		          <p>
		            <input type="radio" id="test03" name="radio-group">
		            <label for="test03">Outdoor</label>
		          </p>
		          <p>
		            <input type="radio" id="test04" name="radio-group">
		            <label for="test04">Universal</label>
		          </p>
		          <p>
		            <input type="radio" id="test05" name="radio-group">
		            <label for="test05">Cisco</label>
		          </p>
		          <p>
		            <input type="radio" id="test06" name="radio-group">
		            <label for="test06">Meraki</label>
		          </p>
		          <p>
		            <input type="radio" id="test07" name="radio-group">
		            <label for="test07">HP/Aruba</label>
		          </p>
		          <p>
		            <input type="radio" id="test08" name="radio-group">
		            <label for="test08">Mist</label>
		          </p>
		          <p>
		            <input type="radio" id="test09" name="radio-group">
		            <label for="test09">Aerohive</label>
		          </p>
		          <p>
		            <input type="radio" id="test10" name="radio-group">
		            <label for="test10">Ruckus</label>
		          </p>
		          <p>
		            <input type="radio" id="test11" name="radio-group">
		            <label for="test11">Ubiquiti</label>
		          </p>
		          <p>
		            <input type="radio" id="test12" name="radio-group">
		            <label for="test12">Fortinet</label>
		          </p>
		          <p>
		            <input type="radio" id="test13" name="radio-group">
		            <label for="test13">Airborne</label>
		          </p>
		          <p>
		            <input type="radio" id="test14" name="radio-group">
		            <label for="test14">Wall</label>
		          </p>
		          <p>
		            <input type="radio" id="test15" name="radio-group">
		            <label for="test15">Pole</label>
		          </p>
		          <p>
		            <input type="radio" id="test16" name="radio-group">
		            <label for="test16">Directional</label>
		          </p>  
		          <p>
		            <input type="radio" id="test17" name="radio-group">
		            <label for="test17">Omnidirectional</label>
		          </p>                  
		        </form>
		      </div>             
		    </div>
		    <div class="check-box-wrp">
		      <h2>Search Filters</h2>         
		      <div class="check-box-block"> 
		        <form>
		          <div class="form-group">
		            <input type="checkbox" name="percent" id="30%">
		            <label for="30%">Lorem Ipsum </label>
		          </div>
		          <div class="form-group">
		            <input type="checkbox" name="percent" id="40%">
		            <label for="40%">Dolor sit amet </label>
		          </div>
		          <div class="form-group">
		            <input type="checkbox" name="percent" id="50%">
		            <label for="50%">maecenas edibus</label>
		          </div>
		        </form>
		      </div> 
		    </div>
		  </div>
		</div>
		
		<?php
	}

}



/**
 * Manage woocommerce search and catalog ordering here
 */
if (!function_exists('get_woocommerce_search_catalog')) {
	function get_woocommerce_search_catalog(){
		echo '<div class="wcsearch">';
		get_product_search_form();
		echo '</div><div class="wccatalog">';
		_e( '<span>Sort By: </span>', 'woocommerce' ).
		woocommerce_catalog_ordering();
		echo '</div>';
	}
}


/**
* @snippet     Rename a Default Sorting Option @ WooCommerce Shop
*/
 
add_filter( 'woocommerce_catalog_orderby', 'bbloomer_rename_sorting_option_woocommerce_shop' );
 
function bbloomer_rename_sorting_option_woocommerce_shop( $options ) {
   $options['price'] = __( 'Price: Ascending', 'woocommerce' );   
   $options['price-desc'] = __( 'Price: Descending', 'woocommerce' );   
   return $options;
}

add_filter( 'woocommerce_catalog_orderby', 'bbloomer_remove_sorting_option_woocommerce_shop' );
 
function bbloomer_remove_sorting_option_woocommerce_shop( $options ) {
   unset( $options['menu_order'] );   
   unset( $options['popularity'] );   
   unset( $options['rating'] );   
   unset( $options['date'] );   
   return $options;
}

/*Remove Single page Woocommerce Hooks & Filters are below*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


add_action( 'woocommerce_single_product_summary', 'get_wc_product_desctiption', 10, 1 );
function get_wc_product_desctiption(){
	global $product, $post;
	$short_description = apply_filters( 'woocommerce_description', wpautop( $post->post_content, true ));
	$output = '';
	$output .= '<div class="wcprice">';
	$output .= __( '<span class="price-prefix">Starting at </span>', 'woocommerce' ). $product->get_price_html();
	$output .= '</div>';
	$output .= '<div class="wcdetails">';
	$output .= __( '<h2>Description</h2>', 'woocommerce' );
	$output .= $short_description;
	$output .= '</div>';
	echo $output;
}


add_action( 'woocommerce_after_single_product_summary', 'get_wc_gellary_video_proposle_content', 10, 1 );
function get_wc_gellary_video_proposle_content(){
	global $product, $post;
	$output = '';
	$output .= '<div class="row"><div class="col-sm-offset-6 col-sm-6"><div class="gellery-wrapper">';
	$output .= '<div class="video-inner">';
	$output .= get_product_gallery_video();
	$output .= '</div>';
	$output .= '<div id="galleryToScroll" class="gellery-inner">';
	$output .= get_product_thumbnail_images();
	$output .= '</div>';
	$output .= get_product_request_offer();
	$output .= '</div></div></div>';
	echo $output;
}


function get_product_gallery_video(){
	global $product;
	$output = '';
	$output .= '<img src="'.THEME_URI.'/assets/images/video-g.png" alt="sidebar">';
	
	return $output;
}




function get_product_thumbnail_images(){
	if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
		return;
	}

	global $product;

	$attachment_ids = $product->get_gallery_image_ids();
	$output = '';
	$output .= __( '<h2>Gallery</h2>', 'woocommerce' );
	if ( $attachment_ids && $product->get_image_id() ) {
		$output .= '<ul>';
		foreach ( $attachment_ids as $attachment_id ) {
			$thumb_tag = cbv_get_image_tag($attachment_id, 'woocommerce_gallery_thumbnail');
			$output .= '<li><a href="">'.$thumb_tag.'</a></li>';
		}
		$output .= '</ul>';
	}
	return $output;
}

function get_product_request_offer(){
	global $product;
	$output = '';
	$output = '<div class="requestoffer-inner">';
	$output .= '<h3>Need a custom proposal?</h3>';
	$output .= '<p>Proin est risus, convallis nec magna sed, semper consequat est.</p>';
	$output .= '<a class="requestbtn" href="#">Request an offer</a>';
	$output .= '</div>';
	
	return $output;
}