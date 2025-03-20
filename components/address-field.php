<?php

    require_once ___MCW__PLUGIN_DIR_PATH . 'components/radius-dropdown.php';

    function ___mcw__render__address_field($widget, $settings){

        $addressInputGroupClasses = ['---mcw--mcs__inputGroup ---mcw--mcs__inputGroup_horizontal'];

        if( $settings['display_radius_field'] !== 'yes'){
            array_push($addressInputGroupClasses, '---mcw--mcs__inputGroup_noGap');
        }

?>

    <div class="<?php echo implode(' ', $addressInputGroupClasses); ?>">

        <?php if( $settings['display_address_field'] ) { ?>

            <input
                class="---mcw--mcs__input placesAutocompleteInput"
                widget-control="location"
                id="autocomplete"
                placeholder="<?php echo $settings['address_field_placeholder']; ?>"
            >

            <?php if( $settings['display_radius_field'] !== 'yes') { ?>

                <a
                    class="---mcw--mcs__input ---mcw--mcs__searchButton"
                    href="<?php echo get_permalink( $settings['target_page'] ); ?>"
                    <?php if( $settings['open_in_new_tab'] === 'yes' ){ echo 'target="_blank"'; } ?>
                >
                    Search
                </a>

            <?php } ?>

        <?php } ?>

        <?php if(
            $settings['display_address_field'] === 'yes' &&
            $settings['display_radius_field'] === 'yes' ) {
                ___mcw__radius_dropdown($widget, $settings);
            } ?>
        
    </div>

    <div class="---mcw--mcs__inputGroup ---mcw--mcs__inputGroup_horizontal">

        <?php if( $settings['display_countries_toggle'] ) { ?>
            display countries toggle
        <?php } ?>
        
    </div>

        
<?php } ?>