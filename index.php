<?php
/**
 * Plugin Name: BC AJAX Product Search
 * Plugin URI: https://www.binarycarpenter.com/
 * Description: Enable ajax product search
 * Version: 1.0.0
 * Author: BinaryCarpenter.com
 * Author URI: https://www.binarycarpenter.com
 * License: GPL2
 * Text Domain: bc-ajax-product-search
 * WC requires at least: 3.0.0
 * WC tested up to: 3.6.3
 */


class BC_AJAX_Product_Search
{
	public function __construct() {

		add_action('admin_enqueue_scripts', array($this, 'enqueue_admin'));
		add_action('admin_menu', array($this, 'add_to_menu'));

	}


	public function add_to_menu()
	{
		add_menu_page(
			'BC Product Search',
			'BC Product Search',
			'manage_options',
			'bc-product-search',
			array($this,'plugin_ui')
		);
	}

	public function plugin_ui()
	{ ?>
		<h1>Select your products</h1>
		<select data-security="<?php echo wp_create_nonce( 'search-products' ); ?>" multiple style="width: 300px;" class="bc-product-search"></select>
        <button class="show-selected-results">Show select results</button>
	 <?php }


	public function enqueue_admin() {
		wp_register_style('my-plugin-select2-style', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css');
		wp_enqueue_style('my-plugin-select2-style');

		wp_register_script('my-plugin-select2-script', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js', array('jquery'));
		wp_register_script('my-plugin-script', plugins_url('static/scripts.js', __FILE__), array('jquery'));
		wp_enqueue_script('my-plugin-select2-script');
		wp_enqueue_script('my-plugin-script');
	}


}

new BC_AJAX_Product_Search();