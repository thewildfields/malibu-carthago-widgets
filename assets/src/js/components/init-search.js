import buildQueryParams from "./build-query-params";
import fetchDealers from "./fetch-dealers";

const initSearch = async (widget) => {
    const params = await buildQueryParams(widget);
    fetchDealers(params);
}

export default initSearch;
