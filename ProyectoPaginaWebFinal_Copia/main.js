const coordsSelect = document.getElementById("coords-select");
const submitBtn = document.getElementById("submit-btn");
let map;
let marker;

window.initMap = function() {
    const initialCoords = { lat: 19.406940428320986, lng: -99.14819687896599 };
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 6,
        center: initialCoords,
    });
    marker = new google.maps.Marker({
        position: initialCoords,
        map,
    });
};

submitBtn.addEventListener("click", () => {
    const selectedCoords = coordsSelect.value.split(",");
    const lat = parseFloat(selectedCoords[0]);
    const lng = parseFloat(selectedCoords[1]);
    if (!isNaN(lat) && !isNaN(lng)) {
        const coords = { lat, lng };
        map.setCenter(coords);
        map.setZoom(13);
        marker.setPosition(coords);
    } else {
        alert("Please select valid coordinates.");
    }
});

