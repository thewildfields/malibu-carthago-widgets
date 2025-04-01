import { classes } from "./variables";

const renderText = (text, type='regular', content=null) => {

    const textBlock = document.createElement( type === 'link' ? 'a' : 'p');
    textBlock.classList.add(classes.infowindowText);

    switch (type) {
        case 'title':
            textBlock.classList.add(classes.infowindowTitle)
            break;
        case 'link':
            textBlock.classList.add(classes.infowindowLink);
            textBlock.setAttribute('href', text);
            textBlock.setAttribute('target', '_blank')
        default:
            textBlock.classList.add(classes.infowindowText);
            break;
    }
    if( content === 'categories'){
        const categories = Object.values(text);
        textBlock.classList.add(classes.infowindowCategories);
        categories.forEach(category => {
            const categoryItem = document.createElement('span');
            categoryItem.classList.add(classes.infowindowCategoryItem);
            categoryItem.textContent = category;
            textBlock.appendChild(categoryItem);
        })
    } else {
        textBlock.textContent = text
    }
    return textBlock;
}

const infoWindowElement = (dealer) => {
    const element = document.createElement('div');
    element.classList.add(classes.infowindow);

    if( dealer.title ){ element.appendChild(renderText(dealer.title, 'title')); }
    if( dealer.formatted_address ){ element.appendChild(renderText(dealer.formatted_address)); }
    if( dealer.phone ){ element.appendChild(renderText(dealer.phone)); }
    if( dealer.email ){ element.appendChild(renderText(dealer.email, 'link')); }
    if( dealer.website ){ element.appendChild(renderText(dealer.website, 'link')); }
    if( dealer.categories ){ element.appendChild(renderText(dealer.categories, 'regular', 'categories')); }

    return element;
}

export default infoWindowElement;
