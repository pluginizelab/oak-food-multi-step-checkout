<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use PluginizeLab\OakFoodMultiStepCheckout\Helpers;
?>
<div class="oak-delivery-fields-wrapper <?php echo Helpers::is_pm_visible() ? 'oak-d-none' : ''; ?>">
	<div class="oak-delivery-fields">
		<h3 class="common-subtitle">Delivery</h3>
		<div class="common-box">
			<div class="form-row form-row-wide">
				<input type="radio" name="delivery_type" id="delivery_type" checked>
				<label for="delivery_type delivery-txt"><?php echo esc_html__( 'Delivery (home or to aother address)', 'oak-food-multi-step-checkout' ); ?></label>
			</div>
			<div class="address-fields-group adres-details-group">
				<div class="form-row">
					<label for="billing_postcode"><?php echo esc_html__( 'Postal Code', 'oak-food-multi-step-checkout' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text postcode oak-required-field" name="billing_postcode" id="billing_postcode" value="<?php echo esc_attr( Helpers::get_wc_session_value_by_key( 'postcode' ) ); ?>">
					</span>
					<span class="error-message"></span>
				</div>
				<div class="form-row">
					<label for="billing_house_no"><?php echo esc_html__( 'House No.', 'oak-food-multi-step-checkout' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text oak-required-field house_no" name="billing_house_no" id="billing_house_no" value="<?php echo esc_attr( Helpers::get_wc_session_value_by_key( 'billing_house_no' ) ); ?>">
					</span>
					<span class="error-message"></span>
				</div>
				<div class="form-row">
					<label for="billing_address_1"><?php echo esc_html__( 'Add', 'oak-food-multi-step-checkout' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text oak-required-field billing_address" name="billing_address_1" id="billing_address_1" value="<?php echo esc_attr( Helpers::get_wc_session_value_by_key( 'billing_address' ) ); ?>">
					</span>
					<span class="error-message"></span>
				</div>
			</div>
			<div class="example-address">
				<div class="form-row form-row-wide">
					<label><?php echo esc_html__( 'Delivery Address', 'oak-food-multi-step-checkout' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<p><?php echo esc_html__( 'Example Address 125, city name, 465NZ Steenbergen', 'oak-food-multi-step-checkout' ); ?></p>
					</span>
					<span class="error-message"></span>
				</div>
			</div>
			<div class="delivery-time-fields delivery-time-area">
				<div class="form-row form-row-first">
					<label for="delivery_date"><?php echo esc_html__( 'Delivery Date', 'oak-food-multi-step-checkout' ); ?></label>
					<span class="woocommerce-input-wrapper">
						<input type="text" class="input-text oak-required-field" name="delivery_date" id="delivery_date" value="<?php echo esc_attr( Helpers::get_wc_session_value_by_key( 'delivery_date' ) ); ?>">
					</span>
					<span class="error-message"></span>
				</div>
				<div class="form-row form-row-last">
					<label for="delivery_time"><?php echo esc_html__( 'Delivery Time', 'oak-food-multi-step-checkout' ); ?></label>
					<span class="woocommerce-input-wrapper common-inputt">
						<select name="delivery_time" id="delivery_time" class="common-inputt">
							<option value="Between 08:00 and 22:00">Between 08:00 and 22:00</option>
							<option value="Between 09:00 and 12:00">Between 09:00 and 12:00</option>
						</select>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div class="multi-step-buttons">
		<a class="button prev-btn" href="<?php echo esc_url( wc_get_cart_url() ); ?>">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
			<?php echo esc_html__( 'Back To Shopping Cart', 'oak-food-multi-step-checkout' ); ?></a>
		<button id="delivery-step-next-btn" class="button next-btn"><?php echo esc_html__( 'Next', 'oak-food-multi-step-checkout' ); ?>
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
				<path d="M14 5L21 12M21 12L14 19M21 12L3 12" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</button>
	</div>
</div>