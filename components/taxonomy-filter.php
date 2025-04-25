<?php 

require_once ___MCW__PLUGIN_DIR_PATH . 'components/input-group.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'inc/functions/get-formatted-items.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'inc/functions/filter-out-vans-terms.php';


function ___mcw__taxonomy_filter($widget, $settings){

    if( $settings['enable_taxonomy_filter'] !== 'yes' ){
        return;
    }

    $taxonomy;

    switch ($settings['widget_content']) {
        case 'vehicles':
            $taxonomy = 'fahrzeugart';
        break;
        case 'dealers':
            $taxonomy = 'haendlertyp';
        break;
    }

    $inputType = $settings['taxonomy_filter_type'];
    
    $items = $settings['taxonomy_filter_'.$settings['widget_content']];

    if( !is_array($items) || !sizeof($items) ){
        return;
    }

    $fahrzeugartTerms = ___mcw__get_formatted_items('term', 'fahrzeugart') ;
    $vansCategories = array_keys( array_filter( $fahrzeugartTerms, '___mcw__filter_out_vans_terms') ); ?>

    <div class="---mcw--mcs__taxonomyFilterWrapper">

        <?php
            foreach ($items as $id) {
                $extraCategories = in_array($id, $vansCategories) ? $settings['taxonomy_filter_additional_vans_categories'] : [];
                ___mcw__render_input_group($widget, $settings, get_term($id), $settings['taxonomy_filter_type'], $extraCategories);
            }
        ?>

    </div>

<?php }
