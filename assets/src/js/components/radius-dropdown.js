import { attributes, classes, selectors } from "./variables";

const radiusDropdownOptions = document.querySelectorAll(selectors.radiusOption);
const radiusDropdownValueContainers = document.querySelectorAll(selectors.radiusValue);

for (let i = 0; i < radiusDropdownOptions.length; i++) {
    const option = radiusDropdownOptions[i];
    option.addEventListener( 'click', (e) => {
        const widget = option.closest(selectors.widget);
        const valueDisplay = widget.querySelector(selectors.radiusValue);
        const optionsContainer = widget.querySelector(selectors.radiusOptions);
        const value = option.getAttribute(attributes.radius);
        const label = option.textContent.trim();
        widget.setAttribute(attributes.radius, value);
        valueDisplay.textContent = label;
        optionsContainer.classList.remove(classes.radiusDropdownOpen)
    } );
}


for (let i = 0; i < radiusDropdownValueContainers.length; i++) {
    const valueContainer = radiusDropdownValueContainers[i];
    valueContainer.addEventListener('click', (e) => {
        const widget = valueContainer.closest(selectors.widget);
        const optionsContainer = widget.querySelector(selectors.radiusOptions);
        optionsContainer.classList.contains(classes.radiusDropdownOpen)
            ? optionsContainer.classList.remove(classes.radiusDropdownOpen)
            : optionsContainer.classList.add(classes.radiusDropdownOpen)

    })
}

document.addEventListener('click', (e) => {
    if (!e.target.closest(selectors.widget) ){
        const radiusDropdowns = document.querySelectorAll(selectors.radiusOptions);
        radiusDropdowns.forEach(dropdown => {
            dropdown.classList.remove(classes.radiusDropdownOpen);
        })
    }
})
