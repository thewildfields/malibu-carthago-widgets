<?php

require_once ___MCW__PLUGIN_DIR_PATH . 'components/dropdown-item.php';

function ___mcw__render_dropdown_input_group($items, $taxonomy, $terms, $term, $widget, $parameter){

?>

    <div
        class="---mcw--mcs__dropdownOptionsGroup"
        widget-control="dropdown-option-group"
    >
        
        <p class="---mcw--mcs__dropdownGroupTitle"><?php echo $term->name; ?></p>
        
        <?php
        
            foreach ($items as $item) {
                if( has_term( $term, $taxonomy, $item ) ) {
                    ___mcw__render_dropdown_item( $widget, $item, $parameter);
                }
            }

            if (!empty(get_term_children( $term->term_id, $taxonomy )) ){ ?>
                <div class="---mcw--mcs__dropdownChildrenGroup">
                    <?php 

                        foreach ($terms as $childTerm) {

                            if($childTerm->parent === $term->term_id){
                                ___mcw__render_dropdown_input_group($items, $taxonomy, $terms, $childTerm, $widget, $parameter);
                            }
                        }
                    
                    ?>
                </div>
            <?php }

        ?>

    </div>

<?php } ?>
