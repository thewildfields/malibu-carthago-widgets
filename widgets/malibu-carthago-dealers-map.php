<?php 

use Elementor\Widget_Base;
use Elementor\Utils;

class Malibu_Carthago_Dealers_Map extends \Elementor\Widget_Base {

    public function get_name() {
        return 'malibu_carthago_dealers_map';
    }

    public function get_title() {
        return 'Dealers Map';
    }

    public function get_script_depends(){
        return ['---mcw--dealers-map'];
    }

    public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'custom' ];
	}

    protected function render() {
        ?>

            <div
                class="---mcw--dm"
                widget-control="dealers-map-container"
                style="height: 400px"
            >dealers map</div>

        <?php 
    }


}
