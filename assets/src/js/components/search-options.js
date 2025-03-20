// Options

import buildSearchURL from "./search-url-builder";

const widgetOptions = document.querySelectorAll('.---mcw--mcs__option');

for (let i = 0; i < widgetOptions.length; i++) {

    const option = widgetOptions[i];

    option.addEventListener('click', (e) => {

        const widget = e.target.closest('.---mcw--mcs');

        const allowMultiple = widget.getAttribute('allow-multiple') === 'yes' ? true : false;

        const valueList = widget.querySelector('[widget-control="selected-value-list"]');

        const label = option.textContent.trim();

        const optionFullKey = option.getAttribute('item-value');
        const searchKey = optionFullKey.split('-')[0]
        const searchValue = optionFullKey.split('-')[1]

        const selectedValueElement = document.createElement('button');
        selectedValueElement.classList.add('---mcw--mcs__optionValue');
        selectedValueElement.setAttribute('item-key', searchKey);
        selectedValueElement.setAttribute('item-value', searchValue);
        selectedValueElement.textContent = label;

        const widgetCorrespondingValueSaved = widget.getAttribute(searchKey) ? widget.getAttribute(searchKey).split('+') : [];

        if( !widgetCorrespondingValueSaved.includes(searchValue) ){
            const widgetCorrespondingValueUpdated = widgetCorrespondingValueSaved.push(searchValue);
            valueList.appendChild(selectedValueElement);
            option.classList.add('---mcw--mcs__option_selected');
            const checkbox = option.querySelector('input[type="checkbox"]');
            if(checkbox){
                checkbox.checked = true;
            }
        } else {
            widgetCorrespondingValueSaved.splice(widgetCorrespondingValueSaved.indexOf(searchValue), 1)
            const widgetCorrespondingValueUpdated = widgetCorrespondingValueSaved;
            const addedSelectedValueElement = valueList.querySelector(`[item-value="${searchValue}"]`);
            const checkbox = option.querySelector('input[type="checkbox"]');
            if(checkbox){
                checkbox.checked = false;
            }
            addedSelectedValueElement.remove();
            option.classList.remove('---mcw--mcs__option_selected');
        }

        const options = widget.querySelectorAll('.---mcw--mcs__option:not(.---mcw--mcs__option_selected)');

        if( widgetCorrespondingValueSaved.length > 0 ){
            if( !allowMultiple ){
                for (let j = 0; j < options.length; j++) {
                    options[j].style.display = 'none';
                }
            }
        } else {
            for (let j = 0; j < options.length; j++) {
                options[j].style.display = 'flex';
            }
        }

        widget.setAttribute(searchKey, widgetCorrespondingValueSaved.join('+'))

        buildSearchURL(widget);

        const selectedValues = widget.querySelectorAll('.---mcw--mcs__optionValue');
        if( selectedValues.length > 0 ){
            const typingInput = widget.querySelector('[widget-control="dropdown-input"]');
            typingInput.setAttribute('placeholder', '');
        }

    })
    
}
