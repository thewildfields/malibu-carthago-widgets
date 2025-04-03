<?php 

use Elementor\Plugin;

function ___mcw__search_results_widget_render($widget){

    $settings = $widget->get_settings_for_display();
    
    // Editor mode
    if ( Plugin::instance()->editor->is_edit_mode() ) {
    
    ?>

        <div widget-control="dealer-card" class="---mcw--dc">
            <p class="---mcw--dc__distance">50 km</p>
            <p class="---mcw--dc__title">Dealer name</p>
            <p class="---mcw--dc__city">City</p>
            <p class="---mcw--dc__categories">
                <span class="---mcw--dc__categoriesItem">Service</span>
                <span class="---mcw--dc__categoriesItem">Husbilar</span>
                <span class="---mcw--dc__categoriesItem">Vans</span>
                <span class="---mcw--dc__categoriesItem">Uthyrningsföretag</span>
            </p>
            <p class="---mcw--dc__modelsTitle"><?php echo $settings['dealer_models_title_text']; ?></p>
            <p class="---mcw--dc__models">Model, another model, third model</p>
        </div>

    <?php } else { ?>

        <div
            widget-control="dealers-search-results-container"
            available-models-text="<?php echo $settings['dealer_models_title_text']; ?>"
            <?php if( $settings['filter_dealer_categories'] === 'yes'){ ?>
                allowed-categories="<?php echo implode('+', $settings['dealers_categories_to_display']); ?>"
            <?php } ?>
            <?php if( $settings['click_opens_infowindow'] === 'yes'){ ?>
                open-infowindow-on-click
            <?php } ?>
        >
        </div>

    <?php }
}
