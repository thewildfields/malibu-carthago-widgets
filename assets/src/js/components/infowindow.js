import { classes, selectors } from "./globals";

const renderText = (text, type='regular', content=null) => {

    const mapBlock = document.querySelector(selectors.mapContainer);
    const allowedCategories = mapBlock.getAttribute('dealer-categories') ? mapBlock.getAttribute('dealer-categories').split('+') : [];

    const textBlock = document.createElement( type === 'link' || type === 'email' ? 'a' : 'p');
    textBlock.classList.add(classes.infowindowText);

    switch (type) {
        case 'title':
            textBlock.classList.add(classes.infowindowTitle)
            break;
        case 'link':
            textBlock.classList.add(classes.infowindowLink);
            textBlock.setAttribute('href', text);
            textBlock.setAttribute('target', '_blank');
            break;
        case 'email':
            textBlock.classList.add(classes.infowindowLink);
            textBlock.setAttribute('href', `mailto:${text}`);
            textBlock.setAttribute('target', '_blank');
            break;
        default:
            textBlock.classList.add(classes.infowindowText);
            break;
    }
    if( content === 'categories'){
        const categories = Object.values(text);
        const categoryIDs = Object.keys(text);
        textBlock.classList.add(classes.infowindowCategories);
        categoryIDs.forEach(category => {
            if( allowedCategories && allowedCategories.length > 0 && allowedCategories.includes(category) ){
                const categoryItem = document.createElement('span');
                categoryItem.classList.add(classes.infowindowCategoryItem);
                categoryItem.textContent = text[category];
                textBlock.appendChild(categoryItem);
            }
        })
    } else {
        if( type === 'email' ){
            const mapContainer = document.querySelector(selectors.mapContainer);
            textBlock.textContent = mapContainer.getAttribute('email-prefix') + text;
        } else if( type === 'link' ){
            const mapContainer = document.querySelector(selectors.mapContainer);
            console.log(mapContainer.getAttribute('website-prefix'));
            textBlock.textContent = mapContainer.getAttribute('website-prefix') + text;
        } else {
            textBlock.textContent = text
        }
    }
    return textBlock;
}

const infoWindowElement = (dealer) => {
    const element = document.createElement('div');
    element.classList.add(classes.infowindow);

    const mapContainer = document.querySelector(selectors.mapContainer);

    if( dealer.title ){ element.appendChild(renderText(dealer.title, 'title')); }
    if( dealer.formatted_address ){ element.appendChild(renderText(dealer.formatted_address)); }
    if( dealer.phone ){
        element.appendChild(renderText(mapContainer.getAttribute('phone-prefix') + dealer.phone));
    }
    if( dealer.email ){
        element.appendChild(renderText(dealer.email, 'email'));
    }
    if( dealer.url ){
        element.appendChild(renderText(dealer.url, 'link'));
    }
    if( dealer.categories ){ element.appendChild(renderText(dealer.categories, 'regular', 'categories')); }

    return element;
}

export default infoWindowElement;
