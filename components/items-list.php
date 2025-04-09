<?php

require_once ___MCW__PLUGIN_DIR_PATH . 'components/error.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'components/checkbox.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'components/dropdown.php';

function ___mcw__render_items_list($widget, $settings){

    $widgetContent = $settings['widget_content'];
    $widgetDisplayType = $settings['items_display'];

    if( $widgetContent === '' ){
        ___mcw__display_error_message('Select appropriate content type');
        return;
    }

    $itemsQueryArgs = array(
        'post_type' => $widgetContent,
        'posts_per_page' => -1
    );

    if( $settings['items_selection_type'] === 'manual_terms' ){
        $taxonomy; $terms;
        switch ($widgetContent) {
            case 'fahrzeuge':
                $taxonomy = 'fahrzeugart';
                $terms = 'fahrzeugart_items';
                break;
            case 'haendler':
                $taxonomy = 'haendlertyp';
                $terms = 'haendlertyp_items';
                break;
        }

        $itemsQueryArgs['tax_query'] = [
            [
                'taxonomy'  => $taxonomy,
                'field'     => 'id',
                'terms'     => $settings[$terms]
            ]
        ];
    }

    $itemsQuery = new WP_Query($itemsQueryArgs);

    $items = $itemsQuery->posts;

    if( sizeof($items) === 0 ){
        ___mcw__display_error_message('No items in selected Post type');
        return;
    }

    if( $widgetDisplayType === 'checkboxes' ){
        ___mcw__render__checkbox_input_group($widget, $settings, $items);
    }

    if( $widgetDisplayType === 'dropdown' ){
        ___mcw__render__dropdown_input_group($widget, $settings, $items);
    }

}