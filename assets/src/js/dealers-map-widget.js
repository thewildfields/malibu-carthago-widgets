import '../scss/dealers-map-widget-styles.scss';
import { selectors } from './components/globals';
import initMap from './components/initMap';

const mapContainers = document.querySelectorAll(selectors.mapContainer);

mapContainers.forEach(async mapContainer => {
    await initMap(mapContainer);
});