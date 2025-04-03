const dispatchDealersFetchedEvent = async (dealersResponse, renderCards = true, map, resize) => {

    const detail = {};
    detail.dealersResponse = dealersResponse.data;
    detail.renderCards = renderCards;
    detail.map = map;
    detail.resize = resize;

    const dealersFetchedEvent = new CustomEvent("dealersFetched", {
        detail: detail
    });

    document.dispatchEvent(dealersFetchedEvent);

}

export default dispatchDealersFetchedEvent;
