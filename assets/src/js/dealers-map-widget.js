import initMap from "./components/init-map";
import { selectors } from "./components/variables";

import '../scss/dealers-map-widget-styles.scss';

const maps = document.querySelectorAll(selectors.mapContainer);

if( maps.length > 0 ){
    for (let i = 0; i < maps.length; i++) {
        initMap(maps[i])
        
    }
}