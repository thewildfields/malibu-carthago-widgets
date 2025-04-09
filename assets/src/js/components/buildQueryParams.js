import getPlaceData from "./get-place-data";

const buildQueryParams = async (widget = null, source = null) => {

    if( source !== 'widget' && source !== 'url'){
        console.error('buildQueryParams function called incorrectly');
        return;
    }

    const initialParams = {};
    const queryObject = {};

    const allowedParameters = ['place','radius','model', 'includeNeighbors'];

    if( widget && source === 'widget' ){
        // allowedParameters.push('target-url');
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
        if( !initialParams[parameter]){ continue; }
        queryObject[parameter] = initialParams[parameter];
    }

    if(initialParams.place){
        const placeData = await getPlaceData(initialParams.place);
        if(placeData.geometry){
            queryObject.lat = placeData.geometry.location.lat();
            queryObject.lng = placeData.geometry.location.lng();
        } else {
            console.error("location error");
            return;
        }
    }

    return(queryObject);

}

export default buildQueryParams;
