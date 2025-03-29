import buildQueryParams from "./build-query-params";
import fetchDealers from "./fetch-dealers";
import getPlaceData from "./get-place-data";
import { attributes, selectors } from "./variables";

const selectModel = (widget, model) => {

    const selectedOptionClass = '---mcw--mcs__option_selected';
    const selectedOptionClassInSelectedList = '---mcw--mcs__optionValue';
    const widgetSelectedValuesList = widget.querySelector('[widget-control="selected-value-list"]')

    const modelItem = widget.querySelector(`[item-value="model-${model}"]`);

    // Add Selected Class
    if(!modelItem){ return; }
    
    modelItem.classList.add(selectedOptionClass);

    // Select Checkbox
    const checkbox = modelItem.querySelector('input[type="checkbox"]');
    if(checkbox){
        checkbox.checked = true;
    }

    // Add to Selected values list
    const selectedValueElement = document.createElement('button');
    selectedValueElement.classList.add(selectedOptionClassInSelectedList);
    selectedValueElement.setAttribute('item-key', 'model');
    selectedValueElement.setAttribute('item-value', model);
    selectedValueElement.textContent = widget.querySelector(`[item-value="model-${model}"]`).textContent;
    widgetSelectedValuesList.appendChild(selectedValueElement);

    const typingInput = widget.querySelector('[widget-control="dropdown-input"]');
    typingInput.setAttribute('placeholder', '');

}

const validateWidget = async (widget) => {

    const params = await buildQueryParams(widget, 'url');




    if( widget.getAttribute('preselect-current-value') ){
        const model = widget.getAttribute('preselect-current-value');
        selectModel(widget, model);
    }

    const preselectValuesFromURL = widget.getAttribute('preselect-values') === 'yes';

    if(preselectValuesFromURL){

        Object.keys(params).forEach( parameter => {
            widget.setAttribute(parameter, params[parameter]);
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

        if(widget.getAttribute(attributes.neighborCountries) === 'true'){
            const checkbox = widget.querySelector(selectors.neighborCountriesToggle);
            checkbox.checked = true;
        }

        const radiusValueContainer = widget.querySelector('.---mcw--mcs__radiusValue');

        if(radiusValueContainer && params.radius ){
            radiusValueContainer.textContent = params.radius + ' km';
        }

        fetchDealers(params);

    }

}

export default validateWidget;