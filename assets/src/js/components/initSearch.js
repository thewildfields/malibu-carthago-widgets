import { globalMap, selectors } from "./globals";
import googleAPILoader from "./google-api";
import renderWidgetError from "./render-widget-error";
import buildQueryParams from "./buildQueryParams";
import fetchDealers from "./fetchDealers";

const initSearch = async (widget, settings) => {

    const requiredParams = settings.required_search_parameters ?? [];

    const params = await buildQueryParams(widget, 'widget');

    const missingParameters = requiredParams.filter(param => !params[param]);

    if( missingParameters.length ){
        if( missingParameters.includes('place') ){
            renderWidgetError(widget, 'location', settings);
        }
        if( missingParameters.includes('model') ){
            renderWidgetError(widget, 'model', settings);
        }
        return;
    }

    const checkboxes = widget.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.checked = false;
    });

    if( settings.results_target === 'different_page' ){
        const searchParams = new URLSearchParams(params);
        const url = settings.target_page + '?' + searchParams.toString();
        window.open(url, settings.open_in_new_tab ? '_blank' : '_self' );
    } else if( settings.results_target === 'current_page' ){
        const map = globalThis.appData?.map;
        await fetchDealers(params, true, map, true);
    }

}

export default initSearch;
