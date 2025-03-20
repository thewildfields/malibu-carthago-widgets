<?php

function ___mcw__fields_style_control($widget) {

    $widget->start_controls_section(
        'fields_style_section',
        [
            'label' => __ ('Input Fields Styling', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

        $widget->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'input_fields_border_styles',
                'selector' => '{{WRAPPER}} .---mcw--mcs__input',
                'field_options' => [
                    'border' => [
                        'width' => [
                            'default' => [
                                'top' => '2',
                                'right' => '2',
                                'bottom' => '2',
                                'left' => '2',
                                'unit' => 'px',
                            ],
                        ],
                        'color' => '#000000',
                    ]
                ]
            ]
        );

    $widget->end_controls_section();

}