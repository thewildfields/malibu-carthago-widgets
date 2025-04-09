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
                'type' => \Elementor\Controls_Manager::VISUAL_CHOICE,
                'label_block' => true,
                'options' => [
                    'top_no_radius' => [
                        'title' => esc_attr__( 'Location at the top, no radius.', 'textdomain' ),
                        'image' => plugins_url( 'assets/img/masonry.svg', __FILE__ ),
                    ],
                    'bottom_no_radius' => [
                        'title' => esc_attr__( 'Location at the bottom, no radius.', 'textdomain' ),
                        'image' => plugins_url( 'assets/img/grid-3.svg', __FILE__ ),
                    ],
                    'top_with_radius' => [
                        'title' => esc_attr__( 'Location at the top with radius.', 'textdomain' ),
                        'image' => plugins_url( 'assets/img/masonry.svg', __FILE__ ),
                    ],
                    'bottom_with_radius' => [
                        'title' => esc_attr__( 'Location at the bottom with radius.', 'textdomain' ),
                        'image' => plugins_url( 'assets/img/grid-3.svg', __FILE__ ),
                    ],
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
            'items_display',
            [
                'label' => __('Display Mode', 'malibu-carthago-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'dropdown' => 'Dropdown',
                    'checkboxes' => 'Checkboxes',
                ],
                'default' => 'dropdown',
                'condition' => [
                    'widget_content!' => '',
                ]
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
                    'items_display' => 'dropdown'
                ]
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
