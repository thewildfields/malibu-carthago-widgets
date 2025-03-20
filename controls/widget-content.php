<?php 

function ___mcw__widget_content_controls($widget) {

    $fahrzeugartTerms = array_reduce( get_terms('fahrzeugart'), function ($result, $item) {
        $result[$item->term_id] = ucfirst($item->name);
        return $result;
    }, array());

    $widget->start_controls_section(
        'widget_content_section',
        [
            'label' => __ ('Content Settings', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

        $widget->add_control(
            'widget_content',
            [
                'label' => __('Searchable Content', 'malibu-carthago-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' => __('Select Content Type', 'malibu-carthago-widgets'),
                    'fahrzeuge' => __('Vehicles', 'malibu-carthago-widgets'),
                ],
                'default' => __('fahrzeuge', 'malibu-carthago-widgets'),
            ]
        );

        $widget->add_control(
            'items_selection_type',
            [
                'label' => __('Items to include', 'malibu-carthago-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'all' => 'All',
                    'dynamic' => 'Current Taxonomy Term',
                    'manual_terms' => 'Select Taxonomy Terms',
                ],
                'default' => 'all',
                'condition' => [
                    'widget_content!' => '',
                ]
            ]
        );

        $widget->add_control(
            'fahrzeugart_items',
            [
                'label' => __('Taxonomy', 'malibu-carthago-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => $fahrzeugartTerms,
                'multiple' => true,
                'condition' => [
                    'widget_content' => 'fahrzeuge',
                    'items_selection_type!' => ['all', 'dynamic'] 
                ]
            ]
        );

        $widget->add_control(
            'taxonomy_dealers',
            [
                'label' => __('Taxonomy', 'malibu-carthago-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'all' => 'dealers',
                    'dynamic' => 'Current Taxonomy Term',
                    'manual_terms' => 'Select Taxonomy Terms',
                    'manual_items' => 'Select Items',
                ],
                'default' => 'all',
                'condition' => [
                    'widget_content' => 'haendler',
                    'items_selection_type!' => ['all', 'dynamic'] 
                ]
            ]
        );

        $widget->add_control(
            'group_items_by_terms',
			[
				'label' => esc_html__( 'Group by Term', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );

        $widget->add_control(
            'show_term_hierarchy',
			[
				'label' => esc_html__( 'Show Term Hierarchy', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'description' => esc_html__( 'Only works for hierarchical taxonomies'),
                'condition' => [
                    'group_items_by_terms' => 'yes'
                ]
			]
        );

    $widget->end_controls_section();

}