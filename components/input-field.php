<?php 

function ___mcw__render_input_field($widget, $settings,  $control, $type=null){
    
?>

    <div class="---mcw--mcs__inputGroup">

        <input
            type="text"
            class="---mcw--mcs__input"
            widget-control="text-filter-input"
            <?php echo $type; ?>
            widget-control-key="<?php echo $widget->get_id().'-'.$control; ?>"
            <?php if($control === 'dealerName'){ ?>
                placeholder="<?php echo $settings['dealer_name_input_field_placeholder']; ?>"
            <?php } ?>
        >

    </div>

<?php 
}