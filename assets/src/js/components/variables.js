import renderInfowindow from "./render-infowindow";

// Widget component selectors
export const selectors = {
    widget: '[widget-control="search-widget-container"]',
    searchButton: '[widget-control="search-button"]',
    // Location
    locationInput: '[widget-control="location"]',
    neighborCountriesToggle: '[widget-control="neighbor-countries-toggle"]',
    radiusOptions: '[widget-control="radius-options-container"]',
    radiusOption: '[widget-control="radius-option"]',
    radiusValue: '[widget-control="radius-value"]',
    // Dropdown
    dropdownContainer: '[widget-control="dropdown-container"]',
    dropdownBlock: '[widget-control="values-dropdown"]',
    dropdownInput: '[widget-control="dropdown-input"]',
    // Map
    mapContainer: '[widget-control="dealers-map-container"]'
}

// Classes
export const classes = {
    dropdownActive: '---mcw--mcs__dropdownOptions_open',
    radiusDropdownOpen: '---mcw--mcs__radius__options_open',
    infowindow: '---mcw--dm__infowindow',
    infowindowTitle: '---mcw--dm__infowindowTitle',
    infowindowText: '---mcw--dm__infowindowText',
    infowindowLink: '---mcw--dm__infowindowLink',
    infowindowCategories: '---mcw--dm__infowindowCategories',
    infowindowCategoryItem: '---mcw--dm__infowindowCategoriesItem',
}

// Attributes
export const attributes = {
    neighborCountries: 'include-neighbor-countries',
    radius: 'radius',
    showInfowindows: 'show-infowindows'
}

// API Keys
export const googleMapsApiKey = "AIzaSyBkzLO8lK3yXznfawhOc74Y-FMvGR84tVg";

// API Endpoints
export const endpoints = {
    dealers: window.location.origin+'/wp-json/malibu-carthago/v1/dealers',
}

// Global vars

export const infoWindowTracker = [];
export const markers = [];

export const closeAllInfoWindows = () => {
    infoWindowTracker.forEach( window => window.close());
}