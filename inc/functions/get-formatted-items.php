<?php 

function ___mcw__get_formatted_items($itemType, $groupName, $return = 'list'){

    $items; $formattedItems;


    if( $itemType === 'term' ){

        $items = get_terms($groupName);

        if( $return === 'list' ){
    
            $formattedItems = array_reduce($items, function ($result, $item){
                $result[$item->term_id] = $item->name.' (id: '.$item->term_id.')';
                return $result;
            });
        }

    }
    
    return $formattedItems;

}