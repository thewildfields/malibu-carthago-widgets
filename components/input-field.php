<?php 

function ___mcw__render__input_field($widget, $control, $type=null){
    
?>

    <div class="---mcw--mcs__inputGroup">

        <input
            type="text"
            class="---mcw--mcs__input"
            widget-control="text-filter-input"
            <?php echo $type; ?>
            widget-control-key="<?php echo $widget->get_id().'-'.$control; ?>"
        >

    </div>

<?php 
}