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
                    'vehicles' => __('Vehicles', 'malibu-carthago-widgets'),
                    'dealers' => __('Dealers', 'malibu-carthago-widgets'),
                ],
                'default' => __('vehicles', 'malibu-carthago-widgets'),
                'frontend_available' => true,
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
                    'widget_content' => 'vehicles',
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
                    'widget_content' => 'vehicles',
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
                    'widget_content' => 'dealers',
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
                    'widget_content' => 'vehicles',
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
            'required_search_parameters_vehicle',
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
                    'widget_content' => 'vehicles',
                    'required_parameters' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );
 
        $widget->add_control(
            'required_search_parameters_dealer',
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
                    'widget_content' => 'dealers',
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