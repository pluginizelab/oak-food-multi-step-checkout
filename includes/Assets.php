<?php

namespace PluginizeLab\OakFoodMultiStepCheckout;

class Assets {
	/**
	 * The constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_all_scripts' ), 10 );

		if ( is_admin() ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ), 10 );
		} else {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_front_scripts' ) );
		}
	}

	/**
	 * Register all Dokan scripts and styles.
	 *
	 * @return void
	 */
	public function register_all_scripts() {
		$this->register_styles();
		$this->register_scripts();
	}

	/**
	 * Register scripts.
	 *
	 * @param array $scripts
	 *
	 * @return void
	 */
	public function register_scripts() {
		$admin_script    = OAK_FOOD_MULTI_STEP_CHECKOUT_PLUGIN_ASSET . '/admin/script.js';
		$frontend_script = OAK_FOOD_MULTI_STEP_CHECKOUT_PLUGIN_ASSET . '/frontend/script.js';

		wp_register_script( 'oak_food_multi_step_checkout_admin_script', $admin_script, array(), filemtime( OAK_FOOD_MULTI_STEP_CHECKOUT_DIR . '/assets/admin/script.js' ), true );
		wp_register_script( 'oak_food_multi_step_checkout_script', $frontend_script, array( 'jquery', 'jquery-ui-datepicker' ), filemtime( OAK_FOOD_MULTI_STEP_CHECKOUT_DIR . '/assets/frontend/script.js' ), true );
	}

	/**
	 * Register styles.
	 *
	 * @return void
	 */
	public function register_styles() {
		$admin_style    = OAK_FOOD_MULTI_STEP_CHECKOUT_PLUGIN_ASSET . '/admin/style.css';
		$frontend_style = OAK_FOOD_MULTI_STEP_CHECKOUT_PLUGIN_ASSET . '/frontend/style.css';

		wp_register_style( 'oak_food_multi_step_checkout_admin_style', $admin_style, array(), filemtime( OAK_FOOD_MULTI_STEP_CHECKOUT_DIR . '/assets/admin/style.css' ) );
		wp_register_style( 'oak_food_multi_step_checkout_style', $frontend_style, array(), filemtime( OAK_FOOD_MULTI_STEP_CHECKOUT_DIR . '/assets/frontend/style.css' ) );
		wp_register_style( 'jquery-ui-datepicker-theme', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array( 'oak_food_multi_step_checkout_style' ) );
	}

	/**
	 * Enqueue admin scripts.
	 *
	 * @return void
	 */
	public function enqueue_admin_scripts() {
		wp_enqueue_script( 'oak_food_multi_step_checkout_admin_script' );
		wp_localize_script(
			'oak_food_multi_step_checkout_admin_script',
			'Oak_Food_Multi_Step_Checkout_Admin',
			array()
		);
	}

	/**
	 * Enqueue front-end scripts.
	 *
	 * @return void
	 */
	public function enqueue_front_scripts() {
		wp_enqueue_style( 'oak_food_multi_step_checkout_style' );
		wp_enqueue_style( 'jquery-ui-datepicker-theme' );
		wp_enqueue_script( 'oak_food_multi_step_checkout_script' );
		wp_localize_script(
			'oak_food_multi_step_checkout_script',
			'Oak_Food_Multi_Step_Checkout',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'oak-ajax-nonce' ),
			)
		);
	}
}
