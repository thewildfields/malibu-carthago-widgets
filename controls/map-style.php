<?php

function ___mcw__map_style_controls($widget){

    $widget->start_controls_section(
        'map_style_section',
        [
            'label' => __ ('Map', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

        $widget->add_control(
            'keep_map_square',
            [
                'label' => esc_html__( 'Keep map square', 'textdomain' ),
                'help' => esc_html__('Map will always take 100% of width and will have the same height'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'textdomain' ),
                'label_off' => esc_html__( 'No', 'textdomain' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $widget->add_control(
			'min-height',
			[
				'label' => esc_html__( 'Height', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 350,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dm_square' => 'min-height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'keep_map_square' => 'yes',
                ],
			]
		);

        $widget->add_control(
			'height',
			[
				'label' => esc_html__( 'Height', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 2000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 450,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dm' => 'height: {{SIZE}}{{UNIT}};',
				],
                'condition' => [
                    'keep_map_square!' => 'yes',
                ],
			]
		);

    $widget->end_controls_section();

}
