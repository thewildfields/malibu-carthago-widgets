<?php

require_once ___MCW__PLUGIN_DIR_PATH . 'components/error.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'components/checkbox.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'components/dropdown.php';

function ___mcw__render_items_list($widget, $settings){


    $widgetContent = $settings['widget_content'];

    if( $widgetContent === '' ){
        ___mcw__display_error_message('Select appropriate content type');
        return;
    }

    if( $widgetContent === 'vehicles' ){
        
        ___mcw__taxonomy_filter($widget, $settings);

        $taxonomy; $terms; $postType; $vehicleTerms; $vehicleTermIDs;

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
            'lang' => apply_filters( 'wpml_current_language', null )
        );

        if( get_post_type() === 'fahrzeuge' ){

            $vehicleTerms = get_the_terms(get_the_ID(), 'fahrzeugart');
            
            if (!is_wp_error($vehicleTerms) && !empty($vehicleTerms)) {
                $vehicleTermIDs = wp_list_pluck($vehicleTerms, 'term_id');
            }

        }

        if( $settings['widget_content'] === 'vehicles' ){
            if( $settings['items_selection_type'] === 'manual_terms') {
                $itemsQueryArgs['tax_query'] = array(
                    [
                        'taxonomy'  => $taxonomy,
                        'field'     => 'id',
                        'terms'     => array_merge( $settings[$terms], $vehicleTermIDs )
                    ]
                );
            }
            if( $settings['items_selection_type'] === 'dynamic' ){


                if( get_field('vehicle_type', get_the_ID()) === 'van' ){
                    
                    $itemsQueryArgs['tax_query'] = array(
                        [
                            'taxonomy'  => $taxonomy,
                            'field'     => 'id',
                            'terms'     => $settings['fahrzeugart_manual_vans_items']
                        ]
                    );
                }

                if( get_field('vehicle_type', get_the_ID()) === 'motorhome' ){

                    $itemsQueryArgs['tax_query'] = array(
                        [
                            'taxonomy'  => $taxonomy,
                            'field'     => 'id',
                            'terms'     => $settings['fahrzeugart_manual_motorhome_items']
                        ]
                    );
                }

            }
        }

        $itemsQuery = new WP_Query($itemsQueryArgs);
    
        $items = $itemsQuery->posts;


        if( !is_array($items) || sizeof($items) === 0 ){
            ___mcw__display_error_message('No items in selected Post type');
            return;
        }
        
        ___mcw__render__dropdown_input_group($widget, $settings, $items);

    }

    if( $settings['widget_content'] === 'dealers' && $settings['dealer_name_input_field'] === 'yes'){
        ___mcw__render_input_field($widget, $settings, 'dealerName');
    }

}