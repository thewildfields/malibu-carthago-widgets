import { googleMapsApiKey } from "./variables";
import { Loader } from "@googlemaps/js-api-loader";

const googleAPILoader = new Loader({
    apiKey: googleMapsApiKey,
    version: 'weekly',
    libraries: ['maps','places','geocoding','marker'],
});

export default googleAPILoader;