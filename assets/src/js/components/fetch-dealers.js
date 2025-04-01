import axios from 'axios';
import { endpoints } from "./variables";

window.ElementorEventBus = new EventTarget();

const fetchDealers = async (params = {}) => {
    console.log('fetching dealers');
    if( !Object.hasOwn(params, 'limit')){ params.limit = 5 }
    try {
        const dealersResponse = await axios(endpoints.dealers, {params: params});
        const dealers = dealersResponse.data;

        const event = new CustomEvent("dealersFetched", { detail: dealers });
        window.ElementorEventBus.dispatchEvent(event);

        console.log('dealers fetched in function');

    } catch (error) {
        console.error(error)
    }
}

export default fetchDealers;