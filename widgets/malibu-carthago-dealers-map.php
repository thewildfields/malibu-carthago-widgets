<?php 

use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Plugin;

require_once ___MCW__PLUGIN_DIR_PATH . 'controls/map-content.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'controls/map-markers.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'controls/map-infowindows.php';

require_once ___MCW__PLUGIN_DIR_PATH . 'controls/map-style.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'controls/markers-style.php';
require_once ___MCW__PLUGIN_DIR_PATH . 'controls/infowindows-style.php';

class Malibu_Carthago_Dealers_Map extends \Elementor\Widget_Base {

    public function get_name() {
        return 'malibu_carthago_dealers_map';
    }

    public function get_title() {
        return 'Dealers Map';
    }

    public function get_script_depends(){
        return ['---mcw--dealers-map-widget-scripts'];
    }

    public function get_style_depends(){
        return ['---mcw--dealers-map-widget-styles'];
    }

    public function get_icon() {
		return 'eicon-search';
	}

	public function get_categories() {
		return [ 'custom' ];
	}

    protected function register_controls() {

        ___mcw__map_content_controls($this);
        ___mcw__map_marker_controls($this);
        ___mcw__map_infowindow_controls($this);

        ___mcw__map_style_controls($this);
        ___mcw__markers_style_controls($this);
        ___mcw__infowindows_style_controls($this);
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $mapClasses = ['---mcw--dm'];

        if($settings['keep_map_square'] === 'yes' ){ array_push($mapClasses, '---mcw--dm_square'); }

        if ( Plugin::instance()->editor->is_edit_mode() ) { ?>

            <style>
                .---mcw--dm_square{
                    width: 100%;
                    aspect-ratio: 1;
                    height: auto;
                }
            </style>

            <div
                class="<?php echo implode(' ', $mapClasses); ?>"
                widget-control="dealers-map-container"
                <?php if( $settings['language_based_zooms'] === 'yes' ) { ?>
                    language-based-zooms
                <?php } ?>
            >
                <?php if( $settings['show_infowindows'] === 'yes' ) { ?>
                    <div class="---mcw--dm__infowindow">
                        <p class="---mcw--dm__infowindowText ---mcw--dm__infowindowTitle">Dealer Title</p>
                        <p class="---mcw--dm__infowindowText">Dealer Address</p>
                        <p class="---mcw--dm__infowindowText">Phone</p>
                        <a class="---mcw--dm__infowindowText ---mcw--dm__infowindowLink" target="_blank" tabindex="0">email@example.com</a>
                        <a class="---mcw--dm__infowindowText ---mcw--dm__infowindowLink" target="_blank">website.com</a>
                        <p class="---mcw--dm__infowindowCategories">
                            <span class="---mcw--dm__infowindowCategoryItem">Category</span>
                            <span class="---mcw--dm__infowindowCategoryItem">Category</span>
                            <span class="---mcw--dm__infowindowCategoryItem">Category</span>
                        </p>
                    </div>
                <?php } ?>
                <?php if( $settings['marker_style'] === 'default' ) { ?>
                    <div>Default pin</div>
                <?php } else if( $settings['marker_style'] === 'tax_icon' ) { ?>
                    <div>Tax icon pin</div>
                <?php } ?>
            </div>

        <?php } else { ?>

        <style>
            .---mcw--dm_square{
                width: 100%;
                aspect-ratio: 1;
                height: auto;
            }
        </style>

            <div
                class="<?php echo implode(' ', $mapClasses); ?>"
                widget-control="dealers-map-container"
                <?php
                    if( $settings['preload_dealers'] === 'yes'){
                        echo 'preload-dealers ';
                    }
                    if( $settings['language_based_zooms'] === 'yes'){
                        echo 'language-based-zooms ';
                    }
                    if( $settings['show_infowindows'] === 'yes'){
                        echo 'show-infowindows ';
                    }
                    if( $settings['marker_style'] === 'tax_icon'){
                        echo 'tax-markers ';
                    }
                ?>
            ></div>

        <?php }
    }


}
