import "../../node_modules/leaflet/dist/leaflet";
import "../../node_modules/leaflet-control-geocoder/dist/Control.Geocoder";
import "../../node_modules/leaflet-routing-machine/dist/leaflet-routing-machine";
import "../../node_modules/leaflet/dist/leaflet.css";
import "../../node_modules/leaflet-routing-machine/dist/leaflet-routing-machine.css";

import "leaflet-control-geocoder";
import "leaflet-routing-machine";

const divElement = document.getElementById("map");
//  ctu
const lat = 10.029939;
const lng = 105.76804;

const map = L.map(divElement, {
    center: [lat, lng],
    zoom: 15,
});

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);
var geocoder = L.Control.Geocoder.nominatim();
L.Control.geocoder({ geocoder }).addTo(map);

export default map;
