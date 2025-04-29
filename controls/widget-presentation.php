<?php

function ___mcw__widget_presentation_controls($widget){

    $widget->start_controls_section(
        'widget_presentation_section',
        [
            'label' => __ ('Presentation Settings', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

        $widget->add_control(
            'structure',
            [
                'label' => esc_html__( 'Widget Structure', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'top_no_radius' => esc_attr__( 'Location at the top, no radius.', 'textdomain' ),
                    'bottom_no_radius' => esc_attr__( 'Location at the bottom, no radius.', 'textdomain' ),
                    'top_with_radius' => esc_attr__( 'Location at the top with radius.', 'textdomain' ),
                    'bottom_with_radius' => esc_attr__( 'Location at the bottom with radius.', 'textdomain' ),
                ],
                'default' => 'bottom_no_radius',
                'columns' => 2,
                'frontend_available' => true
            ]
        );

        $widget->add_control(
            'allow_multiple_selection',
			[
				'label' => esc_html__( 'Allow Multiple Selection', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'frontend_available' => true,
			]
        );

        $widget->add_control(
			'dropdown_input_field_placeholder',
			[
				'label' => esc_html__( 'Dropdown Placeholder Text', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Start typing...', 'malibu-carthago-widgets' ),
				'placeholder' => esc_html__( 'Start typing...', 'malibu-carthago-widgets' ),
                'condition' => [
                    'widget_content!' => '',
                ]
            ]
		);

        $widget->add_control(
            'dealer_name_input_field',
			[
				'label' => esc_html__( 'Display Dealer Name Input', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'widget_content' => 'dealers',
                ]
			]
        );

        $widget->add_control(
			'dealer_name_input_field_placeholder',
			[
				'label' => esc_html__( 'Dealer Name Placeholder', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Start typing...', 'malibu-carthago-widgets' ),
				'placeholder' => esc_html__( 'Start typing...', 'malibu-carthago-widgets' ),
                'condition' => [
                    'widget_content' => 'dealers',
                ],
            ]
		);

        $widget->add_control(
			'search_button_text',
			[
				'label' => esc_html__( 'Search Button Text', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Search', 'malibu-carthago-widgets' ),
				'placeholder' => esc_html__( 'Search', 'malibu-carthago-widgets' ),
            ]
		);

    $widget->end_controls_section();

}
