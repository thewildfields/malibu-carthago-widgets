<?php 

function map_term_ids($term){
    return $term->term_id;
}

function ___mcw__render_dropdown_item( $widget, $item, $parameter) {

$itemUniqueString = $parameter.'-'.$item->ID;

?>
    
    <button
        widget-control="dropdown-option"
        class="---mcw--mcs__option ---mcw--mcs__option_dropdown"
        item-key="<?php echo $widget->get_id().'-'.$parameter; ?>"
        item-value="<?php echo $itemUniqueString; ?>"
        categories="<?php echo implode('+', array_map('map_term_ids', get_the_terms( $item, 'fahrzeugart')) ); ?>"
    >
        <input type="checkbox" name="" id="">
        <?php echo $item->post_title; ?>
    </button>

<?php }
