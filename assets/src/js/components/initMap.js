import buildQueryParams from "./buildQueryParams";
import defineBounds from "./defineBounds";
import getPlaceData from "./get-place-data";
import googleAPILoader from "./google-api";
import fetchDealers from './fetchDealers';
import listenForDealers from "./listen-for-dealers";

const initMap = async (mapContainer) => {

    await listenForDealers('markers')

    let mapCenter;

    const placeId = new URLSearchParams(window.location.search).get('place');

    const langBasedZooms = mapContainer.hasAttribute('language-based-zooms');

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
        minZoom: 4,
        maxZoom: 15 
    })

    if(langBasedZooms){
        const bounds = await defineBounds();
        map.fitBounds(bounds);
    }
    
    const params = await buildQueryParams(mapContainer, 'url');

    if( !Object.keys(params).length ){
        params.limit = 0;
        params.loadAll = true;
    }

    if( mapContainer.getAttribute('tax-markers') ){
        params.taxMarker = mapContainer.getAttribute('tax-markers');
    }

    if( !Object.hasOwn(params, 'place') ){

        await fetchDealers(params, false, map, false);
    } else {
        await fetchDealers(params, true, map, true);
    }

}

export default initMap;
