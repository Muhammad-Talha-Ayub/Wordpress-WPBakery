<?php
// Register VC element
vc_map(array(
	'name' => 'MB CTA SECTION',
	'base' => 'mb_cta_section',
	'description' => 'MB CTA SECTION.',
	'category' => 'MB Elements',
	'params' => array(
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Heading',
			'description' => 'Heading',
			'param_name' => 'mb_cta_section_heading',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Subheading',
			'description' => 'Subheading',
			'param_name' => 'mb_cta_section_subheading',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Contact Form 7 ID',
			'description' => 'Enter Contact Form 7 ID',
			'param_name' => 'mb_cta_section_cf_id',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Privacy Text',
			'description' => 'Privacy Text',
			'param_name' => 'mb_cta_section_privacy',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'mb_cta_section_background_color',
		),		
	)
));

// Register VC shortcode
add_shortcode('mb_cta_section', 'mb_cta_section');
function mb_cta_section($atts, $content) {
	// Extract shortcode attributes with defaults
	$atts = shortcode_atts(array(	
		'mb_cta_section_heading' => '',
		'mb_cta_section_subheading' => '',
		'mb_cta_section_cf_id' => '',
		'mb_cta_section_privacy' => '',
		'mb_cta_section_background_color' => '',
	), $atts);
	
	$html = '';

	// Generate unique ID for the section
	$unique_id = 'cta-section-' . uniqid();

	// Check if the background color is set and add the style
	if (!empty($atts['mb_cta_section_background_color'])) {
		$html .= '
		<style>
		#' . esc_attr($unique_id) . ' {
			background-color: ' . esc_attr($atts['mb_cta_section_background_color']) . ' !important;
		}
		</style>
		';
	}

	// Start building the HTML output
	$html .= '
	<section class="pb-5" id="' . esc_attr($unique_id) . '">
		<div class="container px-5 my-5">
			<aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
				<div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
					<div class="mb-4 mb-xl-0">
						<div class="fs-3 fw-bold text-white">' . esc_html($atts['mb_cta_section_heading']) .'</div>
						<div class="text-white-50">'. esc_html($atts['mb_cta_section_subheading']) .'</div>
					</div>
					<div class="ms-xl-4">
					'.do_shortcode('[contact-form-7 id="' . esc_attr($atts['mb_cta_section_cf_id']) . '"]').'
						<div class="small text-white-50">'. esc_html($atts['mb_cta_section_privacy']) .'</div>
					</div>
				</div>
			</aside>
		</div>
	</section>
	';

	return $html;
}
?>
