<?php

function ___mcw__map_content_controls($widget){

    $widget->start_controls_section(
        'map_controls_section',
        [
            'label' => __ ('Map Content', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

		$widget->add_control(
			'preload_dealers',
			[
				'label' => esc_html__( 'Preload Dealers', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'textdomain' ),
				'label_off' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$widget->add_control(
			'language_based_zooms',
			[
				'label' => esc_html__( 'Base original location on language', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'textdomain' ),
				'label_off' => esc_html__( 'No', 'textdomain' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

    $widget->end_controls_section();

}
