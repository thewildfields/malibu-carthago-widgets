import renderDealerCard from "./render-dealer-card";
import renderDealerMarker from "./render-dealer-marker";
import { selectors } from "./globals";
import renderWidgetError from "./renderWidgetError";
import googleAPILoader from "./google-api";
import buildQueryParams from "./buildQueryParams";

const listenForDealers = async (method=null, widget=null, settings=null) => {

    document.addEventListener('dealersFetched', async (e) => {

        const dealers = e.detail.dealersResponse.items;

        if (!dealers){
            console.error('Error dispatching dealers fetched event');
            return;
        }

        if( dealers.length === 0){

            if( method === 'widget' ){
                renderWidgetError(widget, 'dealers', settings);
            }
            const map = e.detail.map;
            if(e.detail.mapCenter){
                map.setCenter(e.detail.mapCenter);
                map.setZoom(12);
            }
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
                if(dealer.location && dealer.location.lat && dealer.location.lng){
                    const newMarker = await renderDealerMarker(dealer, map, bounds, e.detail.resize);
                    newMarkers[dealer.id] = newMarker;
                }
            });

            setTimeout(() => {
                globalThis.appData.markers = newMarkers;
            }, 100);

        }


        if( e.detail.renderCards && ( method === 'cards' || method.includes('cards')) ){

            const searchResultsWidgets = document.querySelectorAll(selectors.searchResultsWidget);

            for (let i = 0; i < searchResultsWidgets.length; i++) {
                const resultsWidget = searchResultsWidgets[i];
                dealers.forEach(async (dealer) => {
                    if(dealer.location && dealer.location.lat && dealer.location.lng){
                        renderDealerCard(resultsWidget, dealer, e.detail.sourceWidgetType);
                    }
                });
            }
        }

    });

}

export default listenForDealers;