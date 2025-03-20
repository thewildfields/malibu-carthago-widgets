const dropdownBlockSelector = '[widget-control="values-dropdown"]';
const dropdownInputSelector = '[widget-control="dropdown-input"]';
const dropdownActiveClass = '---mcw--mcs__dropdownOptions_open';

const dropdownInputs = document.querySelectorAll(dropdownInputSelector);

for (let i = 0; i < dropdownInputs.length; i++) {

    const input = dropdownInputs[i];

    input.addEventListener('click', (e) => {
        const dropdownContainer = e.target.closest('.---mcw--mcs__inputGroup_dropdown');

        if(dropdownContainer){
            const dropdownBlock = dropdownContainer.querySelector(dropdownBlockSelector);
            dropdownBlock.classList.add(dropdownActiveClass);
        }

    })

}

const dropdownBlocks = document.querySelectorAll(dropdownBlockSelector);

if( dropdownBlocks ){

    document.addEventListener('click', (e) => {
        if ( !e.target.closest(dropdownBlockSelector) && !e.target.closest(dropdownInputSelector)){

            for (let i = 0; i < dropdownBlocks.length; i++) {
                const dropdown = dropdownBlocks[i];
                dropdown.classList.remove(dropdownActiveClass);
            }

        }
    })
}