import googleAPILoader from "./google-api";
import renderInfowindow from "./render-infowindow";
import { attributes } from "./variables";

const renderDealerMarker = async (dealer, map, bounds, markers) => {

    const { AdvancedMarkerElement } = await googleAPILoader.importLibrary('marker');
    if ( !dealer.location.lat || !dealer.location.lng ){
        console.error('Dealer is missing location attributes');
        return;
    }

    const marker = new AdvancedMarkerElement({
        map,
        position: {
            lat: dealer.location.lat,
            lng: dealer.location.lng,
        }
    })

    bounds.extend(marker.position);

    map.fitBounds(bounds);

    markers.push(marker);

    google.maps.event.addListener(marker, 'click', () => {
        renderInfowindow( dealer, marker )
    });

}

export default renderDealerMarker;
