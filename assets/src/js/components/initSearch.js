import { globalMap, selectors } from "./globals";
import googleAPILoader from "./google-api";
import renderWidgetError from "./render-widget-error";
import buildQueryParams from "./buildQueryParams";
import fetchDealers from "./fetchDealers";

const initSearch = async (widget, settings) => {

    let requiredParams = [];

    switch (settings.widget_content) {
        case 'vehicles':
            requiredParams = settings.required_search_parameters_vehicle ?? []
        break;
        case 'dealers':
            requiredParams = settings.required_search_parameters_dealer ?? []
        break;
        default:
            requiredParams = []
        break;
    }

    const params = await buildQueryParams(widget, 'widget');

    const mapContainer = document.querySelector(selectors.mapContainer);

    if( mapContainer &&  mapContainer.getAttribute('tax-markers') ){
        params.taxMarker = mapContainer.getAttribute('tax-markers');
    }


    const missingParameters = requiredParams.filter(param => !params[param]);

    console.log(requiredParams);

    if( missingParameters.length ){
        if( missingParameters.includes('place') ){
            renderWidgetError(widget, 'location', settings);
        }
        if( missingParameters.includes('model') ){
            renderWidgetError(widget, 'model', settings);
        }
        return;
    }

    if( settings.results_target === 'different_page' ){
        const searchParams = new URLSearchParams(params);
        const url = settings.target_page + '?' + searchParams.toString() + '#---mcw--dm';
        window.open(url, settings.open_in_new_tab ? '_blank' : '_self' );
    } else if( settings.results_target === 'current_page' ){
        const map = globalThis.appData?.map;
        const markers = globalThis.appData?.markers;
        Object.keys(markers).forEach(key => {
            markers[key].setMap(null);
            delete markers[key];
        })
        await fetchDealers(params, true, map, true);
    }

}

export default initSearch;
