const dispatchDealersFetchedEvent = async (dealersResponse, renderCards = true, map) => {

    const detail = {};
    detail.dealersResponse = dealersResponse.data;
    detail.renderCards = renderCards;
    detail.map = map;

    const dealersFetchedEvent = new CustomEvent("dealersFetched", {
        detail: detail
    });

    document.dispatchEvent(dealersFetchedEvent);

}

export default dispatchDealersFetchedEvent;
