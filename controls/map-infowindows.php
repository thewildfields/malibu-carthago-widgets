<?php

function ___mcw__map_infowindow_controls($widget){

    $widget->start_controls_section(
        'map_infowindows_section',
        [
            'label' => __ ('Map Infowindows', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

		$widget->add_control(
			'show_infowindows',
			[
				'label' => esc_html__( 'Show Infowindows', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'textdomain' ),
				'label_off' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$widget->add_control(
			'infowindow_text_email',
			[
				'label' => esc_html__( 'Email prefix text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Email:', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your text here', 'textdomain' ),
				'condition' => [
					'show_infowindows' => 'yes'
				]
			]
		);
	
		$widget->add_control(
			'infowindow_text_phone',
			[
				'label' => esc_html__( 'Phone prefix text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Phone: ', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your text here', 'textdomain' ),
				'condition' => [
					'show_infowindows' => 'yes'
				]
			]
		);
	
		$widget->add_control(
			'infowindow_text_website',
			[
				'label' => esc_html__( 'Website prefix text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Website: ', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your text here', 'textdomain' ),
				'condition' => [
					'show_infowindows' => 'yes'
				]
			]
		);
	
		$widget->add_control(
			'infowindow_text_go_to_website',
			[
				'label' => esc_html__( '"Go to the Website" text', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Go to the website', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your text here', 'textdomain' ),
				'condition' => [
					'show_infowindows' => 'yes'
				]
			]
		);

    $widget->end_controls_section();

}
