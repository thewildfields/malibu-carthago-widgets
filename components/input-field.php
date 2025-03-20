<?php 

function ___mcw__render__input_field($widget, $items){
    
?>

    <div class="---mcw--mcs__inputGroup ---mcw--mcs__inputGroup_nomargin">

        <input
            type="text"
            class="---mcw--mcs__input"
            widget-control="text-filter-input"
            dropdown-opener
            widget-control-key="<?php echo $widget->get_id().'-'.$items[0]->post_type; ?>"
        >

    </div>

<?php 
}