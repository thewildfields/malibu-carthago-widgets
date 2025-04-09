import { attributes, classes, selectors } from "./globals";

const initRadiusDropdown = (widget, settings) => {

    if( !settings.radius_dropdown || !settings.radius_dropdown.length ){
        console.warn('Radius dropdown error');
        return;
    }

    const radiusDropdownOptions = widget.querySelectorAll(selectors.radiusOption);
    const radiusDropdownValueContainer = widget.querySelector(selectors.radiusValue);
    
    for (let i = 0; i < radiusDropdownOptions.length; i++) {
        const option = radiusDropdownOptions[i];
        option.addEventListener( 'click', (e) => {
            const valueDisplay = widget.querySelector(selectors.radiusValue);
            const optionsContainer = widget.querySelector(selectors.radiusOptions);
            const value = option.getAttribute(attributes.radius);
            const label = option.textContent.trim();
            widget.setAttribute(attributes.radius, value);
            valueDisplay.textContent = label;
            optionsContainer.classList.remove(classes.radiusDropdownOpen)
        } );
    }
    
    
    radiusDropdownValueContainer.addEventListener('click', (e) => {
        const optionsContainer = widget.querySelector(selectors.radiusOptions);
        optionsContainer.classList.contains(classes.radiusDropdownOpen)
            ? optionsContainer.classList.remove(classes.radiusDropdownOpen)
            : optionsContainer.classList.add(classes.radiusDropdownOpen)

    })
    
    document.addEventListener('click', (e) => {
        if (!e.target.closest(selectors.searchWidget) ){
            const radiusDropdowns = document.querySelectorAll(selectors.radiusOptions);
            radiusDropdowns.forEach(dropdown => {
                dropdown.classList.remove(classes.radiusDropdownOpen);
            })
        }
    })
    
}

export default initRadiusDropdown;
