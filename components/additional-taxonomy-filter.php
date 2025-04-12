<?php 

require_once ___MCW__PLUGIN_DIR_PATH . 'components/input-group.php';

function ___mcw__additional_taxonomy_filter($widget, $settings){

    if( $settings['enable_additional_taxonomy_filter'] !== 'yes' ){
        return;
    }

    $terms;
    $inputType = $settings['additional_taxonomy_filter_type'];

    switch ($settings['widget_content']) {
        case 'fahrzeuge':

            $preterms = get_terms([
                'taxonomy' => 'fahrzeugart',
                'parent' => 0,
            ]);
            
            $terms = array_filter($preterms, function($term) {
                return get_terms([
                    'taxonomy' => 'fahrzeugart',
                    'parent' => $term->term_id,
                    'number' => 1,
                ]);
            });
        break;
        case 'haendler':
            $terms = get_terms('haendlertyp');
        break;
    }


    foreach ($terms as $term) {
        ___mcw__render_input_group($widget, $settings, $term, $inputType);
    }

}
