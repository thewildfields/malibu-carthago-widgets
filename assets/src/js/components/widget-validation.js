import googleAPILoader from "./google-api";

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

    const urlParams = new URLSearchParams(window.location.search);

    if( widget.getAttribute('preselect-current-value') ){
        const model = widget.getAttribute('preselect-current-value');
        selectModel(widget, model);
    }

    const preselectValuesFromURL = widget.getAttribute('preselect-values') === 'yes';

    if(preselectValuesFromURL){
        
        for( const parameter of urlParams ){
            widget.setAttribute(parameter[0], parameter[1])
        }

        if( widget.getAttribute('model') ){
            const models = widget.getAttribute('model').split('+');
            models.forEach(model => {
                selectModel(widget, model);
            });
        }

        if( widget.getAttribute('place') ){
            try {

                await googleAPILoader.importLibrary('geocoding');
                const geocoder = new google.maps.Geocoder();
                const placeData = await geocoder.geocode({placeId: widget.getAttribute('place')});
                const placeName = placeData.results[0].formatted_address;
                const addressInput = widget.querySelector('[widget-control="location"]');
                addressInput.value = placeName;


            } catch (error) {
                console.error(error)
            }
        }

    }

}

export default validateWidget;