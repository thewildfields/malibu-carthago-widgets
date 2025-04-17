// Text Inputs

import { selectors } from "./globals";

const initDropdownInput = () => {



const widgetTextFilterInputs = document.querySelectorAll(selectors.dropdownInput);


for (let i = 0; i < widgetTextFilterInputs.length; i++) {

    const input = widgetTextFilterInputs[i];

    input.addEventListener('input', (e) => {

        const value = e.target.value.toLowerCase();
        const widget = input.closest(selectors.searchWidget);

        const inputFullKey = input.getAttribute('widget-control-key');
        const unselectedOptions = widget.querySelectorAll(`.---mcw--mcs__option[item-key="${inputFullKey}"]:not(.---mcw--mcs__option_selected)`);

        unselectedOptions.forEach(option => {
            const label = option.textContent.trim().toLowerCase();
            option.style.display = label.includes(value) ? 'flex' : 'none';
        });
    })

}

document.addEventListener('click' , (e) => {
    if(
        !e.target.closest(selectors.dropdownInput) &&
        !e.target.closest(selectors.dropdownInput)
    ){
        widgetTextFilterInputs.forEach(input => {
            input.value = '';
        })
        const options = document.querySelectorAll('.---mcw--mcs__option');
        for (let i = 0; i < options.length; i++) {
            options[i].style.display = 'flex';
        }
    }
})

}

export default initDropdownInput;