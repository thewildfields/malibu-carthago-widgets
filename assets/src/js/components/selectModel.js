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

export default selectModel;