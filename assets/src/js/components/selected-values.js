// Selected Values

import buildSearchURL from "./search-url-builder";

document.addEventListener('click', (e) => {

    const selectedValueOption = e.target.closest('.---mcw--mcs__optionValue');

    if( selectedValueOption ){

        const widget = selectedValueOption.closest('.---mcw--mcs');
        const allowMultiple = widget.getAttribute('allow-multiple') === 'yes' ? true : false;

        const options = widget.querySelectorAll('.---mcw--mcs__option:not(.---mcw--mcs__option_selected)');


        const optionKey = selectedValueOption.getAttribute('item-key');
        const optionValue = selectedValueOption.getAttribute('item-value');

        const widgetCorrespondingValueSaved = widget.getAttribute(optionKey).split('+');
        widgetCorrespondingValueSaved.splice(widgetCorrespondingValueSaved.indexOf(optionValue), 1)
        const widgetCorrespondingValueUpdated = widgetCorrespondingValueSaved;
        widget.setAttribute(optionKey, widgetCorrespondingValueUpdated);

        const option = widget.querySelector(`.---mcw--mcs__option[item-value="${optionKey}-${optionValue}"]`);
        option.classList.remove('---mcw--mcs__option_selected');

        const checkbox = option.querySelector('input[type="checkbox"]');

        if(checkbox){
            checkbox.checked = false;
        }

        selectedValueOption.remove();

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

        buildSearchURL(widget);

    }

})
