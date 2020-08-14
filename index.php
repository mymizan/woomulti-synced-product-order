<?php
/**
 * WooMultistore Show Synced Products Only 
 *
 * @author  	Lykke Media AS
 * @copyright	2020 Lykke Media AS
 *
 * @wordpress-plugin
 * Plugin Name: WooMultistore Show Synced Products Only 
 * Description: When  this plugin is enabled on a child site, the site will only send orders for the synced products.
 * Author: Lykke Media AS
 * Author URI: https://woomultistore.com/
 * Version: 1.0.0
 * Requires at least: 5.3.0
 * Tested up to: 5.5
 *
 * WC requires at least: 3.6.0
 * WC tested up to: 4.3
 *
 **/

class WOOMULTI_SYNCED_PRODUCT_ORDERS_ONLY {
	public function __construct() {
		add_action('init', array($this, 'init'), 1, 0);
	}

	function init() {
		add_filter('WOO_MSTORE/network_order_query', array($this, 'filter_orders_by_meta'), 10, 1);
	}

	public function filter_orders_by_meta( $query ) {
		$query['meta_key'] = '_woonet_has_synced_product';
		$query['meta_value'] = 'yes';
		return $query; 
	}
}


new WOOMULTI_SYNCED_PRODUCT_ORDERS_ONLY();