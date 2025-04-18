<?php

function ___mcw__render_input_group($widget, $settings, $item, $inputType, $extraValues = []){

    $itemType;
    $itemCategory;
    $itemID;

    if( get_term($item) ){
        $itemType = 'term';
        $itemCategory = $item->taxonomy;
        $itemID = implode('+', array_merge( [$item->term_id], $extraValues ) );
    } else if( get_post($item) ){
        $itemType = 'post';
        $itemCategory = get_post_type($item);
        $itemID = get_the_id($item);
    }

    $inputName = $widget->get_id().'-'.$itemCategory;

?>

    <label
        class="---mcw--mcs__inputGroup ---mcw--mcs__inputGroup_horizontal"
        widget-control="taxonomy-filter-input"
    >
        <input
            type="<?php echo $inputType; ?>"
            name="<?php echo $inputName; ?>"
            value="<?php echo $itemID; ?>"
        >
        <?php echo $itemType === 'term' ? $item->name : $item->post_title; ?>
    </label>

<?php } ?>
