import { selectors } from "./globals";

const initAdditionalInputs = (widget) => {

    const inputGroups = widget.querySelectorAll(selectors.additionalInputs);

    inputGroups.forEach(group => {
        group.addEventListener('change', () => {
            const input = group.querySelector('input');
            const category = input.getAttribute('name').split('-')[1];
            const type = input.type;
            let value = input.value;
            if( type === 'radio' ){
                widget.setAttribute(category, value);
                widget.removeAttribute('model');
                const widgetType = widget.getAttribute('widgettype');
                if( widgetType === 'fahrzeuge' && category === 'fahrzeugart'){
                    const selectedId = input.value;
                    const dropdownOptions = widget.querySelectorAll(selectors.dropdownOption);
                    dropdownOptions.forEach(option => {
                        const optionTerms = option.getAttribute('categories').split('+');
                        option.style.display = optionTerms.includes(selectedId) ? 'flex' : 'none';
                    });
                    dropdownOptions.forEach(option => {
                        const optionsGroup = option.closest(selectors.dropdownOptionGroup);
                        const optionsInGroup = optionsGroup.querySelectorAll(selectors.dropdownOption);
                        const activeOptionsInGroup = Array.from(optionsInGroup).filter(el => getComputedStyle(el).display !== 'none');
                        optionsGroup.style.display = activeOptionsInGroup.length > 0 ? 'flex' : 'none';
                    })
                    const selectedValueList = widget.querySelector(selectors.dropdownValueList);
                    selectedValueList.innerHTML = '';
                    selectedValueList.style.zIndex = '-1';
                }
            }
            if( type === 'checkbox' ){
                let attribute = widget.getAttribute(category) ? widget.getAttribute(category).split('+') : [];
                if( input.checked ){
                    attribute.push(value);
                } else {
                    attribute.splice(attribute.indexOf(value), 1);
                }
                widget.setAttribute(category, attribute.join('+'));
            }

        })
    });
}

export default initAdditionalInputs;
