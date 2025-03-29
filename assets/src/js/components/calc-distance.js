const calcDistace = (originLat, originLng, destinationLat, destinationLng) => {
    const R = 6371; // km
    const dLat = (destinationLat-originLat) * Math.PI / 180;
    const dLng = (destinationLng-originLng) * Math.PI / 180;
    const dLat1 = (originLat) * Math.PI / 180;
    const dLat2 = (destinationLat) * Math.PI / 180;
  
    const a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.sin(dLng/2) * Math.sin(dLng/2) * Math.cos(dLat1) * Math.cos(dLat2); 
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    const d = Math.round(R * c);
    return distance;
}

export default calcDistace;
