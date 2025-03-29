import { Loader } from "@googlemaps/js-api-loader";
import { googleMapsApiKey } from "./variables";

const googleAPILoader = new Loader({
    apiKey: googleMapsApiKey,
    version: 'weekly',
    libraries: ['maps','places','geocoding','marker'],
});

export default googleAPILoader;