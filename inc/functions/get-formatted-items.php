<?php 

function ___mcw__get_formatted_items($itemType, $groupName, $topLevelOnly = false, $return = 'list' ){

    $items; $formattedItems;


    if( $itemType === 'term' ){

        $itemsWithChidlren = [];

        $args = array(
            'taxonomy' => $groupName
        );

        $items = get_terms($args);

        if( $topLevelOnly ){
            foreach ($items as $term) {
                $children = get_terms([
                    'taxonomy'   => $groupName,
                    'parent'     => $term->term_id,
                    'hide_empty' => false,
                    'number'     => 1, // We only need to know if at least one child exists
                ]);
            
                if (!empty($children)) {
                    $itemsWithChidlren[] = $term;
                }
            }
            
        }

        if( $return === 'list' ){
    
            $formattedItems = array_reduce($topLevelOnly ? $itemsWithChidlren : $items, function ($result, $item){
                $language = apply_filters( 'wpml_get_language_information', null, array( 'element_id' => $item->term_id, 'element_type' => $item->taxonomy ) );
                if( $language ){
                    $result[$item->term_id] = $item->name.' ('.$language.')';
                }
                $result[$item->term_id] = $item->name.' (id: '.$item->term_id.')';
                return $result;
            });
        }

    }
    
    return $formattedItems;

}