<?php

require_once ( ___MCW__PLUGIN_DIR_PATH . 'components/items-list.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'components/address-field.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'components/search-button.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'components/taxonomy-filter.php' );

function ___mcw__search_widget_render($widget){

    $settings = $widget->get_settings_for_display();

    if( get_post_type() === 'fahrzeuge' && !get_field('display_search_widget') ){
        return;
    }



?>
    <div
        class="---mcw--mcs"
        widget-control="search-widget"
        widgetType="<?php echo $settings['widget_content']; ?>"
        <?php if( get_post_type() === 'fahrzeuge' && $settings['preselect_current_value'] === 'yes') { ?>
            model="<?php echo get_the_ID(); ?>"
        <?php } ?>
    >

        <?php
        
            if( $settings['widget_content'] === 'dealers' ){

                ___mcw__taxonomy_filter($widget, $settings);

            }

            switch ($settings['structure']) {
                case 'top_no_radius':
                    ___mcw__render__address_field($widget, $settings, false, false);
                    ___mcw__render_items_list($widget, $settings);
                    ___mcw__mcs__search_button($settings);
                break;
                case 'bottom_no_radius':
                    ___mcw__render_items_list($widget, $settings);
                    ___mcw__render__address_field($widget, $settings, false, !$settings['display_countries_toggle']);
                    $settings['display_countries_toggle'] && ___mcw__mcs__search_button($settings);
                break;
                case 'top_with_radius':
                    ___mcw__render__address_field($widget, $settings, true, false);
                    ___mcw__render_items_list($widget, $settings);
                    ___mcw__mcs__search_button($settings);
                break;
                case 'bottom_with_radius':
                    ___mcw__render_items_list($widget, $settings);
                    ___mcw__render__address_field($widget, $settings, true, false);
                    ___mcw__mcs__search_button($settings);
                break;
            }

        ?>

        <div class="---mcw--mcs__error" widget-control="error-message"></div>

    </div>

<?php 
}