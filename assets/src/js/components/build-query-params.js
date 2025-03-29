const buildQueryParams = async (widget, source = 'widget') => {

    if( source !== 'widget' && source !== 'url'){
        console.error('buildQueryParams function called incorrectly');
        return;
    }

    const initialParams = {};
    const queryObject = {};

    const allowedParameters = ['place','radius','model', 'include-neighbor-countries'];

    if( source === 'widget' ){
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
        switch (parameter[0]) {
            case 'place':
                const location = await getPlaceData(initialParams[parameter], 'location');
                queryObject.lat = location.lat;
                queryObject.lng = location.lng;
                break
            default:
                queryObject[parameter] = initialParams[parameter];
                break;
        }
        
    }

    return(queryObject);

}

export default buildQueryParams;
