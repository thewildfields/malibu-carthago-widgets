import { attributes, selectors } from "./variables";

const toggleNeighborCountries = () => {
    const toggles = document.querySelectorAll(selectors.neighborCountriesToggle);
    if( !toggles.length ){ return; }
    for (let i = 0; i < toggles.length; i++) {
        const toggle = toggles[i];
        toggle.addEventListener('click', (e) => {
            const input = e.target;
            const widget = input.closest(selectors.widget);
            if(input.checked){
                widget.setAttribute(attributes.neighborCountries, 'true');
            } else {
                widget.removeAttribute(attributes.neighborCountries);
            }
        })
    }
}

export default toggleNeighborCountries;
