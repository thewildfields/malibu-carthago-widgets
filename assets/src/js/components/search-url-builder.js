const buildSearchURL = (widget) => {

    const searchData = {};

    const button = widget.querySelector('.---mcw--mcs__searchButton');

    const searchParamsFromWidget = ['place','lat','lng','radius','model'];
    const targetURL = widget.getAttribute('target-url');

    searchParamsFromWidget.forEach(parameter => {
        if( widget.getAttribute(parameter) ){
            searchData[parameter] = widget.getAttribute(parameter);
        }
    });

    if( searchData.place && searchData.lat && searchData.lng && searchData.model){
        button.setAttribute('disabled', false);
    } else {
        button.setAttribute('disabled', true);
    }

    if( targetURL ){

        const params = new URLSearchParams(searchData);
        const url = `${targetURL}?${params.toString()}#dealers-map`;
        button.setAttribute('href', url);

    }

};

export default buildSearchURL;
