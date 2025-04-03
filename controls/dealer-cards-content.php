<?php 

function ___mcw__dealer_card_content($widget) {

    $handlertypTerms = get_terms('haendlertyp');

    $handlertypTermsDisplayed = array_reduce( $handlertypTerms, function ($result, $item){
        $result[$item->term_id] = $item->name;
        return $result;
    },array());

    $widget->start_controls_section(
        'dealer_card_content_section',
        [
            'label' => __ ('Card Content', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

        $widget->add_control(
            'click_opens_infowindow',
            [
                'label' => esc_html__( 'Open map infowindow on click', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'textdomain' ),
                'label_off' => esc_html__( 'No', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $widget->add_control(
            'dealer_models_title_text',
            [
                'label' => esc_html__( 'Models Title Text', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Available models', 'textdomain' ),
                'placeholder' => esc_html__( 'Type your text here', 'textdomain' ),
            ]
        );

        $widget->add_control(
            'filter_dealer_categories',
            [
                'label' => esc_html__( 'Filter dealer categories', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'textdomain' ),
                'label_off' => esc_html__( 'No', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $widget->add_control(
			'dealers_categories_to_display',
			[
				'label' => esc_html__( 'Categories to display', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $handlertypTermsDisplayed,
				'default' => [ 'title', 'description' ],
                'condition' => [
                    'filter_dealer_categories' => 'yes'
                ]
			]
		);
    


    $widget->end_controls_section();

}