import buildQueryParams from "./buildQueryParams";
import getPlaceData from "./get-place-data";
import { getVehicleID, selectors } from "./globals";
import initAutocomplete from "./initAutocomplete";
import selectModel from "./selectModel";

const validateWidget = async (widget, settings) => {

    let params = {}, urlParams;

    // Gather Default Values

    // Neighboring Countries
    if(settings.select_countries_toggle_by_default && settings.display_countries_toggle){
        params.includeNeighbors = true;
    }

    // Search Radius
    const radius = settings.structure.includes('with_radius')
        ? settings.radius_dropdown.filter(option => option.set_as_default === 'yes').length
            ? Number(settings.radius_dropdown.filter(option => option.set_as_default === 'yes')[0].radius)
            : Number(settings.radius_dropdown[0].radius)
        : Number(settings.default_radius);
    
    widget.setAttribute('radius', radius);
    params.radius = radius;


    // Gather values from URL
    if( settings.preselect_values_from_url ){
        urlParams = await buildQueryParams(widget, 'url');
        if( Object.keys(urlParams).length > 0 ){
            Object.keys(urlParams).forEach( (p) => {
                params[p] = urlParams[p]
            })
        }
    }

    // Set Widget Values

    // Neighbor Countries
    if(params.includeNeighbors){
        const checkbox = widget.querySelector(selectors.neighborCountriesToggle);
        checkbox.checked = true;
    }

    // Search Radius
    if(settings.radius_dropdown){
        const radiusValueContainer = widget.querySelector(selectors.radiusValue);
        if (params.radius){
            radiusValueContainer.textContent = params.radius + ' km';
        } else {
            const radiusDefaultValue = radiusValueContainer.textContent.trim();
        }
    }

    // if( settings.preselect_current_value && getVehicleID()){
    //     selectModel(widget, getVehicleID());
    // }

    Object.keys(params).forEach( p => {
        if( p !== 'widgetType'){
            widget.setAttribute(p, params[p]);
        }
    })


    if( widget.getAttribute('model') ){
        const models = widget.getAttribute('model').split('+');
        models.forEach(model => {
            selectModel(widget, model);
        });
    }

    if( widget.getAttribute('place') ){
        try {
            const placeData = await getPlaceData(params.place)
            const addressInput = widget.querySelector('[widget-control="location"]');
            addressInput.value = placeData.formatted_address;
            widget.setAttribute('lat', placeData.geometry.location.lat());
            widget.setAttribute('lng', placeData.geometry.location.lng());
        } catch (error) {
            console.error(error)
        }
    }

    // Location Inputs
    initAutocomplete(widget);

    // Switch to the correct widget tab;

    const widgetType = params.widgetType;

    if( widgetType ){
        const isCurrentWidget = widget.getAttribute('widgettype') === widgetType;
        if( isCurrentWidget ){
            const tab = widget.closest('[role="tabpanel"]');
            if( tab ){
                const tabsParent = tab.closest('.e-n-tabs-content');
                const tabs = tabsParent.querySelectorAll('[role="tabpanel"]');
                tabs.forEach(tabItem => {
                    const tabId = tabItem.getAttribute('id');
                    const tabHeader = document.querySelector(`.e-n-tab-title[aria-controls="${tabId}"]`);
                    if( tabItem === tab ){
                        tabItem.classList.add('e-active');
                        tabHeader.setAttribute('aria-selected', 'true')
                    } else {
                        tabItem.classList.remove('e-active');
                        tabHeader.setAttribute('aria-selected', 'false')
                    }
                });
            }
        }
    }

}

export default validateWidget;