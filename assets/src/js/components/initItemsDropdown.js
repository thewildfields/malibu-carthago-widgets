import { classes, selectors } from "./globals";

const initItemsDropdown = () => {

    const dropdownInputs = document.querySelectorAll(selectors.dropdownInput);
    const dropdownBlocks = document.querySelectorAll(selectors.dropdownBlock);
    
    for (let i = 0; i < dropdownInputs.length; i++) {
        const input = dropdownInputs[i];
        input.addEventListener('click', (e) => {
            const dropdownContainer = e.target.closest(selectors.dropdownContainer);
            if(dropdownContainer){
                const dropdownBlock = dropdownContainer.querySelector(selectors.dropdownBlock);
                dropdownBlock.classList.add(classes.dropdownActive);
            }
        })
    }
    
    if( dropdownBlocks ){
        document.addEventListener('click', (e) => {
            if (
                !e.target.closest(selectors.dropdownBlock) &&
                !e.target.closest(selectors.dropdownInput) && 
                !e.target.closest(selectors.taxonomyFilterInputs)
            ){
                for (let i = 0; i < dropdownBlocks.length; i++) {
                    const dropdown = dropdownBlocks[i];
                    dropdown.classList.remove(classes.dropdownActive);
                }
            }
        })
    }

}

export default initItemsDropdown;
