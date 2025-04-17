<?php

    require_once ___MCW__PLUGIN_DIR_PATH . 'components/input-field.php';
    require_once ___MCW__PLUGIN_DIR_PATH . 'components/dropdown-group.php';

    function ___mcw__render__dropdown_input_group($widget, $settings, $items){

        $taxonomy; $terms; $termsArray;
        switch ($settings['widget_content']) {
            case 'fahrzeuge':
                $taxonomy = 'fahrzeugart';
                $terms = 'fahrzeugart_items';
                $parameter = 'model';
                break;
            case 'haendler':
                $taxonomy = 'haendlertyp';
                $terms = 'haendlertyp_items';
                $parameter = 'dealer';
                break;
        }

    ?>
        <div
            class="---mcw--mcs__inputGroup_dropdown"
            widget-control="dropdown-container"
        >
            <div
                class="---mcw--mcs__optionValueContainer"
            >
                <div class="---mcw--mcs__inputGroup">
                    <input
                        type="text"
                        class="---mcw--mcs__input"
                        widget-control="dropdown-input"
                        widget-control-key="<?php echo $widget->get_id().'-'.$parameter; ?>"
                        placeholder="<?php echo $settings['dropdown_input_field_placeholder']; ?>"
                    >
                </div>
                <div class="---mcw--mcs__optionValueList" widget-control="selected-value-list"></div>
                <div
                    class="---mcw--mcs__dropdownOptions"
                    widget-control="values-dropdown"
                >
                    <?php
                    
                    if( $settings['group_items_by_terms'] === 'yes' ){

                        if( $settings['items_selection_type'] === 'manual_terms'){
                            $termsArray = get_terms($taxonomy, ['include' => $settings[$terms]]);
                        } else {
                            $termsArray = get_terms($taxonomy);
                        }

                        foreach ($termsArray as $term) {

                            if( !$term->parent ){

                                ___mcw__render_dropdown_input_group($items, $taxonomy, $termsArray, $term, $widget, $parameter);

                            }

                        }

                    } else {

                        foreach ($items as $item) {
                            ___mcw__render_dropdown_item( $widget, $item, $parameter);
                        }

                    } ?>

                </div>
            </div>
        </div>
    <?php
    }
?>
