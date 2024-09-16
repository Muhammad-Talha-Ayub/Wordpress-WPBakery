<?php
// Map the Visual Composer element
vc_map(array(
    'name' => 'MB FAQ Section',
    'base' => 'mb_faq_section',
    'description' => 'MB FAQ Section.',
    'category' => 'MB Elements',
    'params' => array(
        array(
            'type' => 'textfield',
            'admin_label' => true,
            'heading' => 'Heading',
            'description' => 'Heading',
            'param_name' => 'mb_faq_section_heading',
        ),
        array(
            'type' => 'colorpicker',
            'admin_label' => true,
            'heading' => 'Background Color',
            'description' => 'Background Color',
            'param_name' => 'mb_faq_section_color',
        ),
        array(
            'type' => 'param_group',
            'param_name' => 'faqs',
            'heading' => 'FAQs',
            'description' => 'FAQs',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'admin_label' => true,
                    'heading' => 'Question',
                    'description' => 'Question',
                    'param_name' => 'mb_faq_section_question',
                ),
                array(
                    'type' => 'textarea',
                    'admin_label' => true,
                    'heading' => 'Answer',
                    'description' => 'Answer',
                    'param_name' => 'mb_faq_section_answer',
                ),
            )
        ),
    )
));

// Register the shortcode
add_shortcode('mb_faq_section', 'mb_faq_section');
function mb_faq_section($atts, $content) {
    // Extract shortcode attributes with defaults
    $atts = shortcode_atts(array(
        'mb_faq_section_heading' => '',
        'mb_faq_section_color' => '',
        'faqs' => '',
    ), $atts);

    $html = '';
    $rand = mt_rand();

    // Parse the 'faqs' parameter
    $faqs = vc_param_group_parse_atts($atts['faqs']);

    // Ensure 'faqs' is a valid array
    if (!is_array($faqs)) {
        $faqs = array();  // Initialize as an empty array if not set properly
    }

    // Check if the background color is set
    if (!empty($atts['mb_faq_section_color'])) {
        $html .= '
        <style>
        #mb_faq_section' . esc_attr($rand) . ' {
            background-color: ' . esc_attr($atts['mb_faq_section_color']) . ' !important;
        }
        </style>
        ';
    }

    $html .= '
    <section id="mb_faq_section' . esc_attr($rand) . '">
                    <h2 class="fw-bolder mb-3">' . esc_html($atts['mb_faq_section_heading']) . '</h2>
                    <div class="accordion mb-5" id="accordionExample' . esc_attr($rand) . '">
    ';

    // Loop through each member and build the HTML output
    $count = 0;
    foreach ($faqs as $data) {
        $count++;
        // Ensure the data keys exist before using them
        $question = isset($data['mb_faq_section_question']) ? esc_html($data['mb_faq_section_question']) : '';
        $answer = isset($data['mb_faq_section_answer']) ? esc_html($data['mb_faq_section_answer']) : '';

        $html .= '
        <div class="accordion-item">
            <h3 class="accordion-header" id="heading' . esc_attr($rand) . '-' . esc_attr($count) . '">
                <button class="accordion-button' . ($count > 1 ? ' collapsed' : '') . '" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . esc_attr($rand) . '-' . esc_attr($count) . '" aria-expanded="' . ($count > 1 ? 'false' : 'true') . '" aria-controls="collapse' . esc_attr($rand) . '-' . esc_attr($count) . '">
                    ' . $question . '
                </button>
            </h3>
            <div class="accordion-collapse collapse ' . ($count > 1 ? '' : 'show') . '" id="collapse' . esc_attr($rand) . '-' . esc_attr($count) . '" aria-labelledby="heading' . esc_attr($rand) . '-' . esc_attr($count) . '" data-bs-parent="#accordionExample' . esc_attr($rand) . '">
                <div class="accordion-body">
                    ' . $answer . '
                </div>
            </div>
        </div>
        ';
    }

    $html .= '
        </div>
    </section>
    ';

    return $html;
}
?>
