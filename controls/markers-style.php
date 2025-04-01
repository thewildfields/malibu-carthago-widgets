<?php

function ___mcw__markers_style_controls($widget){

    $widget->start_controls_section(
        'markers_style_section',
        [
            'label' => __ ('Markers', 'malibu-carthago-widgets'),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE
        ]
    );

    $widget->end_controls_section();

}
