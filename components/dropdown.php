<?php

    require_once ___MCW__PLUGIN_DIR_PATH . 'components/input-field.php';
    require_once ___MCW__PLUGIN_DIR_PATH . 'components/dropdown-item.php';

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
        <div class="---mcw--mcs__inputGroup_dropdown">
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

                            if( $settings['show_term_hierarchy'] === 'yes' && !$term->parent ){
                                
                                echo '<p class="---mcw--mcs__dropdownGroupTitle">'.$term->name.'</p>';
                                
                                foreach ($items as $item) {
                                    if( has_term( $term, $taxonomy, $item ) ) {
                                        ___mcw__render_dropdown_input_group( $widget, $item, $parameter);
                                    }
                                }

                                echo '<div class="---mcw--mcs__dropdownChildrenGroup">';
                                
                                foreach ($termsArray as $childTerm) { 
                                    
                                    if( $childTerm->parent === $term->term_id){
                                
                                        echo '<p class="---mcw--mcs__dropdownGroupTitle">'.$childTerm->name.'</p>';
                                        
                                        foreach ($items as $item) {
                                            
                                            if( has_term( $childTerm, $taxonomy, $item ) ) {
                                                ___mcw__render_dropdown_input_group( $widget, $item, $parameter);
                                            }

                                        }

                                    }

                                }
                                
                                echo '</div>';
                            }

                            if( $settings['show_term_hierarchy'] !== 'yes'){
                                
                                echo '<h2>'.$term->name.'</h2>';
                                
                                foreach ($items as $item) {
                                    if( has_term( $term, $taxonomy, $item ) ) {
                                        ___mcw__render_dropdown_input_group( $widget, $item, $parameter);
                                    }
                                }
                            }
                        }

                    } else {

                        foreach ($items as $item) {
                            ___mcw__render_dropdown_input_group( $widget, $item, $parameter);
                        }

                    } ?>

                </div>
            </div>
        </div>
    <?php
    }
?>
