import buildQueryParams from "./build-query-params";
import defineBounds from "./defineBounds";
import fetchDealers from "./fetch-dealers";
import getPlaceData from "./get-place-data";
import googleAPILoader from "./google-api";


    window.mapsRegistry = new Map();

const initMap = async ( mapContainer ) => {

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
    
    const params = await buildQueryParams(null, 'url');

    if( mapContainer.getAttribute('tax-markers') ){
        params.taxMarker = mapContainer.getAttribute('tax-markers');
    }
    
    window.mapsRegistry.set('---mcw--dm', map);

    if( !Object.keys(params).place ){
        params.limit = 0;
        await fetchDealers(params, false, map, false);
    } else {
        await fetchDealers(params, true, map, true);
    }

    return;

}

export default initMap;

