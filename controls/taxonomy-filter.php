<?php

require_once ( ___MCW__PLUGIN_DIR_PATH . 'inc/functions/get-formatted-items.php' );
require_once ___MCW__PLUGIN_DIR_PATH . 'inc/functions/filter-out-vans-terms.php';


$fahrzeugartTerms = ___mcw__get_formatted_items('term', 'fahrzeugart') ;
$vansCategories = array_keys( array_filter( $fahrzeugartTerms, '___mcw__filter_out_vans_terms') );

function ___mcw__taxonomy_filter_controls($widget){

    global $vansCategories;

    $widget->start_controls_section(
        'taxonomy_filter',
        [
            'label' => __ ('Taxonomy Filter', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

        $widget->add_control(
            'taxonomy_filter_heading',
            [
                'label' => esc_html__( 'Taxonomy Filter', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $widget->add_control(
            'enable_taxonomy_filter',
            [
                'label' => esc_html__( 'Enable taxonomy filter', 'malibu-carthago-widgets' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
                'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $widget->add_control(
            'taxonomy_filter_type',
            [
                'label' => esc_html__( 'Taxonomy Filter Type', 'malibu-carthago-widgets' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    'radio' => esc_html__( 'Radio Buttons', 'malibu-carthago-widgets' ),
                    'checkbox' => esc_html__( 'Checkboxes', 'malibu-carthago-widgets' )
                ],
                'default' => 'radio',
                'condition' => [
                    'enable_taxonomy_filter' => 'yes'
                ]
            ]
        );
        
        $widget->add_control(
            'taxonomy_filter_vehicles',
            [
                'label' => esc_html__( 'Vehicle types', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => ___mcw__get_formatted_items('term', 'fahrzeugart', true),
                'condition' => [
                    'widget_content' => 'vehicles',
                    'enable_taxonomy_filter' => 'yes',
                ]
            ]
        );
        
        $widget->add_control(
            'taxonomy_filter_additional_vans_categories',
            [
                'label' => esc_html__( 'Additional categories included with vans', 'textdomain' ),
                'description' => esc_html__('If vans are selected, these categories will show up with them', 'textdomain'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => ___mcw__get_formatted_items('term', 'fahrzeugart'),
                'condition' => [
                    'widget_content' => 'vehicles',
                    'enable_taxonomy_filter' => 'yes',
                ]
            ]
        );
        
        $widget->add_control(
            'taxonomy_filter_dealers',
            [
                'label' => esc_html__( 'Dealer categories', 'textdomain' ),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => true,
                'options' => ___mcw__get_formatted_items('term', 'haendlertyp'),
                'condition' => [
                    'widget_content' => 'dealers',
                    'enable_taxonomy_filter' => 'yes'
                ]
            ]
        );

    $widget->end_controls_section();

}
