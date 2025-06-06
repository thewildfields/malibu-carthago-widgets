<?php 

use Elementor\Widget_Base;
use Elementor\Utils;

require_once ( ___MCW__PLUGIN_DIR_PATH . 'controls/widget-search-results.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'controls/widget-content.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'controls/widget-presentation.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'controls/address-block.php' );
require_once ( ___MCW__PLUGIN_DIR_PATH . 'controls/fields-style.php' );

require_once ( ___MCW__PLUGIN_DIR_PATH . 'renders/widget-render.php' );

class Malibu_Carthago_Search_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'malibu_carthago_search';
    }

    public function get_title() {
        return 'Malibu Carthago Search';
    }

    public function get_script_depends(){
        return ['---mcw--widget-scripts'];
    }

    public function get_style_depends(){
        return ['---mcw--widget-styles'];
    }

    public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'custom' ];
	}

    public function get_keywords() {
		return [];
	}

    protected function register_controls() {

        ___mcw__widget_search_results($this);
        ___mcw__widget_content_controls($this);
        ___mcw__widget_presentation_controls($this);
        ___mcw__address_block_controls($this);

        ___mcw__fields_style_control($this);

    }

    protected function render() {

        ___mcw__widget_render($this);

    }


}