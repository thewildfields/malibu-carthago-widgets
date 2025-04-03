import initMap from "./components/init-map";
import { selectors } from "./components/variables";

import '../scss/dealers-map-widget-styles.scss';
import renderDealerCard from "./components/render-dealer-card";
import listenForDealers from "./components/listen-for-dealers";

const maps = document.querySelectorAll(selectors.mapContainer);

if( maps.length > 0 ){
    for (let i = 0; i < maps.length; i++) {
        await listenForDealers('markers');
        await initMap(maps[i]);
    }
}