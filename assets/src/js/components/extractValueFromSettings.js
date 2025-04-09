const extractValueFromSettings = (settings, property) => {

    if(
        typeof(settings) !== 'object' ||
        !Object.hasOwn(settings, property) ||
        settings[property] === 'no'
    ){
        return false;
    } else if( settings[property] === 'yes' ){
        return true;
    } else if( property.indexOf('_int_') === 0 ){
        return parseInt(settings[property])
    } else {
        return settings[property];
    }

}

export default extractValueFromSettings;