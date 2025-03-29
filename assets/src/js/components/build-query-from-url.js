import getPlaceData from "./get-place-data";

const buildQueryFromUrl = async () => {

    const allowedParams = ['model','place','radius'];
    const urlParams = new URLSearchParams(window.location.search);
    const queryObject = {};
    for (const parameter of urlParams){
        if( !allowedParams.includes(parameter[0]) ){ continue; }
        switch (parameter[0]) {
            case 'place':
                const location = await getPlaceData(parameter[1], 'location');
                queryObject.lat = location.lat;
                queryObject.lng = location.lng;
                break
            default:
                queryObject[parameter[0]] = parameter[1];
                break;
        }
    }
    return(queryObject)
}

export default buildQueryFromUrl;
