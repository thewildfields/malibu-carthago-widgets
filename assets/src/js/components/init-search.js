import { getAllMaps, selectors } from "./variables";
import buildQueryParams from "./build-query-params";
import fetchDealers from "./fetch-dealers";
import googleAPILoader from "./google-api";

const initSearch = async (widget) => {

    const map = window.mapsRegistry.get("---mcw--dm");

    const params = await buildQueryParams(widget, 'widget');
    await googleAPILoader.importLibrary('maps');

    const searchResults = document.querySelectorAll(selectors.dealerCard);

    for (let i = 0; i < searchResults.length; i++) {
        console.log(searchResults[i]);
        searchResults[i].remove();
    }

    if( !params.lat || !params.lng ){
        console.log('missing location');
    } else if( !params.radius) {
        console.log('missing radius');
    } else {
        await fetchDealers(params, true, map, true);
    }
}

export default initSearch;
