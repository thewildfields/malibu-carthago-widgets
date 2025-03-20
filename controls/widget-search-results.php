<?php 

function ___mcw__widget_search_results($widget) {

    $pagesQuery = new WP_Query('post_type=page');

    function ___mcw__filter_pages_list($posts) {
        return array_reduce($posts, function($carry, $post) {
            $carry[$post->ID] = $post->post_title;
            return $carry;
        }, []);
    }

    $pages = ___mcw__filter_pages_list($pagesQuery->posts);

    $widget->start_controls_section(
        'widget_search_results_section',
        [
            'label' => __ ('Search Results Settings', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT
        ]
    );

    $widget->add_control(
        'results_target',
        [
            'label' => esc_html__( 'Results Target Location', 'malibu-carthago-widgets' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'different_page' => esc_html__( 'Different page', 'malibu-carthago-widgets' ),
                'current_page' => esc_html__( 'Current page', 'malibu-carthago-widgets' ),
            ],
            'default' => 'different_page'
        ]
    );

    $widget->add_control(
        'target_page',
        [
            'label' => __('Target Page', 'malibu-carthago-widgets'),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => $pages,
            'condition' => [
                'results_target' => 'different_page'
            ]
        ]
    );

    $widget->add_control(
        'open_in_new_tab',
        [
            'label' => esc_html__( 'Open Page in the new tab', 'malibu-carthago-widgets' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
            'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
            'return_value' => 'yes',
            'default' => 'no',
            'condition' => [
                'results_target' => 'different_page'
            ]
        ]
    );

    $widget->add_control(
        'dynamically_select_current',
        [
            'label' => esc_html__( 'Dynamically select current', 'malibu-carthago-widgets' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
            'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );

    $widget->add_control(
        'preselect_values_from_url',
        [
            'label' => esc_html__( 'Preselect valus from URL', 'malibu-carthago-widgets' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
            'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ]
    );


    $widget->end_controls_section();

}

?>