<?php 

function ___mcw__address_block_controls($widget) {

    $widget->start_controls_section(
        'address_block_section',
        [
            'label' => __ ('Location Settings', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

        $widget->add_control(
            'display_address_field',
            [
                'label' => esc_html__( 'Address Field', 'malibu-carthago-widgets' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'malibu-carthago-widgets' ),
                'label_off' => esc_html__( 'Hide', 'malibu-carthago-widgets' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $widget->add_control(
			'address_field_position',
			[
				'label' => esc_html__( 'Adress Field Position', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'top',
				'options' => [
					'top' => esc_html__( 'Top of Widget', 'malibu-carthago-widgets' ),
					'bottom' => esc_html__( 'Bottom of Widget', 'malibu-carthago-widgets' ),
				],
			]
		);

        $widget->add_control(
			'address_field_placeholder',
			[
				'label' => esc_html__( 'Placeholder for address field', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Enter a location', 'malibu-carthago-widgets' ),
				'placeholder' => esc_html__( 'Start typing...', 'malibu-carthago-widgets' ),
                'label_block' => true,
                'condition' => [
                    'display_address_field' => 'yes'
                ]
			]
		);

        $widget->add_control(
			'default_radius',
			[
				'label' => esc_html__( 'Default Radius, km', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 25,
                'max' => 1000,
                'step' => 5,
				'default' => 50,
                'condition' => [
                    'structure!' => ['top_with_radius', 'bottom_with_radius']
                ],
                'frontend_available' => true,
			]
		);

        $widget->add_control(
            'radius_dropdown',
            [
                'label' => esc_html__( 'Radius Options', 'malibu-carthago-widgets' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'radius',
                        'label' => esc_html__( 'Radius, km', 'malibu-carthago-widgets' ),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'min' => 25,
                        'max' => 1000,
                        'step' => 5,
                        'default' => 50,
                    ],
                    [
                        'name' => 'set_as_default',
                        'label' => esc_html__( 'Set as default', 'malibu-carthago-widgets' ),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
                        'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
                        'return_value' => 'yes',
                    ],
                ],
                'default' => [
                    [
                        'radius' => '50',
                        'set_as_default' => 'yes'
                    ],
                    [
                        'radius' => '100',
                        'set_as_default' => 'no'
                    ],
                    [
                        'radius' => '250',
                        'set_as_default' => 'no'
                    ],
                    [
                        'radius' => '500',
                        'set_as_default' => 'no'
                    ],
                ],
				'title_field' => '{{{ radius }}} km',
                'condition' => [
                    'structure' => ['top_with_radius', 'bottom_with_radius']
                ],
                'frontend_available' => true,
            ]
        );

        $widget->add_control(
            'display_countries_toggle',
            [
                'label' => esc_html__( 'Enable a toggle for neighboring countries', 'malibu-carthago-widgets' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'malibu-carthago-widgets' ),
                'label_off' => esc_html__( 'Hide', 'malibu-carthago-widgets' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $widget->add_control(
			'countries_toggle_text',
			[
				'label' => esc_html__( 'Label for countries toggle', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Include neighboring countries', 'malibu-carthago-widgets' ),
				'placeholder' => esc_html__( 'Start typing...', 'malibu-carthago-widgets' ),
                'label_block' => true,
                'condition' => [
                    'display_countries_toggle' => 'yes'
                ]
			]
		);

        $widget->add_control(
            'select_countries_toggle_by_default',
            [
                'label' => esc_html__( 'Select Neighboring countries by default', 'malibu-carthago-widgets' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
                'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'display_countries_toggle' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );

    $widget->end_controls_section();

}
?>
