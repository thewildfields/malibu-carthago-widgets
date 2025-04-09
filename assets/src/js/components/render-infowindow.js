import { closeAllInfoWindows, infoWindowTracker } from "./globals";
import infoWindowElement from "./infowindow";

const renderInfowindow = async (dealer, marker) => {
    if(infoWindowTracker.length){
        closeAllInfoWindows();
    }
    const infoWindow = new google.maps.InfoWindow({
        content: infoWindowElement(dealer)
    })

    
    infoWindow.open(marker.map, marker);

    infoWindowTracker.push(infoWindow);
}

export default renderInfowindow;
