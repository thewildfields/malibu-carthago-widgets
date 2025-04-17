import '../scss/search-widget-styles.scss';
import formatSettings from './components/formatSettings';
import { selectors } from './components/globals';
import initItemsDropdown from './components/initItemsDropdown';
import initItemSelection from './components/initItemSelection';
import initRadiusDropdown from './components/initRadiusDropdown';
import initSearch from './components/initSearch';
import toggleNeighborCountries from './components/toggleNeighborCountries';
import validateWidget from './components/validateWidget';
import initInputFields from './components/initInputFields';
import initAdditionalInputs from './components/initAdditionalInputs';
import initDropdownInput from './components/search-text-inputs';


window.addEventListener( 'elementor/frontend/init', () => {

	elementorFrontend.hooks.addAction( 'frontend/element_ready/malibu_carthago_search.default', (scope) => {
        const widgetContainer = scope[0];
        const widget = widgetContainer.querySelector(selectors.searchWidget);
        const settings = formatSettings(scope.data('settings'));

        validateWidget(widget, settings);
        initRadiusDropdown(widget, settings);
        initItemsDropdown();
        initDropdownInput();
        initInputFields(widget);
        initItemSelection(widget, settings);
        toggleNeighborCountries(widget);
        initAdditionalInputs(widget);

        const searchButton = widget.querySelector(selectors.searchButton);

        searchButton.addEventListener('click' , (e) => {
            e.preventDefault();
            initSearch(widget, settings);
        })
    } );
} ); 