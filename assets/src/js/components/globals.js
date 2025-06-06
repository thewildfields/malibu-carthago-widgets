import renderInfowindow from "./render-infowindow";

// Widget component selectors
export const selectors = {
    searchWidget: '[widget-control="search-widget"]',
    searchButton: '[widget-control="search-button"]',
    errorMessage: '[widget-control="error-message"]',
    taxonomyFilterInputs: '[widget-control="taxonomy-filter-input"]',
    // Location
    locationInput: '[widget-control="location"]',
    neighborCountriesToggle: '[widget-control="neighbor-countries-toggle"]',
    radiusOptions: '[widget-control="radius-options-container"]',
    radiusOption: '[widget-control="radius-option"]',
    radiusValue: '[widget-control="radius-value"]',
    textInput: '[widget-control="text-filter-input"]',
    // Dropdown
    dropdownContainer: '[widget-control="dropdown-container"]',
    dropdownBlock: '[widget-control="values-dropdown"]',
    dropdownInput: '[widget-control="dropdown-input"]',
    dropdownOption: '[widget-control="dropdown-option"]',
    dropdownOptionGroup: '[widget-control="dropdown-option-group"]',
    dropdownValueList: '[widget-control="selected-value-list"]',
    // Map
    mapContainer: '[widget-control="dealers-map-container"]',
    // Dealers Search Results
    searchResultsWidget: '[widget-control="dealers-search-results-container"]',
    dealerCard: '[widget-control="dealer-card"]',
    dealerCardsContainer: '[widget-control="dealers-search-results-container"]'
}

// Classes
export const classes = {
    dropdownActive: '---mcw--mcs__dropdownOptions_open',
    radiusDropdownOpen: '---mcw--mcs__radius__options_open',
    infowindow: '---mcw--dm__infowindow',
    infowindowTitle: '---mcw--dm__infowindowTitle',
    infowindowText: '---mcw--dm__infowindowText',
    infowindowLink: '---mcw--dm__infowindowLink',
    infowindowCategories: '---mcw--dm__i',
    infowindowCategoryItem: '---mcw--dm__infowindowCategoriesItem',
    // Dealer Cards
    dealerCard: '---mcw--dc',
    dealerCardDistance: '---mcw--dc__distance',
    dealerCardTitle: '---mcw--dc__title',
    dealerCardCity: '---mcw--dc__city',
    dealerCardCategories: '---mcw--dc__categories',
    dealerCardCategoryItem: '---mcw--dc__categoriesItem',
    dealerCardModelsTitle: '---mcw--dc__modelsTitle',
    dealerCardModels: '---mcw--dc__models',
    // Inputs
    widgetInput: '---mcw--mcs__input',
    widgetInputError: '---mcw--mcs__input_error',
    widgetInputNoPlaceholder: '---mcw--mcs__input_noPlacehoder'
}

// Attributes
export const attributes = {
    radius: 'radius',
    showInfowindows: 'show-infowindows',
}

// API Endpoints
export const endpoints = {
    dealers: window.location.origin+'/wp-json/malibu-carthago/v1/dealers',
}

// API Keys
export const googleMapsApiKey = "AIzaSyBkzLO8lK3yXznfawhOc74Y-FMvGR84tVg";

// Global vars
export const infoWindowTracker = [];

export const closeAllInfoWindows = () => {
    infoWindowTracker.forEach( window => window.close());
}


// Map Bounds

export const bounds = {
    // Great Britain
    gb: [49.9075, -7.6784, 58.9609, 1.5518],
    // France
    fr: [42.4933, -4.8853, 51.3742, 8.2944],
    // Italy
    it: [36.6199, 6.7499, 47.1154, 18.5149],
    // Netherlands
    nl: [50.7504, 3.3316, 53.5550, 7.2275],
    // Sweden
    se: [55.3370, 10.5931,69.0599, 24.1773],
    // Norway
    no: [57.7590, 4.0649, 71.3849, 31.7615],
    // Germany (default)
    de: [47.2701, 5.8663, 55.0584, 15.0419],
    // New countries can be added in the same format
    // countryCode: [south, west, north, east]
}

export const getVehicleID = () => {
    const body = document.querySelector('body');
    const bodyClasses = Array.from(body.classList);
    const prefix = 'postid-';
    if( bodyClasses.includes('single-fahrzeuge') ){
        const id = bodyClasses.filter(bodyClass => bodyClass.indexOf(prefix) === 0)[0].slice(prefix.length);
        return id;
    } else {
        return false;
    }
}

globalThis.appData = {
    markers: {},
}