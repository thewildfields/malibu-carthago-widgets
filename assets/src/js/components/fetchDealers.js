import { endpoints } from "./globals";
import axios from 'axios';
import dispatchDealersFetchedEvent from './dealers-fetched-event';

const fetchDealers = async (params = {}, renderCards, map, resize) => {

    if( !Object.hasOwn(params, 'limit')){ params.limit = 5 }
    try {

        const dealersResponse = await axios(endpoints.dealers, {params: params});

        const event = await dispatchDealersFetchedEvent(params, dealersResponse, renderCards, map, resize);

    } catch (error) {
        console.error(error)
    }
}

export default fetchDealers;