<?php 

function ___mcw__search_widget_content_controls($widget) {

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
                    'haendler' => __('Dealers', 'malibu-carthago-widgets'),
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
                    'widget_content' => 'fahrzeuge',
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
                'condition' => [
                    'widget_content' => 'fahrzeuge',
                ]
			]
        );

        $widget->add_control(
            'enable_additional_taxonomy_filter',
			[
				'label' => esc_html__( 'Add primary taxonomy switcher', 'malibu-carthago-widgets' ),
                'description' => esc_html__( 'Top level Vehicle type for Vehicles, Dealer Service for dealers'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_block' => true,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );

        $widget->add_control(
            'additional_taxonomy_filter_type',
			[
				'label' => esc_html__( 'Add primary taxonomy switcher', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'radio' => esc_html__( 'Radio Buttons', 'malibu-carthago-widgets' ),
                    'checkbox' => esc_html__( 'Checkboxes', 'malibu-carthago-widgets' )
                ],
				'default' => 'radio',
                'condition' => [
                    'enable_additional_taxonomy_filter' => 'yes'
                ]
			]
        );

        $widget->add_control(
            'required_parameters',
			[
				'label' => esc_html__( 'Add required parameters', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'description' => esc_html__( 'The search will not work without this parameters included'),
			]
        );
 
        $widget->add_control(
            'required_search_parameters',
            [
                'label' => __('Required Search Parameters', 'malibu-carthago-widgets'),
                'description' => __('Select which parameters should be present for the search to work', 'malibu-carthago-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => [
                    'model' => __('Vehicle model', 'malibu-carthago-widgets'),
                    'place' => __('Location', 'malibu-carthago-widgets'),
                ],
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'widget_content' => 'fahrzeuge',
                    'required_parameters' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );
 
        $widget->add_control(
            'required_search_parameters',
            [
                'label' => __('Required Search Parameters', 'malibu-carthago-widgets'),
                'description' => __('Select which parameters should be present for the search to work', 'malibu-carthago-widgets'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'options' => [
                    'dealer_name' => __('Vehicle model', 'malibu-carthago-widgets'),
                    'place' => __('Location', 'malibu-carthago-widgets'),
                ],
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'widget_content' => 'haendler',
                    'required_parameters' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );

        $widget->add_control(
            'show_error_messages',
			[
				'label' => esc_html__( 'Show error message', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'required_parameters' => 'yes'
                ],
                'frontend_available' => true,
			]
        );

        $widget->add_control(
			'missing_models_message',
			[
				'label' => esc_html__( 'Error message for missing Models', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
                'condition' => [
                    'required_parameters' => 'yes',
                    'show_error_messages' => 'yes',
                    'required_search_parameters' => 'model'
                ],
                'frontend_available' => true,
			]
		);

        $widget->add_control(
			'missing_location_message',
			[
				'label' => esc_html__( 'Error message for missing location', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
                'label_block' => true,
                'condition' => [
                    'required_parameters' => 'yes',
                    'show_error_messages' => 'yes',
                    'required_search_parameters' => 'place'
                ],
                'frontend_available' => true,
			]
		);

        $widget->add_control(
            'error_field_highlight',
			[
				'label' => esc_html__( 'Highlight empty input fields', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
				'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
				'return_value' => 'yes',
				'default' => 'yes',
                'condition' => [
                    'required_parameters' => 'yes'
                ],
                'frontend_available' => true,
			]
        );

        $widget->add_control(
            'error_timeout',
			[
				'label' => esc_html__( 'Error timeout delay (ms)', 'malibu-carthago-widgets' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 10000,
				'default' => 2500,
                'condition' => [
                    'required_parameters' => 'yes'
                ],
                'frontend_available' => true,
			]
        );

    $widget->end_controls_section();

}