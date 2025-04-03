<?php 

function ___mcw__dealer_cards_text_style($widget) {

    $widget->start_controls_section(
        'dealer_card_text_style_section',
        [
            'label' => __ ('Text Style', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

		$widget->add_control(
			'dealer_card_distance_styles_title',
			[
				'label' => esc_html__( 'Distance', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$widget->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'dealer_card_distance_styles_typography',
				'selector' => '{{WRAPPER}} .---mcw--dc__distance',
			]
		);

		$widget->add_control(
			'dealer_card_distance_styles_color',
			[
				'label' => esc_html__( 'Color', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#131313',
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc__distance' => 'color: {{VALUE}}',
				],
			]
		);
		
		$widget->add_control(
			'dealer_card_distance_styles_margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 10,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc__distance' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$widget->add_control(
			'dealer_card_title_styles_title',
			[
				'label' => esc_html__( 'Dealer Name', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$widget->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'dealer_card_title_styles_typography',
				'selector' => '{{WRAPPER}} .---mcw--dc__title',
			]
		);
    
        $widget->add_control(
            'dealer_card_title_styles_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#131313',
                'selectors' => [
                    '{{WRAPPER}} .---mcw--dc__title' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		$widget->add_control(
			'dealer_card_title_styles_margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 10,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc__title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$widget->add_control(
			'dealer_card_city_styles_title',
			[
				'label' => esc_html__( 'City', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$widget->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'dealer_card_city_styles_typography',
				'selector' => '{{WRAPPER}} .---mcw--dc__city',
			]
		);
    
        $widget->add_control(
            'dealer_card_city_styles_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#131313',
                'selectors' => [
                    '{{WRAPPER}} .---mcw--dc__city' => 'color: {{VALUE}}',
                ],
            ]
        );
		
		$widget->add_control(
			'dealer_card_city_styles_margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 15,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc__city' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$widget->add_control(
			'dealer_card_categories_styles_title',
			[
				'label' => esc_html__( 'Categories', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$widget->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'dealer_card_categories_styles_typography',
				'selector' => '{{WRAPPER}} .---mcw--dc__categoriesItem',
			]
		);
    
        $widget->add_control(
            'dealer_card_categories_styles_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FFFFFF',
                'selectors' => [
                    '{{WRAPPER}} .---mcw--dc__categoriesItem' => 'color: {{VALUE}}',
                ],
            ]
        );
    
        $widget->add_control(
            'dealer_card_categories_styles_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#939899',
                'selectors' => [
                    '{{WRAPPER}} .---mcw--dc__categoriesItem' => 'background-color: {{VALUE}}',
                ],
            ]
        );
		
		$widget->add_control(
			'dealer_card_categories_styles_margin',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 15,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc__categories' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$widget->add_control(
			'dealer_card_categories_styles_padding',
			[
				'label' => esc_html__( 'Padding', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 3,
					'right' => 5,
					'bottom' => 3,
					'left' => 5,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc__categoriesItem' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$widget->add_control(
			'dealer_card_categories_styles_gap',
			[
				'label' => esc_html__( 'Gap', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc__categories' => 'gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$widget->add_control(
			'dealer_card_models_title_styles_title',
			[
				'label' => esc_html__( 'Models Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$widget->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'dealer_card_models_title_styles_typography',
				'selector' => '{{WRAPPER}} .---mcw--dc__modelsTitle',
			]
		);
    
        $widget->add_control(
            'dealer_card_models_title_styles_color',
            [
                'label' => esc_html__( 'Color', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#131313',
                'selectors' => [
                    '{{WRAPPER}} .---mcw--dc__modelsTitle' => 'color: {{VALUE}}',
                ],
            ]
        );

		$widget->add_control(
			'dealer_card_models_title_styles_padding',
			[
				'label' => esc_html__( 'Margin', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'default' => [
					'top' => 0,
					'right' => 0,
					'bottom' => 10,
					'left' => 0,
					'unit' => 'px',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .---mcw--dc__momdelsTitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$widget->add_control(
			'dealer_card_models_styles_title',
			[
				'label' => esc_html__( 'Models', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$widget->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'dealer_card_models_styles_typography',
				'selector' => '{{WRAPPER}} .---mcw--dc__models',
			]
		);
    
        $widget->add_control(
            'dealer_card_models_styles_color',
            [
                'label' => esc_html__( 'Models', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#131313',
                'selectors' => [
                    '{{WRAPPER}} .---mcw--dc__models' => 'color: {{VALUE}}',
                ],
            ]
        );

    $widget->end_controls_section();

}