import { selectors } from "./globals";

const toggleNeighborCountries = (widget) => {
    const toggle = widget.querySelector(selectors.neighborCountriesToggle);
    if( !toggle ){ return; }
    toggle.addEventListener('click', (e) => {
        if(toggle.checked){
            widget.setAttribute('includeNeighbors', 'true');
        } else {
            widget.removeAttribute('includeNeighbors');
        }
    })
}

export default toggleNeighborCountries;
