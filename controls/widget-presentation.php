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
            'allow_multiple_selection',
			[
				'label' => esc_html__( 'Allow Multiple Selection', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
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

    $widget->end_controls_section();

}
