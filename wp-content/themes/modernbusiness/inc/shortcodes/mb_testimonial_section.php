<?php
// mb vc element
vc_map(array(
	'name' => 'MB Testimonial Section',
	'base' => 'mb_testimonial_section',
	'description' => 'MB Testimonial Section',
	'category' => 'MB Elements',
	'params' => array(
		array(
			'type' => 'attach_image',
			'admin_label' => true,
			'heading' => 'Image',
			'description' => 'Image',
			'param_name' => 'mb_testimonial_section_image',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Testimonial',
			'description' => 'Testimonial',
			'param_name' => 'mb_testimonial_section_testimonial',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Name',
			'description' => 'Name',
			'param_name' => 'mb_testimonial_section_name',
		),
		array(
			'type' => 'textfield',
			'admin_label' => true,
			'heading' => 'Company',
			'description' => 'Company',
			'param_name' => 'mb_testimonial_section_company',
		),
		array(
			'type' => 'colorpicker',
			'admin_label' => true,
			'heading' => 'Background Color',
			'description' => 'Background Color',
			'param_name' => 'mb_testimonial_section_background_color',
		),		
	)
));

// mb vc shortcode
add_shortcode('mb_testimonial_section', 'mb_testimonial_section');
function mb_testimonial_section($atts, $content) {
	// Extract shortcode attributes with defaults
	$atts = shortcode_atts(array(	
		'mb_testimonial_section_image' => '',
		'mb_testimonial_section_testimonial' => '',
		'mb_testimonial_section_name' => '',
		'mb_testimonial_section_company' => '',
		'mb_testimonial_section_background_color' => '',
	), $atts);

	$html = '';
	
	// Generate unique ID for the section
	$unique_id = 'testimonial-section-' . uniqid();

	// Check if the background color is set and add the style
	if (!empty($atts['mb_testimonial_section_background_color'])) {
		$html .= '
		<style>
		#' . esc_attr($unique_id) . ' {
			background-color: '.esc_attr($atts['mb_testimonial_section_background_color']).' !important;
		}
		</style>
		';
	}

	// Start building the HTML output
	$html .= '
	<div class="py-5 bg-light" id="'. esc_attr($unique_id) .'">
		<div class="container px-5 my-5">
			<div class="row gx-5 justify-content-center">
				<div class="col-lg-10 col-xl-7">
					<div class="text-center">
						<div class="fs-4 mb-4 fst-italic">'. esc_html($atts['mb_testimonial_section_testimonial']) .'</div>
						<div class="d-flex align-items-center justify-content-center">';
	
	// Check if the image is available and add it
	if (!empty($atts['mb_testimonial_section_image'])) {
		$html .= '<img class="rounded-circle me-3" src="'. esc_url(wp_get_attachment_url($atts['mb_testimonial_section_image'])) .'" alt="..." />';
	}

	// Add name and company details
	$html .= '
							<div class="fw-bold">
								'. esc_html($atts['mb_testimonial_section_name']) .'
								<span class="fw-bold text-primary mx-1">/</span>
								'. esc_html($atts['mb_testimonial_section_company']) .'
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	';
	
	return $html;
}
?>
