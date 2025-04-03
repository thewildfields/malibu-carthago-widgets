import getPlaceData from "./get-place-data";

const buildQueryParams = async (widget = null, source = null) => {

    if( source !== 'widget' && source !== 'url'){
        console.error('buildQueryParams function called incorrectly');
        return;
    }

    const initialParams = {};
    const queryObject = {};

    const allowedParameters = ['place','radius','model', 'include-neighbor-countries'];

    if( widget && source === 'widget' ){
        allowedParameters.push('target-url', 'lat', 'lng');
        allowedParameters.forEach(parameter => {
            initialParams[parameter] = widget.getAttribute(parameter);
        });
    }

    if( source === 'url' ){
        const urlParams = new URLSearchParams(window.location.search);
        for( const parameter of urlParams ){
            initialParams[parameter[0]] = parameter[1];
        }
    }

    for (let i = 0; i < Object.keys(initialParams).length; i++) {
        const parameter = Object.keys(initialParams)[i];
        if( !allowedParameters.includes(parameter) ){ continue; }
        if( !initialParams[parameter] ){ continue; }
        if( parameter === 'place' ){ continue; }
        queryObject[parameter] = initialParams[parameter];
    }

    if( initialParams.place ){
        const location = await getPlaceData(initialParams.place, 'location');
        queryObject.lat = location.lat;
        queryObject.lng = location.lng;
    }

    return(queryObject);

}

export default buildQueryParams;
