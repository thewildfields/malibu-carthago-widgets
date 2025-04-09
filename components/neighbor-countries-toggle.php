<?php

function ___mcw__neighbor_countries_toggle($widget, $settings){

    $fieldId = '---mcw--mcs--neighbor-countries-toggle-' . $widget->get_id();

?>

    <div class="---mcw--mcs__inputGroup ---mcw--mcs__inputGroup_countries">
        <label
            for="<?php echo $fieldId; ?>"
        >
            <input
                type="checkbox"
                id="<?php echo $fieldId; ?>"
                widget-control="neighbor-countries-toggle"
        >
            <?php echo $settings['countries_toggle_text']; ?>
        </label>
    </div>

<?php }