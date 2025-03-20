import buildSearchURL from "./search-url-builder";
import googleAPILoader from "./google-api";

const googleMapsApiKey = "AIzaSyBkzLO8lK3yXznfawhOc74Y-FMvGR84tVg";


const placeChanged = (autocomplete, widget) => {

    const place = autocomplete.getPlace();

    if( !place || !place.geometry ){
        console.error('Places autocomplete error');
        return;
    }

    console.log(place);
    widget.setAttribute( 'place', place.place_id );
    widget.setAttribute( 'lat', place.geometry.location.lat() );
    widget.setAttribute( 'lng', place.geometry.location.lng() );

    buildSearchURL(widget);

}


const initAutocomplete = async (input) => {

    const widget = input.closest('.---mcw--mcs');

    try {
        await googleAPILoader.importLibrary('places');

        const autocomplete = new google.maps.places.Autocomplete(
            input,
            {
                types: ["geocode"],
                fields: ['place_id', 'geometry', 'name', 'address_components'],
            }
        );

        autocomplete.addListener("place_changed", () => {
            placeChanged(autocomplete, widget);
        });

    } catch (error) {
        console.error( error );
    }
}


const locationAutocompleteInputs = document.querySelectorAll('[widget-control="location"]');

if( locationAutocompleteInputs ){

    for (let i = 0; i < locationAutocompleteInputs.length; i++) {

        initAutocomplete(locationAutocompleteInputs[i])

    }

}