import './components/search-text-inputs';
import './components/search-options';
import './components/selected-values';
import './components/address-field';
import './components/dropdown';
import './components/radius-dropdown';
import buildSearchURL from './components/search-url-builder';

import '../scss/widget-styles.scss';
import validateWidget from './components/widget-validation';
import toggleNeighborCountries from './components/neighbor-countries-toggle';
import { selectors } from './components/variables';
import initSearch from './components/init-search';

const widgets = document.querySelectorAll(selectors.widget);

for (let i = 0; i < widgets.length; i++) {
    validateWidget(widgets[i]);
    buildSearchURL(widgets[i]);
    toggleNeighborCountries();
}

const searchWidgetSearchButtons = document.querySelectorAll(selectors.searchButton);

for (let i = 0; i < searchWidgetSearchButtons.length; i++) {
    const button = searchWidgetSearchButtons[i];

    button.addEventListener('click', async (e) => {
        const widget = button.closest(selectors.widget);
        await initSearch(widget);
    })
}

window.ElementorEventBus = new EventTarget();