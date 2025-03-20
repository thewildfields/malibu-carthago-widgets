import './components/search-text-inputs';
import './components/search-options';
import './components/selected-values';
import './components/address-field';
import './components/dropdown';
import './components/radius-dropdown';
import buildSearchURL from './components/search-url-builder';

import '../scss/widget-styles.scss';
import validateWidget from './components/widget-validation';

const widgets = document.querySelectorAll('.---mcw--mcs');

for (let i = 0; i < widgets.length; i++) {
    validateWidget(widgets[i]);
    buildSearchURL(widgets[i]);
}