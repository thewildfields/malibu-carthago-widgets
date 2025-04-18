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

    if( $widgetContent === 'vehicles' ){
        
        ___mcw__taxonomy_filter($widget, $settings);

        $taxonomy; $terms; $postType;

        switch ($widgetContent) {
            case 'vehicles':
                $postType = 'fahrzeuge';
                $taxonomy = 'fahrzeugart';
                $terms = 'fahrzeugart_items';
                break;
            case 'dealers':
                $postType = 'haendler';
                $taxonomy = 'haendlertyp';
                $terms = 'haendlertyp_items';
                break;
        }

        $itemsQueryArgs = array(
            'post_type' => $postType,
            'posts_per_page' => -1,
        );

        if( $settings['widget_content'] === 'vehicles' && $settings['items_selection_type'] === 'manual' ){
            $itemsQueryArgs['tax_query'] = array(
                [
                    'taxonomy'  => $taxonomy,
                    'field'     => 'id',
                    'terms'     => $settings[$terms]
                ]
            );
        }

        $itemsQuery = new WP_Query($itemsQueryArgs);
    
        $items = $itemsQuery->posts;


        if( !is_array($items) || sizeof($items) === 0 ){
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

    if( $settings['widget_content'] === 'dealer' ){
        ___mcw__render_input_field($widget, $settings, 'dealerName');
    }

}