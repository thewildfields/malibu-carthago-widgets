import { classes, getMap, selectors, storage } from "./globals";

const renderDealerCard = (widget, dealer) => {

    const dealerCard = document.createElement('div');
    dealerCard.setAttribute('widget-control', 'dealer-card');
    dealerCard.setAttribute('dealer-id', dealer.id);
    dealerCard.classList.add(classes.dealerCard);

    const distance = document.createElement('p');
    distance.classList.add(classes.dealerCardDistance);
    distance.textContent = dealer.distance + ' km';
    dealerCard.appendChild(distance);

    const title = document.createElement('p');
    title.classList.add(classes.dealerCardTitle);
    title.textContent = dealer.title;
    dealerCard.appendChild(title);

    const city = document.createElement('p');
    city.classList.add(classes.dealerCardCity);
    city.textContent = dealer.city;
    dealerCard.appendChild(city);

    const categories = document.createElement('p');
    categories.classList.add(classes.dealerCardCategories);
    const filterCategories = widget.getAttribute('allowed-categories');
    let allowedCategories;
    if(filterCategories){
        allowedCategories = widget.getAttribute('allowed-categories').split('+');
    }
    Object.keys(dealer.categories).forEach( category => {
        const categoryItem = document.createElement('span');
        categoryItem.classList.add(classes.dealerCardCategoryItem);
        categoryItem.textContent = dealer.categories[category];
        if( filterCategories && allowedCategories.includes(category) ){
            categories.appendChild(categoryItem);
        } else if (!filterCategories){
            categories.appendChild(categoryItem);
        }
    })
    dealerCard.appendChild(categories);

    const modelsTitle = document.createElement('p');
    modelsTitle.classList.add(classes.dealerCardModelsTitle);
    modelsTitle.textContent = widget.getAttribute('available-models-text');
    dealerCard.appendChild(modelsTitle);

    const models = document.createElement('p');
    models.classList.add(classes.dealerCardModels);
    models.textContent = dealer.models_intersect;
    dealerCard.appendChild(models);

    const dealerResultsWidget = document.querySelector(selectors.searchResultsWidget);
    dealerResultsWidget.appendChild(dealerCard);

    
    if( widget.hasAttribute('open-infowindow-on-click') ){
        dealerCard.addEventListener('click', (e) => {
            const id = dealer.id;
        })
    }
}

export default renderDealerCard;
