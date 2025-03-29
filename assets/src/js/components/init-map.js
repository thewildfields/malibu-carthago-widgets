import getPlaceData from "./get-place-data";
import googleAPILoader from "./google-api";
import renderDealerMarker from "./render-dealer-marker";

const initMap = async ( mapContainer ) => {

    const markers = [];

    const placeId = new URLSearchParams(window.location.search).get('place');

    let mapCenter = {
        lat: -34.397,
        lng: 150.644
    }

    if(placeId){
        try{
            mapCenter = await getPlaceData(placeId, 'location');
        }
        catch (error){
            console.error(error);
        }
    }

    const { Map } = await googleAPILoader.importLibrary('maps');
    const map = new Map(mapContainer, {
        mapId: '500a677ca0b99316',
        mapTypeControlOptions: {
            mapTypeIds: ["roadmap"]
        },
        disableDefaultUI: true,
        center: mapCenter,
        zoom: 8,
    })


    window.ElementorEventBus.addEventListener('dealersFetched', async (e) => {
        const bounds = new google.maps.LatLngBounds();
        markers.forEach(marker => marker.setMap(null));
        const dealersResponse = e.detail;
        const dealers = dealersResponse.items;
        dealers.forEach(dealer => {
            renderDealerMarker(dealer, map, bounds, markers);
        });
    })

}

export default initMap;
