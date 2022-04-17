<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-md-3 col-sm-6">
	<div class="shop-product">
		<div class="product-thumb"><a href="<?php echo get_the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt=""></a>
			<div class="product-overlay"><?php apply_filters( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );?></div>
		</div>
		<div class="product-info">
			<h4 class="upper"><a href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a></h4><span><?php echo $product->get_price_html(); ?></span>
			<div class="save-product"><a href="#"><i class="icon-heart"></i></a></div>
		</div>
	</div>
</div>

