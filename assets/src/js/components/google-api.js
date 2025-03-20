import { Loader } from "@googlemaps/js-api-loader";

const googleMapsApiKey = "AIzaSyBkzLO8lK3yXznfawhOc74Y-FMvGR84tVg";

const googleAPILoader = new Loader({
    apiKey: googleMapsApiKey,
    version: 'weekly',
    libraries: ['places', 'geocoding'],
});

export default googleAPILoader;