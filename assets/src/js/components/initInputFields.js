import { selectors } from "./globals";

const initInputFields = (widget) => {
    
    const inputFields = widget.querySelectorAll(selectors.textInput);

    if( inputFields.length === 0 ){
        return;
    }
    
    for (let i = 0; i < inputFields.length; i++) {
        const input = inputFields[i];
        input.addEventListener('input', () => {
            const value = input.value.toLowerCase().trim();
            if( input.hasAttribute('dropdown-input') ){
                return;
            }
            const controlKey = input.getAttribute('widget-control-key');
            const control = controlKey.slice(controlKey.indexOf('-') + 1);
            if( value.length > 0 ){
                widget.setAttribute(control, input.value);
            } else {
                widget.removeAttribute(control)
            }
        })
    }
}

export default initInputFields;
