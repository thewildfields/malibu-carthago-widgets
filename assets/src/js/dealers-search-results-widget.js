import '../scss/dealers-search-results-widget-styles.scss';
import renderDealerCard from './components/render-dealer-card';
import renderDealerMarker from './components/render-dealer-marker';
import { getMap, mapData, selectors, storage } from './components/variables';

document.addEventListener('dealersFetched', async (e) => {

    
    const dealers = e.detail.dealersResponse.items;
    const renderCards = e.detail.renderCards;
    const map = e.detail.map;
    const searchResultsWidgets = document.querySelectorAll(selectors.searchResultsWidget);


    for (let i = 0; i < searchResultsWidgets.length; i++) {
        dealers.forEach(async (dealer) => {
            if( renderCards ){
                renderDealerCard(searchResultsWidgets[i], dealer);
            };
            await renderDealerMarker(dealer, map);
        });
    }

});