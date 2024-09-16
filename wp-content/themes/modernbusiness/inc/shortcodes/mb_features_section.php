<?php
// mb vc element
vc_map(array(
    'name' => 'MB Features Section',
    'base' => 'mb_features_section',
    'description' => 'MB Features Section.',
    'category' => 'MB Elements',
    'params' => array(
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => 'Heading',
            'description' => 'Heading',
            'param_name' => 'mb_features_section_heading',
        ),
        array(
            'type' => 'colorpicker',
            'admin_label' => true,
            'heading' => 'Background Color',
            'description' => 'Background Color',
            'param_name' => 'mb_features_section_background_color',
        ),
        array(
            'type' => 'param_group',
            'param_name' => 'features',
            'heading' => 'Features',
            'description' => 'Features',
            'params' => array(
                array(
                    'type' => 'textfield', // Changed from 'attach_image' to 'textfield'
                    'admin_label' => true,
                    'heading' => 'Icon Class',
                    'description' => 'Enter the icon class (e.g., bi-alarm). Reference: https://icons.getbootstrap.com/',
                    'param_name' => 'mb_features_section_icon',
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => 'Title',
                    'description' => 'Title',
                    'param_name' => 'mb_features_section_title',
                ),
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => 'Description',
                    'description' => 'Description',
                    'param_name' => 'mb_features_section_description',
                ),
            )
        ),
    )
));

// mb vc shortcode
add_shortcode('mb_features_section', 'mb_features_section');
function mb_features_section($atts, $content) {
    // Extract shortcode attributes with defaults
    $atts = shortcode_atts(array(    
        'mb_features_section_heading' => '',
        'mb_features_section_background_color' => '',
        'features' => '',
    ), $atts);
    
    $html = '';
    $rand = mt_rand(); // Unique random number to ensure unique IDs

    // Parse the 'features' parameter
    $features = vc_param_group_parse_atts($atts['features']);

    // Ensure 'features' is a valid array
    if (!is_array($features)) {
        $features = array();  // Initialize as an empty array if not set properly
    }

    // Check if the background color is set
    if (!empty($atts['mb_features_section_background_color'])) {
        $html .= '
        <style>
        #mb-features-section-' . esc_attr($rand) . ' {
            background-color: '.esc_attr($atts['mb_features_section_background_color']).' !important;
        }
        </style>
        ';
    }

    $html .= '
   <section class="py-5" id="mb-features-section-' . esc_attr($rand) . '">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">'. esc_html($atts['mb_features_section_heading']) .'</h2>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
    ';
    $counter =0;
    // Loop through each feature and build the HTML output
    foreach($features as $data) {  
        $counter++;  
        $icon_class = isset($data['mb_features_section_icon']) ? esc_attr($data['mb_features_section_icon']) : '';
        $title = isset($data['mb_features_section_title']) ? esc_html($data['mb_features_section_title']) : '';
        $description = isset($data['mb_features_section_description']) ? esc_html($data['mb_features_section_description']) : '';

        $html .= '
            <div class="col'.($counter == count($features) ? '' : ($counter == count($features)-1? 'md-md-0 mb-5' : 'mb-5')).'  h-100">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="'. $icon_class .'"></i></div>
                <h2 class="h5">'. $title .'</h2>
                <p class="mb-0">'. $description .'</p>
            </div>
        ';
    }

    $html .= '
                    </div>
                </div>
            </div>
        </div>
    </section>
    ';
    
    return $html;
}
?>
