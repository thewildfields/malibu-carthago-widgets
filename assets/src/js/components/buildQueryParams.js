import getPlaceData from "./get-place-data";
import { selectors } from "./globals";

const buildQueryParams = async (widget = null, source = null) => {

    if( source !== 'widget' && source !== 'url'){
        console.error('buildQueryParams function called incorrectly');
        return;
    }

    const initialParams = {};
    const queryObject = {};

    const allowedParameters = ['place','radius','model', 'includeNeighbors', 'dealerName', 'widgetType','haendlertyp'];

    if( widget && source === 'widget' ){
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
        if(placeData.address_components){
            const country = placeData.address_components.filter(component => component.types.includes('country'));
            queryObject.countryCode = country[0].short_name.toLowerCase();
        }
        if(!placeData.geometry){
            console.error("location error");
            return;
        }
    }

    if(initialParams.includeNeighbors && initialParams.includeNeighbors === 'true'){
        queryObject.includeNeighbors = true;
    }

    return(queryObject);

}

export default buildQueryParams;
