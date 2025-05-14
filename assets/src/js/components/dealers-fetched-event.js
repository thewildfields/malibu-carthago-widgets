

const dispatchDealersFetchedEvent = async (params, dealersResponse, renderCards = true, map, resize) => {

    const detail = {};
    detail.dealersResponse = dealersResponse.data;
    detail.renderCards = renderCards;
    detail.map = map;
    detail.mapCenter = {lat: params.lat, lng: params.lng}
    detail.resize = resize;
    detail.sourceWidgetType = params.widgetType;

    const dealersFetchedEvent = new CustomEvent("dealersFetched", {
        detail: detail
    });

    document.dispatchEvent(dealersFetchedEvent);

}

export default dispatchDealersFetchedEvent;
