<?php

function ___mcw__radius_dropdown($widget, $settings){

?>
    <div class="---mcw--mcs__radius">
        <div class="---mcw--mcs__radiusValue ---mcw--mcs__input">
            <?php 
                $radiusOptions = $settings['radius_dropdown'];
                for ($i=0; $i < sizeOf($radiusOptions); $i++) { 
                    if( $radiusOptions[$i]['set_as_default'] === 'yes'){
                        echo $radiusOptions[$i]['radius'].' km';
                    }
                }
            ?>
        </div>
        <div class="---mcw--mcs__radius__options">
            <?php foreach ($settings['radius_dropdown'] as $option) { ?>
                <button
                    class="---mcw--mcs__radius__option"
                    radius-value="<?php echo $option['radius']; ?>"
                >
                    <?php echo $option['radius'].' km'; ?>
                </button>
            <?php } ?>
        </div>
    </div>
<?php }