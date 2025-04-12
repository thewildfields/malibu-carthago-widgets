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
