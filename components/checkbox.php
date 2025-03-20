<?php

require_once ___MCW__PLUGIN_DIR_PATH . 'components/input-field.php';

    function ___mcw__render__checkbox_input_group($widget, $settings, $items){

            ?>

            <div class="---mcw--mcs__valueContainer">
                <?php ___mcw__render__input_field($widget, $items); ?>
                <div class="---mcw--mcs__valueList" widget-control="selected-value-list"></div>
            </div>

    <?php         

        foreach ($items as $item) {

            $itemUniqueString = $item->post_type.'-'.$item->ID;

        ?>
            <div
                class="---mcw--mcs__inputGroup ---mcw--mcs__option"
                item-key="<?php echo $widget->get_id().'-'.$item->post_type; ?>"
                item-value="<?php echo $itemUniqueString; ?>"
                for="<?php echo $itemUniqueString; ?>"
            >
                <input
                    type="checkbox"
                    class="---mcw--mcs__input ---mcw--mcs__input_checkbox"
                    name="<?php echo $widget->get_id().'-'.$item->post_type; ?>"
                    id="<?php echo $itemUniqueString ?>"
                >
                <?php echo $item->post_title; ?>
            </div>
            
    <?php
        }

    }
?>
