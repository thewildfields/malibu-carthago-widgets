import { selectors } from "./globals";
import googleAPILoader from "./google-api";
import placeChanged from "./placeChanged";

const initAutocomplete = async (widget) => {
    const input = widget.querySelector(selectors.locationInput);
    try {
        await googleAPILoader.importLibrary('places');
        const autocomplete = new google.maps.places.Autocomplete(
            input,
            {
                types: ["geocode"],
                fields: ['place_id'],
            }
        );
        autocomplete.addListener("place_changed", () => {
            placeChanged(autocomplete, widget);
        });
    } catch (error) {
        console.error( error );
    }
}

export default initAutocomplete;