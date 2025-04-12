import renderDealerCard from "./render-dealer-card";
import renderDealerMarker from "./render-dealer-marker";
import { selectors } from "./globals";

const listenForDealers = async (method=null) => {

    document.addEventListener('dealersFetched', async (e) => {

        const dealers = e.detail.dealersResponse.items;

        if (!dealers){
            console.error('Error dispatching dealers fetched event');
            return;
        }

        if( dealers.length === 0){
            console.error('No dealers found')
            return;
        }

        if( method === 'markers' || method.includes('markers') ){

            const map = e.detail.map;
            let newMarkers = {};

            globalThis.appData.map = map;

            if( !map ){
                console.error('Map is not found');
                return;
            }

            const bounds = new google.maps.LatLngBounds();


            dealers.forEach( async dealer => {
                const newMarker = await renderDealerMarker(dealer, map, bounds, e.detail.resize);
                newMarkers[dealer.id] = newMarker;
            });

            setTimeout(() => {
                globalThis.appData.markers = newMarkers;
            }, 100);

        }


        if( e.detail.renderCards && ( method === 'cards' || method.includes('cards')) ){

            const searchResultsWidgets = document.querySelectorAll(selectors.searchResultsWidget);

            if( !searchResultsWidgets.length ){
                console.error('Search results widgets are not found');
                return;
            }

            for (let i = 0; i < searchResultsWidgets.length; i++) {
                const resultsWidget = searchResultsWidgets[i];
                resultsWidget.innerHTML = '';
                dealers.forEach(async (dealer) => {
                    renderDealerCard(resultsWidget, dealer);
                });
            }
        }

    });

}

export default listenForDealers;