import { selectors } from "./components/globals";
import initItemsDropdown from "./components/initItemsDropdown";
import initItemSelection from "./components/initItemSelection";
import initRadiusDropdown from "./components/initRadiusDropdown";
import initSearch from "./components/initSearch";
import toggleNeighborCountries from "./components/toggleNeighborCountries";
import validateWidget from "./components/validateWidget";
import formatSettings from "./components/formatSettings";
import initMap from "./components/initMap";


// window.addEventListener('load', () => {
    
    // window.elementorFrontend.hooks.addAction('frontend/element_ready/malibu_carthago_search.default', function ($scope) {

    //     const widgetContainer = $scope[0];
    //     const widget = widgetContainer.querySelector(selectors.searchWidget);
    //     const settings = formatSettings($scope.data('settings'));

    //     validateWidget(widget, settings);
    //     initRadiusDropdown(widget, settings);
    //     initItemsDropdown();
    //     initItemSelection(widget, settings);
    //     toggleNeighborCountries(widget);

    //     const searchButton = widget.querySelector(selectors.searchButton);

    //     searchButton.addEventListener('click' , (e) => {
    //         e.preventDefault();
    //         initSearch(widget, settings);
    //     })
    
    // });
    
    // window.elementorFrontend.hooks.addAction('frontend/element_ready/malibu_carthago_dealers_map.default', async ($scope) => {

    //     try {

    //         const widgetContainer = $scope[0];
    //         const widget = widgetContainer.querySelector(selectors.mapContainer);
    //         const settings = formatSettings($scope.data('settings'));


    //         await initMap(widget, settings)
            
    //     } catch (e) {
    //         console.error(e);
    //     }
    // })

// });
