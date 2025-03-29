import axios from 'axios';
import { endpoints } from "./variables";

window.ElementorEventBus = new EventTarget();

const fetchDealers = async (params = {}) => {
    try {
        const dealersResponse = await axios(endpoints.dealers, {params: params});
        const dealers = dealersResponse.data;

        const event = new CustomEvent("dealersFetched", { detail: dealers });
        window.ElementorEventBus.dispatchEvent(event);

    } catch (error) {
        console.error(error)
    }
}

export default fetchDealers;