<?php 

function ___mcw__dealer_card_style($widget) {

    $widget->start_controls_section(
        'dealer_card_style_section',
        [
            'label' => __ ('Card Style', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );
    
        $widget->add_control(
            'dealer_card_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#F5F5F6',
                'selectors' => [
                    '{{WRAPPER}} .---mcw--dc' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $widget->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'dealer_card_border',
				'selector' => '{{WRAPPER}} .---mcw--dc',
			]
		);
        
        $widget->add_control(
			'dealer_card_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 4,
					'right' => 4,
					'bottom' => 4,
					'left' => 4,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $widget->add_control(
			'dealer_card_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 20,
					'right' => 20,
					'bottom' => 20,
					'left' => 20,
					'unit' => 'px',
					'isLinked' => true,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $widget->add_control(
			'dealer_card_gap',
			[
				'label' => esc_html__( 'Cards Gap', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

    $widget->end_controls_section();

}