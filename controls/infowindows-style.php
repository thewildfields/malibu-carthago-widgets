<?php

function ___mcw__infowindows_style_controls($widget){

    $widget->start_controls_section(
        'infowindows_style_section',
        [
            'label' => __ ('Dealer Popups', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $widget->add_control(
        'title_styles',
        [
            'label' => esc_html__( 'Title Styles', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::HEADING,
        ]
    );

    $widget->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'infowindow_title_style',
            'selector' => '{{WRAPPER}} .---mcw--dm__infowindowTitle',
        ]
    );
    
    $widget->add_control(
        'infowindow_title_color',
        [
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .---mcw--dm__infowindowTitle' => 'color: {{VALUE}}',
            ],
        ]
    );

    $widget->add_control(
        'text_styles',
        [
            'label' => esc_html__( 'Text Styles', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before'
        ]
    );

    $widget->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'infowindow_text_style',
            'selector' => '{{WRAPPER}} .---mcw--dm__infowindowText',
        ]
    );
    
    $widget->add_control(
        'infowindow_text_color',
        [
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .---mcw--dm__infowindowText' => 'color: {{VALUE}}'
            ]
        ]
    );

    $widget->add_control(
        'link_styles',
        [
            'label' => esc_html__( 'Link Styles', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before'
        ]
    );

    $widget->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'infowindow_link_style',
            'selector' => '{{WRAPPER}} .---mcw--dm__infowindowLink',
        ]
    );
    
    $widget->add_control(
        'infowindow_link_color',
        [
            'label' => esc_html__( 'Color', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .---mcw--dm__infowindowLink' => 'color: {{VALUE}}'
            ]
        ]
    );

    $widget->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'infowindow_link_border',
            'selector' => '{{WRAPPER}} .---mcw--dm__infowindowLink',
        ]
    );

    $widget->add_control(
        'categories_styles',
        [
            'label' => esc_html__( 'Category Pills Styles', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::HEADING,
            'separator' => 'before'
        ]
    );

    $widget->add_group_control(
        \Elementor\Group_Control_Typography::get_type(),
        [
            'name' => 'infowindow_category_pill_style',
            'selector' => '{{WRAPPER}} .---mcw--dm__infowindowText',
        ]
    );
    
    $widget->add_control(
        'infowindow_category_pill_text_color',
        [
            'label' => esc_html__( 'Text Color', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .---mcw--dm__infowindowCategoryItem' => 'color: {{VALUE}}'
            ]
        ]
    );
    
    $widget->add_control(
        'infowindow_category_pill_bg_color',
        [
            'label' => esc_html__( 'Background Color', 'textdomain' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .---mcw--dm__infowindowCategoryItem' => 'background-color: {{VALUE}}'
            ]
        ]
    );

    $widget->end_controls_section();

}
