const radiusDropdownOptions = document.querySelectorAll('.---mcw--mcs__radius__option');
const radiusDropdownValueContainers = document.querySelectorAll('.---mcw--mcs__radiusValue');
const radiusOptionsContainerOpenClass = '---mcw--mcs__radius__options_open';


for (let i = 0; i < radiusDropdownOptions.length; i++) {

    const option = radiusDropdownOptions[i];

    option.addEventListener( 'click', (e) => {
        
        const widget = option.closest('.---mcw--mcs');
        const valueDisplay = widget.querySelector('.---mcw--mcs__radiusValue');
        const optionsContainer = widget.querySelector('.---mcw--mcs__radius__options');

        const value = option.getAttribute('radius-value');
        const label = option.textContent.trim();
        
        widget.setAttribute('radius', value);
        valueDisplay.textContent = label;
        optionsContainer.classList.remove(radiusOptionsContainerOpenClass)

    } );

}


for (let i = 0; i < radiusDropdownValueContainers.length; i++) {

    const valueContainer = radiusDropdownValueContainers[i];

    valueContainer.addEventListener('click', (e) => {

        const widget = valueContainer.closest('.---mcw--mcs');
        const optionsContainer = widget.querySelector('.---mcw--mcs__radius__options');

        optionsContainer.classList.contains(radiusOptionsContainerOpenClass)
            ? optionsContainer.classList.remove(radiusOptionsContainerOpenClass)
            : optionsContainer.classList.add(radiusOptionsContainerOpenClass)

    })
}

document.addEventListener('click', (e) => {
    if (!e.target.closest('.---mcw--mcs__radius') ){
        const radiusDropdowns = document.querySelectorAll('.---mcw--mcs__radius__options');

        radiusDropdowns.forEach(dropdown => {
            dropdown.classList.remove(radiusOptionsContainerOpenClass);
        })
    }
})