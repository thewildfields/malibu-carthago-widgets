const formatSettings = (settings) => {

    const updatedSettings = {};

    Object.keys(settings).forEach( property => {
        if( settings[property] === 'no' ){
            updatedSettings[property] = false;
        } else if( settings[property] === 'yes' ){
            updatedSettings[property] = true;
        } else if( property.indexOf('_int_') === 0 ){
            updatedSettings[property] = parseInt(settings[property])
        } else {
            updatedSettings[property] = settings[property];
        }
    })

    return updatedSettings;
}

export default formatSettings;
