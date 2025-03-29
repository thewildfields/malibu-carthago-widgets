window.ElementorEventBus.addEventListener('dealersFetched', (e) => {
    const dealersResponse = e.detail;
    const dealers = dealersResponse.items;
    console.log(dealers);
})