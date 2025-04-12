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
            $terms = get_terms('fahrzeugart', array('parent' => 0));
        break;
        case 'haendler':
            $terms = get_terms('haendlertyp');
        break;
    }


    foreach ($terms as $term) {
        ___mcw__render_input_group($widget, $settings, $term, $inputType);
    }

}
