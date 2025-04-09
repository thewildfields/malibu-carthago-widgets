<?php

    require_once ___MCW__PLUGIN_DIR_PATH . 'components/radius-dropdown.php';
    require_once ___MCW__PLUGIN_DIR_PATH . 'components/search-button.php';
    require_once ___MCW__PLUGIN_DIR_PATH . 'components/neighbor-countries-toggle.php';

    function ___mcw__render__address_field($widget, $settings, $radius, $searchButton){

?>

    <div class="---mcw--mcs__inputGroup ---mcw--mcs__inputGroup_horizontal">

        <?php if( $settings['display_address_field'] ) { ?>

            <input
                class="---mcw--mcs__input placesAutocompleteInput"
                widget-control="location"
                id="autocomplete"
                placeholder="<?php echo $settings['address_field_placeholder']; ?>"
            >

            <?php if( !$radius && $searchButton) {
                ___mcw__mcs__search_button($settings);
            }
            
            if( $radius && !$searchButton ) {
                ___mcw__radius_dropdown($widget, $settings);
            }
        
        }
        
        if( $settings['display_countries_toggle'] ) {
            ___mcw__neighbor_countries_toggle($widget, $settings);
        }
            
        ?>
        
    </div>



        
<?php } ?>