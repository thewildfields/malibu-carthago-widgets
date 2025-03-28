import buildSearchURL from "./search-url-builder";
import googleAPILoader from "./google-api";
import { selectors } from "./variables";

const locationAutocompleteInputs = document.querySelectorAll(selectors.locationInput);

// Location selection controller
const placeChanged = (autocomplete, widget) => {
    const place = autocomplete.getPlace();
    if( !place ){
        console.error('Places autocomplete error');
        return;
    }
    widget.setAttribute( 'place', place.place_id );
    buildSearchURL(widget);
}

// Places autocomplete initiator
const initAutocomplete = async (input) => {
    const widget = input.closest(selectors.widget);
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

// Initiating Places Autocomplete for all location inputs
if( locationAutocompleteInputs ){
    for (let i = 0; i < locationAutocompleteInputs.length; i++) {
        initAutocomplete(locationAutocompleteInputs[i])
    }
}
