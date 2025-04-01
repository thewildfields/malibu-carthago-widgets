<?php

function ___mcw__map_marker_controls($widget){

	$dealerTaxonomiesResponse = get_taxonomies(['object_type' => ['haendler']], 'objects');
	$dealerTaxonomies = array_reduce($dealerTaxonomiesResponse, function ($result, $item){
		$result[$item->name] = $item->label;
		return $result;
	}, array());

    $widget->start_controls_section(
        'map_markers_section',
        [
            'label' => __ ('Map Markers', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

	$widget->add_control(
		'marker_style',
		[
			'label' => esc_html__( 'Marker Style', 'textdomain' ),
			'type' => \Elementor\Controls_Manager::SELECT,
			'default' => 'tax_icon',
			'options' => [
				'default' => esc_html__( 'Default', 'textdomain' ),
				'tax_icon'  => esc_html__( 'Taxonomy Icons', 'textdomain' ),
			],
		]
	);

	$widget->add_control(
		'marker_taxonomy_icon',
		[
			'label' => esc_html__( 'Taxonomy', 'textdomain' ),
			'description' => esc_html__( 'Marker Icon will be replaced with the correspondent taxonomy term icon', 'textdomain'),
			'type' => \Elementor\Controls_Manager::SELECT,
			'options' => $dealerTaxonomies,
			'default' => 'haendlertyp-map',
			'condition' => [
				'marker_style' => 'tax_icon'
			]
		]
	);

    $widget->end_controls_section();

}
