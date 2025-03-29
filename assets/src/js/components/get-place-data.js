import googleAPILoader from "./google-api";

const getPlaceData = async (placeId, field='all') => {
    try {
        await googleAPILoader.importLibrary('geocoding');
        const geocoder = new google.maps.Geocoder();
        const placeData = await geocoder.geocode({placeId: placeId});
        const result = placeData.results[0];
        switch (field) {
            case 'location':
                const location = {
                    lat: result.geometry.location.lat(),
                    lng: result.geometry.location.lng(),
                }
                return location;
                break;
            case 'all':
            default:
                return result;
                break;
        }
    } catch (error) {
        console.error(error)
    }
}

export default getPlaceData;
