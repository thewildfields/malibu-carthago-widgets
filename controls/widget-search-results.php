<?php 

function ___mcw__widget_search_results($widget) {

    $pagesQuery = new WP_Query(array(
        'post_type' => 'page',
        'posts_per_page' => -1
    ));

    function ___mcw__filter_pages_list($posts) {
        return array_reduce($posts, function($carry, $post) {
            $carry[get_the_permalink($post->ID)] = $post->post_title;
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
            'default' => 'different_page',
            'frontend_available' => true
        ]
    );

    $widget->add_control(
        'target_page',
        [
            'label' => __('Target Page', 'malibu-carthago-widgets'),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'options' => $pages,
            'multiple' => false,
            'condition' => [
                'results_target' => 'different_page'
            ],
            'frontend_available' => true
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
            ],
            'frontend_available' => true
        ]
    );

    $widget->add_control(
        'preselect_current_value',
        [
            'label' => esc_html__( 'Preselect current vehicle', 'malibu-carthago-widgets' ),
            'description' => esc_html__('Only works on single vehicle page or Fahrzeugart term pages', 'malibu-carthago-widgets'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
            'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'frontend_available' => true,
        ]
    );

    $widget->add_control(
        'preselect_values_from_url',
        [
            'label' => esc_html__( 'Preselect values from URL', 'malibu-carthago-widgets' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'malibu-carthago-widgets' ),
            'label_off' => esc_html__( 'No', 'malibu-carthago-widgets' ),
            'return_value' => 'yes',
            'default' => 'yes',
            'frontend_available' => true,
        ]
    );


    $widget->end_controls_section();

}

?>