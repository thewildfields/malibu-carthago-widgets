import { attributes, map, mapData, markers, selectors } from "./globals";
import googleAPILoader from "./google-api";
import renderInfowindow from "./render-infowindow";

const renderDealerMarker = async (dealer, map, bounds, resize) => {
    
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
        },
    })

    if(resize){
        bounds.extend({lat: dealer.location.lat, lng: dealer.location.lng});
        map.fitBounds(bounds);
    }

    if(dealer.tax_marker){
        const markerPin = document.createElement('img');
        markerPin.style.width = '35px';
        markerPin.style.height = '35px';
        markerPin.style.objectFit = 'contain';
        markerPin.src = dealer.tax_marker;
        marker.content = markerPin;
    }

    markers[dealer.id] = marker;

    google.maps.event.addListener(marker, 'click', () => {
        renderInfowindow( dealer, marker )
    });

    const dealerCard = document.querySelector(`${selectors.dealerCard}[dealer-id="${dealer.id}"]`);

    if( !dealerCard ){ return; }
    
    const widget = dealerCard.closest(selectors.dealerCardsContainer);

    if(widget && widget.hasAttribute('open-infowindow-on-click')){

        dealerCard.addEventListener('click', () => {
            renderInfowindow(dealer, marker);
        })

    }

}

export default renderDealerMarker;
