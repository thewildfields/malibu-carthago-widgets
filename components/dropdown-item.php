<?php 

function ___mcw__render_dropdown_item( $widget, $item, $parameter) {

$itemUniqueString = $parameter.'-'.$item->ID;

?>
    
    <button
        widget-control="dropdown-option"
        class="---mcw--mcs__option ---mcw--mcs__option_dropdown"
        item-key="<?php echo $widget->get_id().'-'.$parameter; ?>"
        item-value="<?php echo $itemUniqueString; ?>"
    >
        <input type="checkbox" name="" id="">
        <?php echo $item->post_title; ?>
    </button>

<?php }
