import renderDealerCard from "./render-dealer-card";
import renderDealerMarker from "./render-dealer-marker";
import { selectors } from "./variables";

const listenForDealers = async (method=null) => {

    document.addEventListener('dealersFetched', async (e) => {

        const dealers = e.detail.dealersResponse.items;

        if (!dealers || !dealers.length){
            console.error('Error dispatching dealers fetched event');
            return;
        }

        if( method === 'markers' || method.includes('markers') ){

            const map = e.detail.map;

            if( !map ){
                console.error('Map is not found');
                return;
            }

            dealers.forEach( async dealer => {
                renderDealerMarker(dealer, map);
            });
        }

        if( e.detail.renderCards && ( method === 'cards' || method.includes('cards')) ){

            const searchResultsWidgets = document.querySelectorAll(selectors.searchResultsWidget);

            if( !searchResultsWidgets.length ){
                console.error('Search results widgets are not found');
                return;
            }

            for (let i = 0; i < searchResultsWidgets.length; i++) {
                dealers.forEach(async (dealer) => {
                    renderDealerCard(searchResultsWidgets[i], dealer);
                });
            }
        }

    });

}

export default listenForDealers;