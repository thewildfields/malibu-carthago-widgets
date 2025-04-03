import { attributes, map, mapData, markers, selectors } from "./variables";
import googleAPILoader from "./google-api";
import renderInfowindow from "./render-infowindow";

const renderDealerMarker = async (dealer, map) => {
    
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
