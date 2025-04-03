import googleAPILoader from "./google-api";
import { bounds } from "./variables";

await googleAPILoader.importLibrary('maps');

const defineBounds = async () => {
    
    const locale = document.documentElement.lang.slice(3).toLowerCase();

    let boundsObject = new google.maps.LatLngBounds();

    const savedBounds = Object.hasOwn(bounds, locale) ? bounds[locale] : bounds['de'];

    boundsObject.extend({lat: savedBounds[0], lng: savedBounds[1]});
    boundsObject.extend({lat: savedBounds[2], lng: savedBounds[3]});

    return boundsObject;

}

export default defineBounds;