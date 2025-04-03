const buildSearchURL = (widget) => {

    const searchData = {};

    const button = widget.querySelector('[widget-control="search-button"]');

    const searchParamsFromWidget = ['place','radius','model', 'include-neighbor-countries'];
    const targetURL = widget.getAttribute('target-url');

    searchParamsFromWidget.forEach(parameter => {
        if( widget.getAttribute(parameter) ){
            searchData[parameter] = widget.getAttribute(parameter);
        }
    });

    if( targetURL ){

        const params = new URLSearchParams(searchData);
        const url = `${targetURL}?${params.toString()}#dealers-map`;
        button.setAttribute('href', url);

    } else {
        button.removeAttribute('href');
    }

};

export default buildSearchURL;
