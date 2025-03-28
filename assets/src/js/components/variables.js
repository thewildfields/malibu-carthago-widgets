// Widget component selectors
export const selectors = {
    widget: '[widget-control="search-widget-container"]',
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
}

// Classes
export const classes = {
    dropdownActive: '---mcw--mcs__dropdownOptions_open',
    radiusDropdownOpen: '---mcw--mcs__radius__options_open'
}

// Attributes
export const attributes = {
    neighborCountries: 'include-neighbor-countries',
    radius: 'radius'
}

// API Keys
export const googleMapsApiKey = "AIzaSyBkzLO8lK3yXznfawhOc74Y-FMvGR84tVg";