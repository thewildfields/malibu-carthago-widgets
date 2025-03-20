<?php

require_once ( ___MCW__PLUGIN_DIR_PATH . 'renders/items-list.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'components/address-field.php' );

function ___mcw__widget_render($widget){

    $settings = $widget->get_settings_for_display();

?>

    <div
        class="---mcw--mcs"
        <?php
            if( $settings['results_target'] === 'different_page' ) {
                echo 'target-url="'.get_permalink($settings['target_page']).'"';
            }
            if( $settings['allow_multiple_selection'] === 'yes' ) {
                echo 'allow-multiple="yes"';
            }
            if( $settings['display_radius_field'] !== 'yes' ) {
                echo 'radius="'.$settings['default_radius'].'"';
            }
            if( $settings['preselect_values_from_url'] === 'yes' ) {
                echo 'preselect-values="yes"';
            }
        ?>
    >

        <?php

            if( $settings['address_field_position'] === 'top' ){
                ___mcw__render__address_field($widget, $settings);
            }

            ___mcw__render_items_list($widget, $settings);
            
            if( $settings['address_field_position'] === 'bottom' ){
                ___mcw__render__address_field($widget, $settings);
            }

            if( $settings['display_radius_field'] === 'yes' ){ ?>

                <a
                    class="---mcw--mcs__input ---mcw--mcs__searchButton"
                    href="<?php echo get_permalink( $settings['target_page'] ); ?>"
                    <?php if( $settings['open_in_new_tab'] === 'yes' ){ echo 'target="_blank"'; } ?>
                >
                    Search
                </a>

            <?php }

        ?>

    </div>

<?php 
}