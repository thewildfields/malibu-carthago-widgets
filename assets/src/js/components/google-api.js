import { Loader } from "@googlemaps/js-api-loader";
import { googleMapsApiKey } from "./variables";

const googleAPILoader = new Loader({
    apiKey: googleMapsApiKey,
    version: 'weekly',
    libraries: ['places', 'geocoding'],
});

export default googleAPILoader;