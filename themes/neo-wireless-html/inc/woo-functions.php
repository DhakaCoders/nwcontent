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

		<div class="nw-pro-left-sidebar"></div>
		
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



/*Checkout Woocommerce Hooks*/

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_order_review', 10 );
remove_action( 'woocommerce_proceed_to_checkout','woocommerce_button_proceed_to_checkout', 20);

function get_woocommerce_custom_cart(){
	echo '<div class=""clearfix>';
	echo __( '<h3>Shopping Cart</h3>', 'woocommerce' );
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
		$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
			?>
			<div class="woocommerce-cart-form__cart-item wccartform clearfix <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

				<div class="product-thumbnail checkoutimg">
				<?php
				$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

				if ( ! $product_permalink ) {
					echo $thumbnail; // PHPCS: XSS ok.
				} else {
					printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
				}
				?>
				</div>
				<div class="cartdetails">
				<div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
				<?php
				if ( ! $product_permalink ) {
					echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
				} else {
					echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
				}

				do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

				// Meta data.
				echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

				// Backorder notification.
				if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
					echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
				}
				?>
				</div>
				<div class="wrapper-quantity">
					<div class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
						?>
					</div>
					<div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
					<?php
					if ( $_product->is_sold_individually() ) {
						$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
					} else {
						$product_quantity = woocommerce_quantity_input(
							array(
								'input_name'   => "cart[{$cart_item_key}][qty]",
								'input_value'  => $cart_item['quantity'],
								'max_value'    => $_product->get_max_purchase_quantity(),
								'min_value'    => '0',
								'product_name' => $_product->get_name(),
							),
							$_product,
							false
						);
					}

					echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
					?>
					</div>
				</div>
			</div>
			</div>
			<?php
		}
	}
	get_template_part( 'woocommerce/cart/cart-totals', null );
	echo '</div>';

}