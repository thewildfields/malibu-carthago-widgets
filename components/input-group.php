<?php

function ___mcw__render_input_group($widget, $settings, $item, $inputType){

    $itemType;
    $itemCategory;
    $itemID;

    if( get_term($item) ){
        $itemType = 'term';
        $itemCategory = $item->taxonomy;
        $itemID = $item->term_id;
    } else if( get_post($item) ){
        $itemType = 'post';
        $itemCategory = get_post_type($item);
        $itemID = get_the_ID($item);
    }

    $inputName = $widget->get_id().'-'.$itemCategory;

?>

    <label
        class="---mcw--mcs__inputGroup ---mcw--mcs__inputGroup_horizontal"
        widget-control="additional-input"
    >
        <input
            type="<?php echo $inputType; ?>"
            name="<?php echo $inputName; ?>"
            value="<?php echo $itemID; ?>"
        >
        <?php echo $itemType === 'term' ? $item->name : $item->post_title; ?>
    </label>

<?php } ?>
