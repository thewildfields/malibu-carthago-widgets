// Text Inputs

const widgetTextFilterInputs = document.querySelectorAll('[widget-control="dropdown-input"]');

for (let i = 0; i < widgetTextFilterInputs.length; i++) {

    const input = widgetTextFilterInputs[i];

    input.addEventListener('input', (e) => {

        const value = e.target.value.toLowerCase();
        const widget = input.closest('.---mcw--mcs');

        const inputFullKey = input.getAttribute('widget-control-key');
        const searchKey = inputFullKey.split('-')[1]
        const unselectedOptions = widget.querySelectorAll(`.---mcw--mcs__option[item-key="${inputFullKey}"]:not(.---mcw--mcs__option_selected)`);

        unselectedOptions.forEach(option => {
            const label = option.textContent.trim().toLowerCase();
            option.style.display = label.includes(value) ? 'flex' : 'none';
        });
    })

}

document.addEventListener('click' , (e) => {
    if(
        !e.target.closest('[widget-control="dropdown-input"]') &&
        !e.target.closest('[widget-control="value-dropdown"]')
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