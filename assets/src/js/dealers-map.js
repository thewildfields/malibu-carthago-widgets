import initMap from "./components/init-map";
import { selectors } from "./components/variables";

const maps = document.querySelectorAll(selectors.mapContainer);

if( maps.length > 0 ){
    for (let i = 0; i < maps.length; i++) {
    //     const query = await buildQueryFromUrl()
    //     const dealersResponse = await requestDealers( query );
    //     const dealers = dealersResponse.items;
        initMap(maps[i])
    //     dealers.forEach(dealer => {
    //         renderDealerMarker(dealer);
    //         renderDealerCard(dealer);
    //     });
    }
}