<?php 

use Elementor\Widget_Base;
use Elementor\Utils;


require_once ( ___MCW__PLUGIN_DIR_PATH . 'controls/dealer-cards-content.php' );

require_once ( ___MCW__PLUGIN_DIR_PATH . 'controls/dealer-cards-style.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'controls/dealer-cards-text-style.php' );

require_once ( ___MCW__PLUGIN_DIR_PATH . 'renders/search-results-widget.php' );

class Malibu_Carthago_Dealers_Search_Results extends \Elementor\Widget_Base {

    public function get_name() {
        return 'malibu_carthago_dealers_search_results';
    }

    public function get_title() {
        return 'Dealers Search Results';
    }

    public function get_script_depends(){
        return ['---mcw--dealers-search-results-widget-scripts'];
    }

    public function get_style_depends(){
        return ['---mcw--dealers-search-results-widget-styles'];
    }

    public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'custom' ];
	}

    protected function register_controls() {

        ___mcw__dealer_card_content($this);

        ___mcw__dealer_card_style($this);
        ___mcw__dealer_cards_text_style($this);

    }

    protected function render() {

        ___mcw__search_results_widget_render($this);

    }
}
