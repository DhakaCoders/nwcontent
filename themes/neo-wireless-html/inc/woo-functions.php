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
add_action('woocommerce_after_main_content', 'get_custom_wc_output_content_wrapper_end', 10, 1);

function get_custom_wc_output_content_wrapper(){
	if(is_shop()){ $customClass = ' wcarchive';}elseif(is_product()){$customClass = ' wcsingle';}else{ $customClass = '';}
	echo '<section class="wccontent-wrapper'.$customClass.'"><div class="container"><div class="row"><div class="col-sm-12"><div class="wccontent-inner clearfix">';
    if(!is_product()) put_woocommerce_search_sidebar_tag_start();
}

function get_custom_wc_output_content_wrapper_end(){
    if(!is_product()) put_woocommerce_search_sidebar_tag_end();

	echo '</div></div></div></div></section>';
    get_template_part('templates/footer', 'top');
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
        $term_obj_list = get_the_terms( $product->get_id(), 'product_cat' );
  		$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
		echo '<div class="catalogue-image"><a href="'.get_permalink( $product->get_id() ).'">'.woocommerce_get_product_thumbnail().'</a></div>';
        if ( $term_obj_list && ! is_wp_error( $term_obj_list ) ) : 
          printf('<h5>%s</h5>', join(', ', wp_list_pluck($term_obj_list, 'name')));
        endif;
		echo '<h4><a href="'.get_permalink( $product->get_id() ).'">'.get_the_title().'</a></h4>';
		echo '<div class="shorttext-loop">'.$short_description.'</div>';
		echo '<div class="moreproduct"><a href="'.get_permalink( $product->get_id() ).'">More Info</a></div>';
	}
}


function envy_stock_catalog() {
    global $product;

    if ($product->is_in_stock())//Stock is Available
    {
    if($product->get_stock_quantity() < 1 && $product->backorders_allowed()){ //Product is Out of Stock
       echo '<div class="out-of-stock" >' . __( 'Available on backorder', 'woocommerce' ) . '</div>';
    }
    }else{ //Product is out of stock AND DO NOT allow backorders
    echo '<div class="out-of-stock" >' . __( 'out of stock', 'woocommerce' ) . '</div>';
    }
}
add_action( 'woocommerce_after_shop_loop_item_title', 'envy_stock_catalog' );




/**
 * Archive sidebar tag start
 */
if (!function_exists('put_woocommerce_search_sidebar_tag_start')) {
	function put_woocommerce_search_sidebar_tag_start(){
		?>
<div class="row">
	<div class="col-sm-12">
		<div class="search-catalog clearfix">
		<?php 
			if (function_exists('get_woocommerce_search_catalog')){
				get_woocommerce_search_catalog();
			}
		?>
		</div>
	</div>
</div>
<div class="row">
<div class="col-sm-3">
	<div class="woosidebar-left">
		<?php 
			if (function_exists('get_woocommerce_custom_sideber')){
				get_woocommerce_custom_sideber();
			}
		?>
	</div>
</div>
<div class="col-sm-9">
<?php
}
}

/**
 *  Archive sidebar tag end
 */
if (!function_exists('put_woocommerce_search_sidebar_tag_end')) {
	function put_woocommerce_search_sidebar_tag_end(){
		echo '</div></div>';
	}
}

/**
 * Manage woocommerce sidebar here
 */
if (!function_exists('get_woocommerce_custom_sideber')) {
	function get_woocommerce_custom_sideber(){
        if ( is_active_sidebar( 'shop-widget' ) ) :
    		dynamic_sidebar('shop-widget');
        endif;
        echo '<div class="wccatalog sidebarcatalog show-xs">';
        _e( '<span>Sort By: </span>', 'woocommerce' ).
        woocommerce_catalog_ordering();
        echo '</div>';
	}

}



/**
 * Manage woocommerce search and catalog ordering here
 */
if (!function_exists('get_woocommerce_search_catalog')) {
	function get_woocommerce_search_catalog(){
		echo '<div class="wcsearch">';
		echo '<form role="search" method="get" class="woocommerce-product-search" action="'. esc_url( home_url( '/' ) ).'">
        <input type="search" class="search-field" placeholder="'. esc_attr__( 'Search products&hellip;', 'woocommerce' ).'" value="'. get_search_query() .'" name="s" />
        <button type="submit" value="'. esc_attr_x( 'Search', 'submit button', 'woocommerce' ).'">'. esc_html_x( 'Search', 'submit button', 'woocommerce' ).'</button>
        </form>';
		echo '</div><div class="wccatalog hide-xs">';
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
	$output .= __( '<span class="price-prefix">Starting at </span>', 'woocommerce' ).'<span class="price">'. $product->get_price_html().'</span>';
	$output .= '</div>';
	$output .= '<div class="wcdetails">';
	$output .= __( '<h2>Description</h2>', 'woocommerce' );
    $output .= $short_description;
	$output .= '<div class="wcdetailsbtn"><a href="#">More Info</a><a href="#">Less Info</a></div>';
	$output .= '</div>';
	echo $output;
}

add_action('woocommerce_single_product_summary','show_stock_single',10, 2);
function show_stock_single() {
  global $product;

  if ($product->is_in_stock())//Stock is Available
  {
    if($product->get_stock_quantity() < 1 && $product->backorders_allowed()){ //Product is Out of Stock
       echo '<div class="obackorder-single" >' . __( 'Available on backorder', 'woocommerce' ) . '</div>';
    }
  }
}

add_action( 'woocommerce_single_product_summary', 'get_wc_gellary_video_proposle_content', 40, 1 );
function get_wc_gellary_video_proposle_content(){
	global $product, $post;
	$output = '';
	$output .= '<div class="gellery-wrapper clearfix">';
	$output .= '<div class="video-inner">';
	$output .= get_product_gallery_video();
	$output .= '</div>';
	$output .= '<div id="galleryToScroll" class="gellery-inner">';
	$output .= get_product_thumbnail_images();
	$output .= '</div>';
	$output .= get_product_request_offer();
	$output .= '</div>';
	echo $output;
}


function get_product_gallery_video(){
	global $product;
	$output = '';
	$output .= '<div class="singlePage-vdo-wrp art-video"><div class="video-play-wrap"><div class="video-play-main">';
    $output .= '<a class="img-zoom" data-fancybox="article" href="https://www.youtube.com/watch?v=b4Yx9eHfsuc">
                <i><img src="'.THEME_URI.'/assets/images/vplay.svg"></i>
                <img alt="" src="'.THEME_URI.'/assets/images/video-g.png">
                </a>';
     $output .= '</div></div></div>';
	
	return $output;
}




function get_product_thumbnail_images(){
	if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
		return;
	}

	global $product;

	$attachment_ids = $product->get_gallery_image_ids();
	$output = '';
	if ( $attachment_ids && $product->get_image_id() ) {
        $output .= __( '<h2>Gallery</h2>', 'woocommerce' );
		$output .= '<ul>';
		foreach ( $attachment_ids as $attachment_id ) {
            $thumb_tag = cbv_get_image_tag($attachment_id, 'woocommerce_gallery_thumbnail');
			$full_src = cbv_get_image_src($attachment_id);
			$output .= '<li><a href="'.$full_src.'" data-fancybox="gallery">'.$thumb_tag.'</a></li>';
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



add_action( 'woocommerce_admin_process_product_object', 'save_product_custom_meta_data', 100, 1 );
function save_product_custom_meta_data( $product ){
    if ( isset( $_POST['_repair_price'] ) )
        $product->update_meta_data( '_repair_price', sanitize_text_field($_POST['_repair_price']) );
}

// Front: Add a text input field inside the add to cart form on single product page
add_action('woocommerce_single_product_summary','add_repair_price_option_to_single_product', 20 );
function add_repair_price_option_to_single_product(){
    global $product;

    if( !$product->is_type('variable') ) return;

    add_action('woocommerce_before_add_to_cart_button', 'product_option_custom_field', 30 );
}

function product_option_custom_field(){
    global $product, $woocommerce;
$wo_currency = get_woocommerce_currency_symbol();
$active_price = (float) $product->get_price();

$attributes = $product->get_attributes(); //get all attributes
$attrVariation = $product->get_variation_attributes(); //get variation attributes
$pa_capacity = get_the_terms( $product->get_id(), 'pa_capacity');
$onlyAttr = array_diff_key($attributes, $attrVariation); //get attribues that are not used for variation
$onlyAttrK = array_keys($onlyAttr); //keys -> pa_capacity, pa_color


echo '<div class="custom_attribues_wrapper clearfix" data-currency="'.$wo_currency.'">';
$j = 1;
foreach ( $onlyAttrK as $onlyAttrKS ) {
    echo '<div class="hidden-field additionalPriceWrap">';
    $terms = get_taxonomy( $onlyAttrKS ); //get this texonomy data
    $onlyAttrKSterms = get_the_terms( $product->get_id(), $onlyAttrKS); // get all the child terms
    echo '<span class="wcoptioanl">'.$terms->labels->singular_name.'</span>';
    echo '<p class="form-row form-row-wide" data-priority="">';
    $i = 1;
    foreach ( $onlyAttrKSterms as $term ) {
    //printr($term);
      $term_id = $term->term_id;
      $name = $term->name;
      $acf = 'term_' . $term_id;
      $markup = get_field('price', $acf);
        echo '<div class="woocommerce-input-wrapper">';
        echo '<input type="radio" id="optional-'.$i.$j.'" class="input-checkbox" data-label="'.$name.': + '.$wo_currency.$markup.'" name="'.$onlyAttrKS.'" value="'.$markup.'">';
        echo '<label for="optional-'.$i.$j.'" class="checkbox customCheckbox">'.$name.'</label>';
        echo '<span>+ <span class="woocommerce-Price-currencySymbol">'.$wo_currency.'</span>'.$markup.'</span>';
        echo '</div>';
    $i ++; 
    }
    echo '</p>';
    echo '</div>';
    $j ++;
}
echo '<input id="additionalPrice" type="hidden" name="additionalPrice" value="0">';
echo '<input id="additionalLabel" type="hidden" name="additionalLabel" value="">';
echo '<input id="prPrice" type="hidden" name="active_price" value="' . $active_price . '">';
echo '</div>';

    // Jquery: Update displayed price
    ?>
    <script type="text/javascript">
    jQuery(function($) {
        var currency = $('.custom_attribues_wrapper').data('currency');
        $('.additionalPriceWrap input').on('change', function(){
            var pp = 'span.price';
            var addTotal = 0;
            var Labeltext = '';
            $('.additionalPriceWrap input').each(function(){
                if( $(this).prop('checked') === true ){
                    addTotal += parseInt($(this).val());
                    Labeltext += $(this).data('label')+', ';
                }
            });
            console.log(Labeltext);
            var prRegPrice = parseInt($('#prPrice').val());
            var prTotal = prRegPrice + addTotal;

            $('#additionalPrice').val(addTotal);
            $('#additionalLabel').val(Labeltext);
            $(pp).html('<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">'+currency+'</span>'+prTotal+'</span>');
        });

    });
    </script>
    <?php
}

// Front: Calculate new item price and add it as custom cart item data
add_filter('woocommerce_add_cart_item_data', 'add_custom_product_data', 10, 3);
function add_custom_product_data( $cart_item_data, $product_id, $variation_id ) {
    if (isset($_POST['additionalPrice']) && !empty($_POST['additionalPrice']) ) {
        $cart_item_data['new_price'] = (float) ($_POST['active_price'] + $_POST['additionalPrice']);
        $cart_item_data['additionalPrice'] = (float) $_POST['additionalPrice'];
        $cart_item_data['active_price'] = (float) $_POST['active_price'];

        $cart_item_data['repair_lebel'] = $_POST['additionalLabel'];

        $cart_item_data['unique_key'] = md5(microtime().rand());
    }

    return $cart_item_data;
}

// Front: Set the new calculated cart item price
add_action('woocommerce_before_calculate_totals', 'extra_price_add_custom_price', 20, 1);

function extra_price_add_custom_price($cart) {
    if (is_admin() && !defined('DOING_AJAX'))
        return;

    if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 )
        return;

    foreach($cart->get_cart() as $cart_item) {
        if (isset($cart_item['new_price']))
            $cart_item['data']->set_price((float) $cart_item['new_price']);
    }
}

// Front: Display option in cart item
add_filter('woocommerce_get_item_data', 'display_custom_item_data', 10, 2);

function display_custom_item_data($cart_item_data, $cart_item) {
    if (isset($cart_item['additionalPrice']) && isset($cart_item['repair_lebel'])) {
        $labelexpArray = explode(', ', $cart_item['repair_lebel']);
        $labelfilter = array_filter($labelexpArray, 'strlen');

        if(is_array($labelfilter) && !empty($labelfilter)){
            $i = 1;
            foreach ($labelfilter as $key => $value) {
                $cart_item_data[] = array(
                    'name' => __("Optional ".$i, "woocommerce"),
                    'value' => strip_tags($value)
                );

                $i++;
            }

        }

        
    }

    return $cart_item_data;
}




//add_action('woocommerce_order_item_meta_start', 'add_custom_order_item_meta_data', 1, 3 );
function add_custom_order_item_meta_data( $item_id, $values, $cart_item ) {

    global $order;

    echo wc_get_order_item_meta( $item_id, 'optional', $single = true );

}


// Save and display custom fields in order item meta
add_action( 'woocommerce_add_order_item_meta', 'add_custom_fields_order_item_meta', 20, 3 );
function add_custom_fields_order_item_meta( $item_id, $cart_item, $cart_item_key ) {
	$wo_currency = get_option('woocommerce_currency');
        $user_custom_values = $cart_item['repair_lebel'].': +'.$wo_currency.$cart_item['repair_price'];


    if (isset($cart_item['repair_lebel'])) {
        $labelexpArray = explode(', ', $cart_item['repair_lebel']);
        $labelfilter = array_filter($labelexpArray, 'strlen');

        if(is_array($labelfilter) && !empty($labelfilter)){
            $i = 1;
            foreach ($labelfilter as $key => $value) {
                 wc_add_order_item_meta($item_id,"Optional ".$i, strip_tags($value));  

                $i++;
            }

        }

        
    }

}




/*Checkout Woocommerce Hooks*/

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
//remove_action( 'woocommerce_proceed_to_checkout','woocommerce_button_proceed_to_checkout', 20);
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 

function get_woocommerce_custom_cart(){
	get_template_part( 'templates/checkout', 'cart' );
}



function ship_to_different_address_translation( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
	case 'Ship to a different address?' :
		$translated_text = __( 'Where is the equipment installed?', 'woocommerce' );
	break;
	case 'Billing details' :
		$translated_text = __( 'Personal Info', 'woocommerce' );
	break;
	case 'Cart totals' :
		$translated_text = __( '', 'woocommerce' );
	break;
    case 'Product successfully added to your cart' :
        $translated_text = __( 'Added to cart.', 'woocommerce' );
    break;
    case 'Place order' :
        $translated_text = __( 'CHECKOUT', 'woocommerce' );
    break;
	}

	return $translated_text;
}

add_filter('gettext', 'ship_to_different_address_translation', 20, 3);