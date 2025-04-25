import { classes, selectors } from "./globals";

const renderWidgetError = (widget, parameter, settings) => {

    const errorMessageContainer = widget.querySelector(selectors.errorMessage);

    errorMessageContainer.innerHTML = '';

    let input, message, existingMessage = errorMessageContainer.innerHTML;

    switch (parameter) {
        case 'location':
            input = widget.querySelector(selectors.locationInput);
            message = settings.missing_location_message;
            break;
        case 'model':
            input = widget.querySelector(selectors.dropdownInput);
            message = settings.missing_models_message;
            break;
        case 'dealers':
            message = settings.missing_dealers_message;
            break;
        default:
            break;
    }

    if(input && settings.error_field_highlight){
        input.classList.add(classes.widgetInputError);
    }

    if(settings.show_error_messages){
        existingMessage += message+'<br>';
        errorMessageContainer.innerHTML = existingMessage;
        errorMessageContainer.style.maxHeight = 'none';
        errorMessageContainer.style.opacity = 1;
    }

    if(
        !settings.error_timeout ||
        (settings.error_field_highlight && settings.show_error_messages)
    ){ return; }

    setTimeout(() => {
        input.classList.remove(classes.widgetInputError);
        errorMessageContainer.style.opacity = 0;
        setTimeout(() => {
            errorMessageContainer.style.maxHeight = '0px';
            errorMessageContainer.innerHTML = '';
        }, 200)
    }, settings.error_timeout)

}

export default renderWidgetError;
