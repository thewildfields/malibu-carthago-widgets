import { maps, selectors } from "./variables";
import buildQueryParams from "./build-query-params";
import fetchDealers from "./fetch-dealers";

const initSearch = async (widget) => {

    const params = await buildQueryParams(widget, 'widget');

    const searchResults = document.querySelectorAll(selectors.dealerCard);

    console.log(searchResults);


    for (let i = 0; i < searchResults.length; i++) {
        console.log(searchResults[i]);
        searchResults[i].remove();
    }

    if( !params.lat || !params.lng ){
        console.log('missing location');
    } else if( !params.radius) {
        console.log('missing radius');
    } else {
        // await fetchDealers(params, true);
        console.log(maps);
    }
}

export default initSearch;
