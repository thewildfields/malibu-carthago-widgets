const placeChanged = (autocomplete, widget) => {
    const place = autocomplete.getPlace();
    if( !place ){
        console.error('Places autocomplete error');
        return;
    }
    widget.setAttribute( 'place', place.place_id );
}

export default placeChanged;
